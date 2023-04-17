<?php namespace ZN\Services;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Config;
use ZN\Ability\Driver;

class CDN implements CDNInterface
{  
    use Driver;

    /**
     * Driver
     * 
     * @param array driver
     */
    const driver =
    [
        'options'   => ['cloudflare'],
        'namespace' => 'ZN\Services\CDNDrivers',
        'default'   => 'ZN\Services\CDNDefaultConfiguration'
    ];

    /**
     * Get Links
     * 
     * @return array
     */
    public function links() : array
    {
        return $this->driver->getLinks();
    }

    /**
     * Get link
     * 
     * @param string $key
     * @param string $version = 'latest'
     * 
     * @return string|false
     */
    public function link(string $key, string $version = 'latest')
    {
        return $this->driver->getLink($key, $version);
    }

    /**
     * Refresh request api.
     * 
     * @return $this
     */
    public function refresh() : CDN
    {
        $this->driver->refresh();

        return $this;
    }

    /**
     * Set json file path.
     * 
     * @param string $jsonFile
     * 
     * @return $this
     */
    public function setJsonFile(string $jsonFile) : CDN
    {
        $this->driver->setJsonFile($jsonFile);

        return $this;
    }

    /**
     * Get cdn data.
     * 
     * @param string $configName
     * @param string $name
     * 
     * @return string
     */
    public static function get(string $configName, string $name) : string
    {
        $config = Config::default('ZN\Services\CDNDefaultConfiguration')
                        ::get('CDNLinks');

        $configData = ! empty($config[$configName]) ? $config[$configName] : '';

        if( empty($configData) )
        {
            return false;
        }

        $data = array_change_key_case($configData);
        $name = strtolower($name);

        if( isset($data[$name]) )
        {
            return $data[$name];
        }
        else
        {
            return $data; // @codeCoverageIgnore
        }
    }

    /**
     * Get value.
     * 
     * @param string $name
     * 
     * @return string
     */
    public static function image(string $name) : string
    {
        return self::get('images', $name);
    }

    /**
     * Get value.
     * 
     * @param string $name
     * 
     * @return string
     */
    public static function style(string $name) : string
    {
        return self::get('styles', $name);
    }

    /**
     * Get value.
     * 
     * @param string $name
     * 
     * @return string
     */
    public static function script(string $name) : string
    {
        return self::get('scripts', $name);
    }

    /**
     * Get value.
     * 
     * @param string $name
     * 
     * @return string
     */
    public static function font(string $name) : string
    {
        return self::get('fonts', $name);
    }

   /**
     * Get value.
     * 
     * @param string $name
     * 
     * @return string
     */
    public static function file(string $name) : string
    {
        return self::get('files', $name);
    }
}
