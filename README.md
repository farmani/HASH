HASH Library
============

## About
Main purpose - **encapsulate** hashing mechanisms and **give** to them a convenient and simple interface of access:

```php
// give default strategy (task: HASH::COMMON, strategy: HASH::MD5)
$hash = HASH::getInstance();

// give default strategy for password caching (strategy: HASH::SHA1_MD5)
$hash = HASH::getInstance(HASH::PASSWORD);

// give selected strategy for password caching
$hash = HASH::getInstance(HASH::PASSWORD, array(
	'strategy' => HASH::MD5_SALT_SHA1,		// some strategies require salt, by default $salt = substr(md5(__CLASS__), 0, 22)
	'salt' => $this->config->item('salt'),	// salt, for example, can be stored globally in the site settings
));
```


## Preparation
Classes are connected via a **relative path**.

```php
set_include_path(get_include_path() . PATH_SEPARATOR . 'path/to/folder/which/contains/HASH');
```


## Work with library
Hashing and comparing:

```php
$hash = HASH::getInstance(HASH::PASSWORD);
echo $hash->make($string);

if ($hash->compare($input, $stored)) {
	echo 'Match';
} else {
	echo 'Do not match';
}
```


## Unit tests
All tests located at `tests` folder. You can run it as follows:

```
% phpunit StrategiesUnitTest
% phpunit ComponentUnitTest
```