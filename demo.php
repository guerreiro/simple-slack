<?php

include "simpleslack.php";

$options = array(
	'channel' => '#general',
	'username' => 'Robot'
	);

$ss = new SimpleSlack("[YOUR TEAM ENDPOINT]", $options);
$ss->sendMessage('Message test');

?>