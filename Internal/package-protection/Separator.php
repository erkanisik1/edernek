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

use stdClass;

class Separator extends StoreAbstract implements StoreInterface
{
    use StoreTrait;
    
    /**
     * Keeps key
     * 
     * @var string
     */
    protected static $key = "+-?||?-+" ;

    /**
     * Keeps separator
     * 
     * @var string
     */
    protected static $separator = "|?-++-?|";

    /**
     * Encode
     * 
     * @param array  $data
     * @param string $type = 'unescapedUnicode'
     * 
     * @return string
     */
    public static function encode($data, string $key = NULL, string $separator = NULL) : string
    {
        if( ! is_scalar($data) )
        {
            $data = (array) $data;
        }
        
        $word      = '';
        $key       = $key       ?: self::$key;
        $separator = $separator ?: self::$separator;
 
        foreach( $data as $k => $v )
        {
            $word .= self::_security($k).$key.self::_security($v).$separator;
        }

        return mb_substr($word, 0, -(mb_strlen($separator)));
    }

    /**
     * Decode
     * 
     * @param string $data
     * @param string $key       = NULL
     * @param string $separator = NULL
     * 
     * @return object
     */
    public static function decode(string $data, string $key = NULL, string $separator = NULL) : stdClass
    {
        $key       = $key       ?: self::$key;
        $separator = $separator ?: self::$separator;

        $keyval = explode($separator, $data);
        $splits = [];
        $object = [];

        if( is_array($keyval) ) foreach( $keyval as $v )
        {
             $splits = explode($key, $v);

             if( isset($splits[1]) )
             {
                $object[$splits[0]] = $splits[1];
             }
        }

        return (object) $object;
    }

    /**
     * Decode Object
     * 
     * @param string $data
     * @param string $key       = NULL
     * @param string $separator = NULL
     * 
     * @return object
     */
    public static function decodeObject(string $data, string $key = NULL, string $separator = NULL) : stdClass
    {
        return self::decode($data, $key, $separator);
    }

    /**
     * Decode Array
     * 
     * @param string $data
     * @param string $key       = NULL
     * @param string $separator = NULL
     * 
     * @return array
     */
    public static function decodeArray(string $data, string $key = NULL, string $separator = NULL) : array
    {
        return (array) self::decode($data, $key, $separator);
    }

    /**
     * Protected Security
     * 
     * @param string $data
     */
    protected static function _security($data)
    {
        return str_replace([self::$key, self::$separator], '', $data ?? '');
    }
}
