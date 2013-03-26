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
final class Md5SaltSha1 extends SimpleSalted
{
	/**
	 * @param string $string
	 * @return string
	 */
	public function make($string)
	{
		return md5(sha1("{$this->_salt}{$string}"));
	}
}