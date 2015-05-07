# Simple Slack
PHP class to help with Slack Incoming WebHooks

## Requirements

* PHP 5.3 or greater

## Installing via Composer

You can install the package using the [Composer](https://getcomposer.org/) package manager. You can install it by running this command in your project root:

```sh
composer require gaguerreiro/simple-slack:dev-master
```

## Usage

```php
require_once './vendor/autoload.php';

try {

	$options = array(
      'channel' => '#general',
      'username' => 'Robot'
	);

	$ss = new SimpleSlack\Client("[YOUR TEAM ENDPOINT]", $options);
	$ss->sendMessage('Message test');

} catch (SimpleSlackException $e) {
	printf($e->getCode());
    printf($e->getMessage());
}
```
