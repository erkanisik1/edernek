<?php namespace ZN\Comparison;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

class ElapsedTime
{
    /**
     * Calculate elapsed time
     * 
     * @param string $result
     * @param int    $decimal = 4
     * 
     * @return float
     */
    public static function calculate(string $result, int $decimal = 4) : Float
    {
        $resend  = $result."_end";
        $restart = $result."_start";

        if( ! isset(Properties::$tests[$restart]) )
        {
            throw new Exception\InvalidParameterException(NULL, ['&' => 'elapsedTime', '%' => $result, 'start']);
        }

        if( ! isset(Properties::$tests[$resend]) )
        {
            throw new Exception\InvalidParameterException(NULL, ['&' => 'elapsedTime', '%' => $result, 'end']);
        }

        return round(((float) Properties::$tests[$resend] - (float) Properties::$tests[$restart]), $decimal);
    }
}
