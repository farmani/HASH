<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\abstracts;
use HASH\interfaces\iHash;
interface_exists('iHash') or require 'HASH/interfaces/iHash.php';
/**
 * @package HASH.abstracts
 * @since 1.0
 */
abstract class SimpleHash implements iHash
{
	/**
	 * @param string $string
	 * @return string
	 */
	abstract public function make($string);

	/**
	 * @param string $actual
	 * @param string $expected
	 * @return bool
	 */
	public function compare($actual, $expected)
	{
		return ($this->make($actual) === $expected);
	}
}