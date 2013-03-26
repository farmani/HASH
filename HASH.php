<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH;
use HASH\interfaces\iHash;
use HASH\strategies\Blowfish;
use HASH\strategies\BlowfishRandomSalt;
use HASH\strategies\BlowfishSalt;
use HASH\strategies\Md5;
use HASH\strategies\Md5Salt;
use HASH\strategies\Md5SaltSha1;
use HASH\strategies\Md5Sha1;
use HASH\strategies\Md5Sha1Salt;
use HASH\strategies\SaltMd5;
use HASH\strategies\SaltMd5Sha1;
use HASH\strategies\SaltSha1;
use HASH\strategies\SaltSha1Md5;
use HASH\strategies\Sha1;
use HASH\strategies\Sha1Md5;
use HASH\strategies\Sha1Md5Salt;
use HASH\strategies\Sha1Salt;
use HASH\strategies\Sha1SaltMd5;
use \Exception;
/**
 * @package HASH
 * @since 1.0
 */
abstract class HASH
{
	const VERSION = 1.1;
	/**
	 * Strategies.
	 */
	const MD5 = 1;
	const MD5_SALT = 2;
	const SALT_MD5 = 3;
	const SHA1 = 4;
	const SHA1_SALT = 5;
	const SALT_SHA1 = 6;
	const MD5_SHA1 = 7;
	const SHA1_MD5 = 8;
	const MD5_SHA1_SALT = 9;
	const MD5_SALT_SHA1 = 10;
	const SALT_MD5_SHA1 = 11;
	const SHA1_MD5_SALT = 12;
	const SHA1_SALT_MD5 = 13;
	const SALT_SHA1_MD5 = 14;
	const BLOWFISH = 15;
	const BLOWFISH_SALT = 16;
	const BLOWFISH_RANDOM_SALT = 17;
	/**
	 * Tasks.
	 */
	const COMMON = 0;
	const PASSWORD = 1;
	const EMAIL = 2;
	/**
	 * Map.
	 */
	protected static $_strategiesMap = array(
		self::MD5 => 'Md5',
		self::MD5_SALT => 'Md5Salt',
		self::SALT_MD5 => 'SaltMd5',
		self::SHA1 => 'Sha1',
		self::SHA1_SALT => 'Sha1Salt',
		self::SALT_SHA1 => 'SaltSha1',
		self::MD5_SHA1 => 'Md5Sha1',
		self::SHA1_MD5 => 'Sha1Md5',
		self::MD5_SHA1_SALT => 'Md5Sha1Salt',
		self::MD5_SALT_SHA1 => 'Md5SaltSha1',
		self::SALT_MD5_SHA1 => 'SaltMd5Sha1',
		self::SHA1_MD5_SALT => 'Sha1Md5Salt',
		self::SHA1_SALT_MD5 => 'Sha1SaltMd5',
		self::SALT_SHA1_MD5 => 'SaltSha1Md5',
		self::BLOWFISH => 'Blowfish',
		self::BLOWFISH_SALT => 'BlowfishSalt',
		self::BLOWFISH_RANDOM_SALT => 'BlowfishRandomSalt',
	);
	/**
	 * Tasks map.
	 */
	protected static $_tasksMap = array(
		self::COMMON => self::MD5,
		self::PASSWORD => self::SHA1_MD5,
		self::EMAIL => self::SHA1,
	);
	/**
	 * @var array
	 */
	protected static $_instances = array();

	/**
	 * Registry.
	 *
	 * Configuration:
	 * <code>
	 * array(
	 * 	['strategy' => HASH::MD5..HASH::SALT_SHA1_MD5,]
	 * 	['salt' => '%string',]
	 * 	['cost' => '%string',]
	 * );
	 * </code>
	 * @param int $key
	 * @param array $config
	 * @return iHash
	 * @throws Exception
	 */
	public static function getInstance($key = self::COMMON, array $config = array())
	{
		if ( ! is_int($key)) {
			throw new Exception('_invalid_args');
		}
		if ( ! isset(self::$_instances[$key])) {
			$config = array_merge(
				array(
					'strategy' => isset(self::$_tasksMap[$key]) ? self::$_tasksMap[$key] : self::$_tasksMap[self::COMMON],
					'salt' => substr(md5(__CLASS__), 0, 22),
					'cost' => 11,
				),
				$config
			);
			if ( ! isset(self::$_strategiesMap[$config['strategy']])) {
				throw new Exception('_unknown_strategy');
			}
			$strategy = self::$_strategiesMap[$config['strategy']];
			class_exists($strategy) or require "HASH/strategies/{$strategy}.php";
			self::$_instances[$key] = new $strategy($config);
		} elseif ( ! empty($config)) {
			throw new Exception('_already_exist_and_unmodified');
		}
		return self::$_instances[$key];
	}
}