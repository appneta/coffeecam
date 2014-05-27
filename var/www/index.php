<?php
// Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
date_default_timezone_set ('America/Vancouver' );
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
</body>
</html>

