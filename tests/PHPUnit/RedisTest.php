<?php namespace Zae\Monolog\Publish\Tests\PHPUnit;

use Monolog\Logger;
use PHPUnit_Framework_TestCase;
use Zae\Monolog\Publish\Handler\PublishHandler;
use Zae\Monolog\Publish\Publisher\RedisPublisher;

/**
 * @author Ezra Pool <ezra@tsdme.nl>
 */

class RedisTest extends PHPUnit_Framework_TestCase
{
	/**
	 *
	 */
	public function testPushErrors()
	{
		$redis = \Mockery::mock('Predis\Client')
							   ->shouldReceive('publish')
							   ->times(8)
							   ->with('log', \Mockery::any())
							   ->mock();

		$monolog = new Logger('test');
		$monolog->pushHandler(new PublishHandler(new RedisPublisher($redis)));

		$monolog->debug('the message was: {message}', ['DEBUG!']);
		$monolog->info('the message was: {message}', ['INFO!']);
		$monolog->notice('the message was: {message}', ['NOTICE!']);
		$monolog->warning('the message was: {message}', ['WARNING!']);
		$monolog->error('the message was: {message}', ['ERROR!']);
		$monolog->critical('the message was: {message}', ['CRITICAL!']);
		$monolog->alert('the message was: {message}', ['ALERT!']);
		$monolog->emergency('the message was: {message}', ['EMERGENCY!']);
	}

	public function testChangeChannel()
	{
		$redis = \Mockery::mock('Predis\Client')
						 ->shouldReceive('publish')
						 ->times(1)
						 ->with('different', \Mockery::any())
						 ->mock();

		$monolog = new Logger('test');
		$redisPublisher = new RedisPublisher($redis);
		$monolog->pushHandler(new PublishHandler($redisPublisher));

		$redisPublisher->setChannel('different');

		$monolog->debug('the message was: {message}', ['DEBUG!']);
	}

	public function tearDown()
	{
		\Mockery::close();
	}
}