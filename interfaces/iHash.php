<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\interfaces;
/**
 * @package HASH.interfaces
 * @since 1.0
 */
interface iHash
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string);

	/**
	 * @param string $actual
	 * @param string $expected
	 * @return bool
	 */
	public function compare($actual, $expected);
}