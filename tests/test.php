<?php

require_once './vendor/autoload.php';

$options = array(
	'channel' => '#general',
	'username' => 'Robot'
	);

$ss = new SimpleSlack\Client("[YOUR TEAM ENDPOINT]", $options);
$ss->sendMessage('Message test');

?>