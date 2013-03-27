<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\strategies;
use HASH\abstracts\SimpleHash;
class_exists('HASH\abstracts\SimpleHash', false) or require 'HASH/abstracts/SimpleHash.php';
/**
 * @package HASH.strategies
 * @since 1.0
 */
final class Md5Sha1 extends SimpleHash
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string)
	{
		return md5(sha1($string));
	}
}