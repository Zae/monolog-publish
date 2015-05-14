<?php namespace Zae\Monolog\Publish\Contract;

/**
 * @author Ezra Pool <ezra@tsdme.nl>
 */

/**
 * Interface PublisherInterface
 *
 * @package Zae\Monolog\Publish\Handler
 */
interface PublisherInterface
{
	/**
	 * Default method to write the log message to the publisher.
	 *
	 * @param $message
	 *
	 * @return mixed
	 */
	public function publish($message);
}