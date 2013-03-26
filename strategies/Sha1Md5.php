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
final class Sha1Md5 extends SimpleHash
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string)
	{
		return sha1(md5($string));
	}
}