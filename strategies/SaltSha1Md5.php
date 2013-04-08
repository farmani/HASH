<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\strategies;
use HASH\HASH;
use HASH\abstracts\SimpleSalted;
if (HASH::$included) {
	class_exists('HASH\abstracts\SimpleSalted');
}
/**
 * @package HASH.strategies
 * @since 1.0
 */
final class SaltSha1Md5 extends SimpleSalted
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string)
	{
		return sha1($this->_salt . md5($string));
	}
}