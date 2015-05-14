<?php namespace Zae\Monolog\Publish\Handler;

/**
 * @author Ezra Pool <ezra@tsdme.nl>
 */

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Zae\Monolog\Publish\Contract\PublisherInterface;

/**
 * Class Publish
 *
 * @package Zae\Monolog\Publish\Handler
 */
class PublishHandler extends AbstractProcessingHandler
{
	/**
	 * @var PublisherInterface
	 */
	private $publisher;

	/**
	 * Publish constructor.
	 *
	 * @param PublisherInterface $publisher
	 * @param bool|int           $level
	 * @param bool               $bubble
	 */
	public function __construct(PublisherInterface $publisher, $level = Logger::DEBUG, $bubble = true)
	{
		parent::__construct($level, $bubble);

		$this->publisher = $publisher;
	}

	/**
	 * Writes the record down to the log of the implementing handler
	 *
	 * @param  array $record
	 *
	 * @return void
	 */
	protected function write(array $record)
	{
		$this->publisher->publish($record['formatted']);
	}

	/**
	 * Set the used publisher
	 *
	 * @param PublisherInterface $publisher
	 */
	public function setPublisher(PublisherInterface $publisher)
	{
		$this->publisher = $publisher;
	}
}