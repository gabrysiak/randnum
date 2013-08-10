<?php
/**
 * @author Tom Gabrysiak
 * @version 1.0
 *
 * Compares 2 random generated numbers to see if they are equal
 * 
 * Class needs to be initialized before chaining other methods.
 * 
 * Example:
 * Contest::initialize(1)->determineWinner();
 * 
 */
namespace RandNum;


class RandomNumber
{
	/**
	 * Number of digits both random numbers should contain
	 * @var int
	 */
	private static $_digits;

	/**
	 * First random generated number
	 * @var mixed
	 */
	private static $_firstRoll;

	/**
	 * Second random generated number
	 * @var mixed
	 */
	private static $_secondRoll;

	/**
	 * Contains result of random number comparison
	 * @var bool
	 */
	private static $_result;

	/**
	 * mySql formatted timestamp
	 * @var mixed
	 */
	private static $_timestamp;


	/**
	 * Generate our first random number
	 * @return mixed 	initial random number
	 */
	private static function firstRoll()
	{
		return static::$_firstRoll = str_pad(rand(0, pow(10, static::$_digits)-1), static::$_digits, '0', STR_PAD_LEFT);	
	}


	/**
	 * Instantiate method initializing our class
	 * @param  int $digits 	 number of digits the random number should contain
	 * @return object        
	 */
	public static function initialize($digits)
	{
		static::$_digits = (int)$digits;
		return new static;
	}


	/**
	 * Generate our second random number
	 * @return mixed 	second random number
	 */
	private static function secondRoll()
	{	
		
		return static::$_secondRoll = str_pad(rand(0, pow(10, static::$_digits)-1), static::$_digits, '0', STR_PAD_LEFT);
	
	}

	
	/**
	 * Create timestamp incase we need to track time when winner occured
	 * @return mixed mysql ready timestamp
	 */
	public static function createTimestamp()
	{
		$time = new DateTime('NOW');
		return static::$_timestamp = $time->format('Y-m-d H:i:s');
	}

	
	/**
	 * Compare 2 random numbers for equality
	 * @return bool if equal return true otherwise return false
	 */
	private static function compareNumbers()
	{
		return static::$_result = (static::firstRoll() == static::secondRoll() ? true : false);
	}

	
	/**
	 * Create 2 random numbers, compare them and return result
	 * @return  bool true or false if random generated numbers are equal
	 */
	public static function executeRolls()
	{
		return static::compareNumbers();
	}

}

