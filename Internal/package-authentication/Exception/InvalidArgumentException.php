<?php namespace ZN\Authentication\Exception;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Exception;

class InvalidArgumentException extends Exception
{
    const lang = 
    [
        'tr' => '[%] parametre geçersiz bilgi içeriyor!', 
        'en' => '[%] parameter contains invalid information!'
    ];
}
