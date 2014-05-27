<?PHP
$title = 'CoffeeCam locator';
$server = 'localhost';
$advertise = 'support-coffeecam';
$port = 2947;
$autorefresh = 0; # number of seconds after which to refresh
$showmap = 0; # set to 1 if you want to have a google map, set it to 2 if you want a map based on openstreetmap
# $gmap_key = 'GetYourOwnGoogleKey'; # your google API key goes here
$swap_ew = 0; # set to 1 if you don't understand projections
$open = 0; # set to 1 to show the form to change the GPSd server

## You can read the header, footer and blurb from a file...
# $head = file_get_contents('/path/to/header.inc');
# $body = file_get_contents('/path/to/body.inc');
# $footer = file_get_contents('/path/to/footer.hinc');
# $blurb = file_get_contents('/path/to/blurb.inc');

## ... or you can just define them here
$head = '';
$body = '';
$footer = '';
$blurb = <<<EOT
This machine is maintained by
<a href="mailto:support@appneta.com">AppNeta support team</a>.<br/>
EOT;

?>
