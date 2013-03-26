<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\strategies;
use HASH\abstracts\SimpleBlowfish;
class_exists('SimpleBlowfish') or require 'HASH/abstracts/SimpleBlowfish.php';
/**
 * @package HASH.strategies
 * @since 1.1
 */
final class BlowfishRandomSalt extends SimpleBlowfish
{
	/**
	 * @return string
	 * @see http://www.yiiframework.com/wiki/425/use-crypt-for-password-storage/
	 */
	protected function _blowfish()
	{
		for ($i = 0; $i < 8; ++$i) {
			$rand[] = pack('S', mt_rand(0, 0xffff));
		}
		$rand[] = substr(microtime(), 2, 6);
		$rand = sha1(implode('', $rand), true);
		$salt = "$2a\${$this->_cost}\$";
		$salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
		$salt .= '$';
		return $salt;
	}
}