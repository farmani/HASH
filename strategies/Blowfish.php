<?php
/**
 * @author Samigullin Kamil <feedback@kamilsk.com>
 * @link http://www.kamilsk.com/
 */
namespace HASH\strategies;
use HASH\abstracts\SimpleBlowfish;
class_exists('HASH\abstracts\SimpleBlowfish', false) or require 'HASH/abstracts/SimpleBlowfish.php';
/**
 * @package HASH.strategies
 * @since 1.1
 */
final class Blowfish extends SimpleBlowfish
{}