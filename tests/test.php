<?php

require_once __DIR__ . '/../vendor/autoload.php';

use SimpleSlack\Client;

$options = array(
	'channel' => '#general',
	'username' => 'Robot'
	);

$ss = new Client("https://hooks.slack.com/services/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", $options);
$ss->sendMessage('Message test');

?>