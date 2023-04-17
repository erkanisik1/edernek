<?php namespace ZN\Services\Exception;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Ability\Exclusion;

class InvalidArgumentException extends \InvalidArgumentException
{
    use Exclusion;

    const lang = 
    [
        'en' => '`%` parameter should contain the resource data type!',
        'tr' => '`%` parametresi kaynak(resource) veri türü içermelidir!'
    ];
}
