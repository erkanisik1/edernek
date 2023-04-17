<?php namespace ZN\Authorization;
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
use ZN\Config;
use ZN\Response;
use ZN\Singleton;
use ZN\Request\Method;
use ZN\Protection\Json;

class PermissionExtends
{
    /**
     * Permission
     * 
     * @var array
     */
    protected static $permission = [];

    /**
     * Result
     * 
     * @var string
     */
    protected static $result;

    /**
     * Content
     * 
     * @var string
     */
    protected static $content;

    /**
     * Role ID
     * 
     * @var mixed
     */
    public static $roleId;

    /**
     * Role ID
     * 
     * @param mixed $roleId
     * 
     * @return void
     */
    public static function roleId($roleId)
    {
        self::$roleId = $roleId;
    }

    /**
     * Get permission rules
     * 
     * @param string     $type   = 'page'
     * @param int|string $ruleId = NULL
     * 
     * @return array|string
     */
    public static function getPermRules(string $type = 'page', $roleId = NULL)
    {
        return self::getNopermRules($type, $roleId, 'perm');
    }

    /**
     * Get no permission rules
     * 
     * @param string     $type   = 'page'
     * @param int|string $ruleId = NULL
     * 
     * @return array|string
     */
    public static function getNopermRules(string $type = 'page', $roleId = NULL, $ptype = 'noperm')
    {
        $rules = self::getConfigByType($type);

        $roleId = $roleId ?? self::$roleId;

        if( is_array($return = ($rules[$roleId] ?? NULL)) )
        {
            return $return[$ptype];
        }

        return $return; // @codeCoverageIgnore
    }

    /**
     * Set permission rules
     * 
     * @param array      $config
     * @param int|string $ruleId = NULL
     * 
     * @return array|string
     */
    protected static function setPermRules(array $config, $roleId = NULL, $ptype = 'perm')
    {
        $roleId   = $roleId ?? self::$roleId;
        $configs  = array_keys(self::getConfigByType(NULL));
        $newRules = [];

        foreach( $configs as $con )
        {
            if( $subconfig = ($config[$con] ?? NULL) )
            {
                if( is_string(self::getJsonDataToDatabaseAfterConvertArray($subconfig, $roleId)) )
                {
                    $add = $subconfig; // @codeCoverageIgnore
                }
                else
                {
                    $add = [$ptype => $subconfig];
                }

                $newRules[$con] = [$roleId => $add];
            } 
        }

        Config::set('Auth', $newRules);
    }

    /**
     * Set no permission rules
     * 
     * @param array      $config
     * @param int|string $ruleId = NULL
     * 
     * @return array|string
     */
    protected static function setNopermRules(array $config, $roleId = NULL)
    {
        self::setPermRules($config, $roleId, 'noperm');
    }

    /**
     * Permission Common
     * 
     * @param mixed $roleId   = 6
     * @param mixed $process  = NULL
     * @param mixed $object   = NULL
     * @param mixed $function = NULL
     * @param mixed $realpath = NULL
     * 
     * @return mixed
     */
    protected static function common($roleId = 6, $process = NULL, $object = NULL, $function = NULL, $realpath = NULL)
    {
        self::$permission = self::getConfigByType($function);

        if( isset(self::$permission[$roleId]) )
        {
            $rules = self::$permission[$roleId];
        }
        else
        {
            return false;
        }

        if( $function === 'method' )
        {
            $currentUrl = NULL;
        }
        else
        {
            $currentUrl = $process ?? $realpath ?? Base::currentPath();
        }

        $object = $object ?? true;
    
        switch( $rules ?? NULL )
        {
            case 'all': return $object;
            case 'any': return false;
        }  
        
        $pages = current($rules); $type = key($rules);

        foreach( $pages as $page )
        {
            $page = trim((string) $page);

            $rule = strpos((string) $page[0], '!') === 0 ? substr((string) $page, 1) : $page;
    
            // @codeCoverageIgnoreStart
            if( $type === 'perm' )
            {
                if( self::control($currentUrl, $rule, $process, $function) )
                {
                    return $object;
                }
                else
                {
                    self::$result = false;
                }
            }
            // @codeCoverageIgnoreEnd
            else
            {

                if( self::control($currentUrl, $rule, $process, $function) )
                {
                   return false;
                }
                else
                {
                    self::$result = $object;
                }
            }
        }

        return self::$result;   
    }

    /**
     * Control Permission
     * 
     * @param string $currentUrl
     * @param string $page
     * @param string $process
     * @param string $function
     * 
     * @return string
     */
    protected static function control($currentUrl, $page, $process, $function)
    {
        if( $function === 'method' )
        {
            return Method::$process($page);
        }

        return strpos(strtolower((string) $currentUrl), strtolower((string) $page)) > -1;
    }

    /**
     * Protected get config by type
     */
    protected static function getConfigByType($type)
    {
        $config = Config::default('ZN\Authorization\AuthorizationDefaultConfiguration')::get('Auth');

        if( $type === NULL )
        {
            return $config;
        }

        return $config[$type] ?? [];
    }

    /**
     * Protected predefined Permission Configuration
     */
    protected static function predefinedPermissionConfiguration($roleId, $table, $callback, $ctype, $code)
    {
        self::selectSetPermissionType($roleId, $table, $ctype);
        
        if( ! self::common(...$code) )
        {
            if( is_callable($callback) )
            {
                return $callback();
            }
            else
            {
                Response::redirect($callback); // @codeCoverageIgnore
            }
        }

        return false; // @codeCoverageIgnore
    }

    /**
     * Protected select set permission type
     */
    protected static function selectSetPermissionType($roleId, $table, $ctype)
    {
        self::roleId($roleId);

        $type   = key($table);
        $rules  = current($table);
        $func   = $type === 'perm' ? 'setPermRules' : 'setNopermRules';

        self::$func([$ctype => $rules]);
    }

    /**
     * Protected get json data to databse after convert array
     */
    protected static function getJsonDataToDatabaseAfterConvertArray(&$subconfig, $roleId)
    {
        if( preg_match('/(?<table>\w+)\[(?<column>\w+)\]\:(?<select>\w+)/', $subconfig, $match) )
        {
            $json = Singleton::class('ZN\Database\DB')
                             ->where($match['column'], $roleId)
                             ->select($match['select'])
                             ->get($match['table'])
                             ->value();
           
            if( Json::check($json) )
            {
                $subconfig = json_decode($json);
            }
            else
            {
                $subconfig = $json; // @codeCoverageIgnore
            }      
        }

        return $subconfig;
    }
}
