<?php

require_once __DIR__ . '/../vendor/autoload.php';

$options = array(
	'channel' => '#general',
	'username' => 'Robot'
	);

$ss = new SimpleSlack\Client("https://hooks.slack.com/services/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", $options);
$ss->sendMessage('Message test');

?>