<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\strategies;
use HASH\abstracts\SimpleHash;
class_exists('SimpleHash') or require 'HASH/abstracts/SimpleHash.php';
/**
 * @package HASH.strategies
 * @since 1.0
 */
final class Md5 extends SimpleHash
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string)
	{
		return md5($string);
	}
}