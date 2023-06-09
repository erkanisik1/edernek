<?php namespace ZN\Controller;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Singleton;
use ZN\Autoloader;

#[\AllowDynamicProperties]

class Base
{
    /**
     * Magic get
     * 
     * @param string $class
     * 
     * @return mixed
     */
    public function __get($class)
    {
        if( ! isset($this->$class) )
        {
            $this->$class = Singleton::class($class);
        }

        return $this->$class;
    }

    /**
     * Reload ClassMap
     * 
     * @param void
     * 
     * @return $this
     */
    public function reload()
    {
        Autoloader::restart();

        return $this;
    }
}
