<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\strategies;
use HASH\HASH;
use HASH\abstracts\SimpleSalted;
if (HASH::$included) {
	class_exists('HASH\abstracts\SimpleSalted', false) or require 'HASH/abstracts/SimpleSalted.php';
}
/**
 * @package HASH.strategies
 * @since 1.0
 */
final class SaltMd5Sha1 extends SimpleSalted
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string)
	{
		return md5($this->_salt . sha1($string));
	}

	/**
	 * @param string $password
	 * @return bool
	 */
	public function isHashed($password)
	{
		return (bool) preg_match('/^[a-f0-9]{32}$/i', $password);
	}
}