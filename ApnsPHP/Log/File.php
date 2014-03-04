<?php
namespace ApnsPHP\Log;


class File implements LogInterface{

	protected $filePath;

	public function __construct($filePath = null)
	{
		if ($filePath) {
			$this->setFile($filePath);
		}
	}

	/**
	 * Logs a message.
	 *
	 * @param  $sMessage @type string The message.
	 * @throws \ApnsPHP\Log\Exception
	 */
	public function log($sMessage)
	{
		if (!$this->filePath) {
			throw new \ApnsPHP\Log\Exception('File not specified');
		}
		$message = sprintf('Date: %s - Message: %s', (new \DateTime())->format(\DateTime::ISO8601), $sMessage);
		file_put_contents($this->filePath, $message, FILE_APPEND);
	}

	/**
	 * @param string $file
	 * @throws Exception
	 */
	public function setFile($file)
	{
		if (!is_file($file)) {
			throw new \ApnsPHP\Log\Exception('File not exists');
		}
		if (!is_writable($file)) {
			throw new \ApnsPHP\Log\Exception('File not writable');
		}
		$this->filePath = $file;
	}
}