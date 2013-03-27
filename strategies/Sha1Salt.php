<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\strategies;
use HASH\abstracts\SimpleSalted;
class_exists('HASH\abstracts\SimpleSalted', false) or require 'HASH/abstracts/SimpleSalted.php';
/**
 * @package HASH.strategies
 * @since 1.0
 */
final class Sha1Salt extends SimpleSalted
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string)
	{
		return sha1("{$string}{$this->_salt}");
	}
}