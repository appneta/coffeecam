<?php
// Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
date_default_timezone_set ('America/Vancouver' );

require_once("gpsd_config.inc");
if (isset($_GET['host']))
                if (!preg_match('/[^a-zA-Z0-9\.-]/', $_GET['host']))
                        $server = $_GET['host'];

        if (isset($_GET['port']))
                if (!preg_match('/\D/', $_GET['port']) && ($port>0) && ($port<65536))
                        $port = $_GET['port'];

        if ($testmode){
                $sock = @fsockopen($server, $port, $errno, $errstr, 2);
                @fwrite($sock, "?WATCH={\"enable\":true}\n");
                usleep(100);
                @fwrite($sock, "?POLL;\n");
                for($tries = 0; $tries < 10; $tries++){
                        $resp = @fread($sock, 2000); # SKY can be pretty big
                        if (preg_match('/{"class":"POLL".+}/i', $resp, $m)){
                                $resp = $m[0];
                                break;
                        }
                }
                @fclose($sock);
                if (!$resp)
                        $resp = '{"class":"ERROR","message":"no response from GPS daemon"}';
        }if (isset($_GET['host']))
                if (!preg_match('/[^a-zA-Z0-9\.-]/', $_GET['host']))
                        $server = $_GET['host'];

        if (isset($_GET['port']))
                if (!preg_match('/\D/', $_GET['port']) && ($port>0) && ($port<65536))
                        $port = $_GET['port'];

        $sock = @fsockopen($server, $port, $errno, $errstr, 2);
        @fwrite($sock, "?WATCH={\"enable\":true}\n");
        usleep(100);
        @fwrite($sock, "?POLL;\n");
        for($tries = 0; $tries < 10; $tries++){
               $resp = @fread($sock, 2000); # SKY can be pretty big
                if (preg_match('/{"class":"POLL".+}/i', $resp, $m)){
                        $resp = $m[0];
                         break;
                }
        }
        @fclose($sock);

        $GPS = json_decode($resp, true);
	$fix = $GPS['tpv'][0];
        global $lat, $lon;
        $lat = (float)$GPS['tpv'][0]['lat'];
        $lon = (float)$GPS['tpv'][0]['lon']

?>
<html>
<head>
    <meta http-equiv="refresh" content='10' />
    <title>Support CoffeeCam</title>
</head>
<body>
<div align='center'>
  <table>
    <tr>
      <td>
         <img src='cam/coffeepot.jpg' />
      </td>
      <td valign='bottom'>
        <table>
          <tr>
            <td valign='center' bgcolor='green' style="height:200px;"><a href="http://www.youtube.com/watch?v=nM4okRvCg2g" traget="_new">Safety</a></td>
          </tr>
          <tr>
            <td valign='center' bgcolor="yellow" style="height:100px;"><a href="http://www.youtube.com/watch?v=REvmhBO99I4" target="_new">Warning area</a></td>
	  </tr>
	  <tr>
	    <td valign='center' bgcolor='red' style="height:50px;"><a href="http://www.youtube.com/watch?v=Dpjl4XJ91xY" target="_new">Danger zone!</a></td>
	  </tr>
	  <tr>
	    <td valign='center' style="height:100px;">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
<p>File last updated: <? echo date ("F d Y H:i:s.", filemtime('cam/coffeepot.jpg')); ?></p>
<p>Coffee pot last known location: <a href="https://maps.google.com/maps?ll=<? echo $lat; ?>,<? echo $lon; ?>&q=loc:<? echo $lat;?>,<? echo $lon;?>&hl=en" target="_new">Latitude: <? echo $lat;?>, Longitude : <? echo $lon;?></a>, using constellation of <? echo count($GPS['sky'][0]['satellites']); ?> satellites.</p>
</body>
</html>

