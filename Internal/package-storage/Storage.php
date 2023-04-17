<?php namespace ZN\Storage;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Ability\Container;

class Storage
{
    use Container;

    /**
     * Magic constructor
     * 
     * @param StorageInterface $storage
     */
    public function __construct(StorageInterface $storage = NULL)
    {
        self::$container = $storage;
    }
}
