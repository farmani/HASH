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
final class Md5Sha1Salt extends SimpleSalted
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string)
	{
		return md5(sha1("{$string}{$this->_salt}"));
	}
}