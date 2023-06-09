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

use stdClass;
use ZN\Inclusion\Project\View;

#[\AllowDynamicProperties]

class Controller
{
    /**
     * Magic Constructor
     */
    public function __construct()
    {
        if( defined('static::restore') )
        {      
            Restoration::mode(static::restore); // @codeCoverageIgnore
        }

        if( defined('static::extract') || Config::starting('extractViewData') === true ) foreach( View::$data as $key => $val )
        {
            $this->$key = $val; // @codeCoverageIgnore
        }
        
        View::getZNClassInstance($this);
    }

    /**
     * Restart create class map
     * 
     * @return true
     */
    public function restart()
    {
        return Autoloader::restart();
    }

    /**
     * Magic Get
     * 
     * @param string $class
     * 
     * @return object
     */
    public function __get($class)
    {
        if( ! isset($this->$class) )
        {
            $this->$class = Singleton::class($class);
        }

        return $this->$class;
    }
}
