<?php
function broadcast($msg) {
    if(is_null($msg)||is_empty($msg)) {
        // Ignore this
    } else {   
		require_once('/usr/local/bin/hipchat.php');
		/** hipchat-key.php sets $apikey to the key. **/
		require_once('/usr/local/bin/hipchat-key.php');

		$hc = new HipChat\HipChat($apikey);
	
		$hc->message_room('Support', 'CoffeeCam', $msg);
    }
}
?>
