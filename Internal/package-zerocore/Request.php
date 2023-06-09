<?php namespace ZN;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

class Request
{   
    /**
     * Protected keeps lang
     * 
     * @var string
     */
    public static $lang = NULL;

    /**
     * Request method type
     * 
     * @param string ...$methods
     * 
     * @returm bool
     */
    public static function isMethod(...$methods) : bool
    {
        if( ! in_array(strtolower($_SERVER['REQUEST_METHOD'] ?? false), $methods) )
        {
            return false;
        }

        return true;
    }

    /**
     * Request is ajax
     * 
     * @param bool
     */
    public static function isAjax() : bool
    {
        if( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * IP v4
     * 
     * @param void
     * 
     * @return string
     */
    public static function ipv4() : string
    {
        $localIP = '127.0.0.1';

        if( isset($_SERVER['HTTP_CLIENT_IP']) )
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif( isset($_SERVER['HTTP_X_FORWARDED_FOR']) )
        {
            $ip = Datatype::divide($_SERVER['HTTP_X_FORWARDED_FOR'], ',');
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'] ?? $localIP;
        }

        if( $ip === '::1')
        {
            $ip = $localIP;
        }

        return $ip;
    }

    /**
     * Get active URI
     * 
     * @param bool $fullPath = false
     * 
     * @return string
     */
    public static function getActiveURI(bool $fullPath = false) : string
    {
        # 5.3.22[edited]
        $requestUri = Base::suffix($_SERVER['REQUEST_URI'] ?? false);
       
        $currentUri = ! empty(BASE_DIR)
                      ? str_replace(Base::prefix(BASE_DIR, '/'), '', $requestUri)
                      : substr($requestUri, 1);

        if( $fullPath === false )
        {
            $currentUri = In::cleanURIPrefix($currentUri, In::getCurrentProject());

            if( $currentLang = Lang::current() )
            {
                $isLang = Datatype::divide($currentUri, '/');

                if( strlen($isLang) === 2 )
                {
                    $currentLang = $isLang; // @codeCoverageIgnore
                }

                $currentUri = In::cleanURIPrefix($currentUri, $currentLang);
            }
        }

        return $currentUri ?: ((Config::get('Routing', 'openController') ?: 'Home') . '/');
    }

    /**
     * Get site URL
     * 
     * @param string $uri = NULL
     * 
     * @return string
     */
    public static function getSiteURL(string $uri = NULL) : string
    {
        $return = self::getHostName
        (
            BASE_DIR.
            In::getCurrentProject().
            Base::suffix(self::$lang ?? Lang::current()).
            $uri
        );

        self::$lang = NULL;

        return $return;
    }

    /**
     * Get base URL
     * 
     * @param string $uri = NULL
     * 
     * @return string
     */
    public static function getBaseURL(string $uri = NULL) : string
    {
        return self::getHostName(BASE_DIR . $uri);
    }


    /**
     * Get host name
     * 
     * @param string $uri = NULL
     * 
     * @return string
     */
    public static function getHostName(string $uri = NULL) : string
    {
        return SSL_STATUS . Base::host() . '/' . In::cleanInjection(ltrim($uri ?? '', '/'));
    }
}