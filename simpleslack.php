<?php
/**
 * SimpleSlack
 *
 * PHP class to help with Slack Incoming WebHooks
 *
 * @version 1.0
 * @author Gabriel Guerreiro (gabrielguerreiro.com)
 *
 */

class SimpleSlack {


	/**
	 * Team Endpoint
	 * @var string
	 */
	private $endpoint;

	/**
	 * Channel that will receive the message
	 * @var string
	 */
	private $channel;

	/**
	 * Message's owner
	 * @var string
	 */
	private $username;

	/**
	 * Message
	 * @var string
	 */
	private $text;

	/**
	 * Icon
	 * @var string
	 */
	private $icon_emoji;


	function __construct($endpoint, $options) {

		$this->endpoint = $endpoint;

		if (isset($options['username']))
			$this->username = $options['username'];

		if (isset($options['channel']))
			$this->channel = $options['channel'];

		if (isset($options['icon_emoji']))
			$this->icon_emoji = $options['icon_emoji'];
	}


	/**
	 * Send Message
	 * @param  [type] $message [description]
	 * @return [type]          [description]
	 */
	public function sendMessage($message) {

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $this->endpoint);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $this->payload($message));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		if (curl_exec($curl) === FALSE || curl_getinfo($curl) === FALSE)
			throw new SimpleSlackException(curl_error($curl), curl_errno($curl));

		curl_close($curl);
	}


	/**
	 * Prepare Payload
	 * @param  [type] $message [description]
	 * @return [type]          [description]
	 */
	private function payload($message) {

		$payload = array();

		if (!empty($this->channel))
			$payload['channel'] = $this->channel;

		if (!empty($this->username))
			$payload['username'] = $this->username;		

		if (!empty($this->icon_emoji))
			$payload['icon_emoji'] = $this->icon_emoji;

		$payload['text'] = $message;

		return http_build_query(array('payload'=>json_encode($payload, JSON_UNESCAPED_UNICODE)));
	}

}

/**
 * General Exceptions
 */
class SimpleSlackException extends Exception {}
?>