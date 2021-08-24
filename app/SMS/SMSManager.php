<?php

namespace App\SMS;


class SMSManager
{
	private $key;
	private $secret;

	function __construct()
	{
		$this->key = env('VONAGE_API_KEY', '');
		$this->secret = env('VONAGE_API_SECRET', '');
	}

	public function sendSMS($to, $body)
	{
		$to = preg_replace('/\s/', '', $to);
		if (preg_match("/^(\+?254)\d{9}$/", $to)) {
			$to = $to;
		} else if (preg_match("/^([0])\d{9}$/", $to)) {
			$to = preg_replace('/^([0])/', '254', $to);
		}
		$basic  = new \Vonage\Client\Credentials\Basic($this->key, $this->secret);
		$client = new \Vonage\Client($basic);

		$response = $client->sms()->send(
			new \Vonage\SMS\Message\SMS($to, env('APP_NAME', 'DAS'), $body)
		);

		$message = $response->current();

		if ($message->getStatus() == 0) {
			echo "The message sent to: " . $to . " successfully\n";
		} else {
			throw new \Exception("Sending Message failed with status: " . $message->getStatus() . "\n");
		}
	}
}
