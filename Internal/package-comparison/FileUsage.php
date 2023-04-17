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

class FileUsage
{
    /**
     * Usage file list
     * 
     * @param string $result = NULL
     * 
     * @return array
     */
    public static function list(string $result = NULL) : array
    {
        if( empty($result) )
        {
            return get_required_files();
        }

        $resend  = $result."_end";
        $restart = $result."_start";

        if( ! isset(Properties::$usedtests[$restart]) )
        {
            throw new Exception\InvalidParameterException(NULL, ['&' => 'usedFiles', '%' => $result, 'start']);
        }

        if( ! isset(Properties::$usedtests[$resend]) )
        {
            throw new Exception\InvalidParameterException(NULL, ['&' => 'usedFiles', '%' => $result, 'end']);
        }

        return array_diff(Properties::$usedtests[$resend], Properties::$usedtests[$restart]);
    }

    /**
     * Used file count
     * 
     * @param string $result = NULL
     * 
     * @return int
     */
    public static function count(string $result = NULL) : int
    {
        if( empty($result) )
        {
            return count(get_required_files());
        }

        $resend  = $result."_end";
        $restart = $result."_start";

        if( ! isset(Properties::$usedtests[$restart]) )
        {
            throw new Exception\InvalidParameterException(NULL, ['&' => 'usedFileCount', '%' => $result, 'start']);
        }

        if( ! isset(Properties::$usedtests[$resend]) )
        {
            throw new Exception\InvalidParameterException(NULL, ['&' => 'usedFileCount', '%' => $result, 'end']);
        }

        return count(Properties::$usedtests[$resend]) - count(Properties::$usedtests[$restart]);
    }
}
