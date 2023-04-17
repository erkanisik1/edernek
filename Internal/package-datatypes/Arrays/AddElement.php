<?php namespace ZN\DataTypes\Arrays;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

class AddElement
{
    /**
     * Add First
     * 
     * @param array $array
     * @param mixed $element
     * 
     * @return array
     */
    public static function first(array $array, $element, $type = 'array_unshift') : array
    {
        if( ! is_array($element) )
        {
            $type($array, $element);
        }
        else
        {
            if( $type === 'array_unshift' )
            {
                $array = array_merge($element, $array);
            }
            else
            {
                $array = array_merge($array, $element);
            }
        }

        return $array;
    }

    /**
     * Add Last
     * 
     * @param array $array
     * @param mixed $element
     * 
     * @return array
     */
    public static function last(array $array, $element) : array
    {
        return self::first($array, $element, 'array_push');
    }
}
