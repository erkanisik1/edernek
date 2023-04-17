<?php namespace ZN\Prompt;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

/**
 * Default Configuration
 * 
 * Enabled when the configuration file can not be accessed.
 */
class PromptDefaultConfiguration
{
    /*
    |--------------------------------------------------------------------------
    | Prompt
    |--------------------------------------------------------------------------
    |
    | The current PHP path. Especially necessary for crontab.
    |
    */

    public $path   = '/usr/bin/php';
    public $driver = 'exec';
}
