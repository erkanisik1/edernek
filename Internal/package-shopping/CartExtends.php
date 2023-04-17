<?php namespace ZN\Shopping;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Ability\Driver;

class CartExtends
{
    use Driver;

    /**
     * Driver
     * 
     * @param array  options
     * @param string construct
     */
    const driver =
    [
        'options'   => ['session', 'cookie'],
        'default'   => 'ZN\Shopping\ShoppingDefaultConfiguration',
        'config'    => 'Storage:shopping',
        'construct' => 'constructor'
    ];

    /**
     * Keeps key
     * 
     * @var string
     */
    protected $key;

    /**
     *  Constructor
     * 
     * @param void
     * 
     * @return void
     */
    public function constructor()
    {
        $this->key = md5('SystemCartData');

        if( $sessionCart = $this->driver->select($this->key) )
        {
            Properties::$items = $sessionCart;
        }
    }
}
