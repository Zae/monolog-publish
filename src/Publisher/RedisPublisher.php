<?php namespace Zae\Monolog\Publish\Publisher;

/**
 * @author Ezra Pool <ezra@tsdme.nl>
 */

use Predis\ClientInterface;
use Zae\Monolog\Publish\Contract\PublisherInterface;

/**
 * Class RedisPublisher
 *
 * @package Zae\Monolog\Publish\Handler
 */
class RedisPublisher implements PublisherInterface
{
	/**
	 * @var ClientInterface
	 */
	private $client;
	/**
	 * @var string
	 */
	private $channel;

	/**
	 * RedisPublisher constructor.
	 *
	 * @param ClientInterface $client
	 * @param string		  $channel
	 */
	public function __construct(ClientInterface $client, $channel = 'log')
	{
		$this->client = $client;
		$this->channel = $channel;
	}

	/**
	 * Publish the message onto the redis pub/sub channel.
	 *
	 * @param $message
	 *
	 * @return void
	 */
	public function publish($message)
	{
		$this->client->publish($this->channel, $message);
	}

	/**
	 * Set the channel that should be used.
	 *
	 * @param $channel
	 */
	public function setChannel($channel)
	{
		$this->channel = $channel;
	}

	/**
	 * Get the channel that is being used.
	 *
	 * @return string
	 */
	public function getChannel()
	{
		return $this->channel;
	}
}