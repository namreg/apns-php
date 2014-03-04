<?php
namespace ApnsPHP\Log;

/**
 * If won't use logging functionality you should use this Logger
 */
class Dummy implements LogInterface {

	/**
	 * Logs a message.
	 *
	 * @param  $sMessage @type string The message.
	 */
	public function log($sMessage)
	{
		// nothing do
	}
}