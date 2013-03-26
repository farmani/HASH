<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\strategies;
use HASH\abstracts\SimpleSalted;
class_exists('SimpleSalted') or require 'HASH/abstracts/SimpleSalted.php';
/**
 * @package HASH.strategies
 * @since 1.0
 */
final class Sha1Md5Salt extends SimpleSalted
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string)
	{
		return sha1(md5("{$string}{$this->_salt}"));
	}
}