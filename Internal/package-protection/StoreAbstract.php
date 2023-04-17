<?php namespace ZN\Protection;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Base;
use ZN\Protection\Exception\ScalarDataException;

abstract class StoreAbstract
{
    /**
     * Encode
     * 
     * @param mixed  $data
     * @param string $type = 'unescapedUnicode'
     * 
     * @return string
     */
    abstract public static function encode($data) : string;

    /**
     * Decode
     * 
     * @param string $data
     * @param bool   $array  = false
     * @param int    $length = 512
     * 
     * @return mixed
     */
    abstract public static function decode(string $data);

    /**
     * Decode Object
     * 
     * @param string $data
     * @param int    $length = 512
     * 
     * @return object
     */
    abstract public static function decodeObject(string $data);

   /**
     * Decode Array
     * 
     * @param string $data
     * @param int    $length = 512
     * 
     * @return array
     */
    abstract public static function decodeArray(string $data) : array;

    /**
     * Error
     * 
     * @param void
     * 
     * @return string
     */
    public static function error() : string
    {
        return false;
    }
    
    /** 
     * Error No
     * 
     * @param void
     * 
     * @return int
     */
    public static function errno() : int
    {
        return 0;
    }
    
    /** 
     * Check
     * 
     * @param string $data
     * 
     * @return bool
     */
    public static function check(string $data) : bool
    {
        return true;
    }
}
