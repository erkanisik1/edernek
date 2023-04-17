<?php namespace ZN\Cryptography\Exception;
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
        'en' => '`string $type` parameter should contain the hash algos(md5, sha1) data type!',
        'tr' => '`string $type` parametresi şifreleme algoritmalarıdan(md5, sha1) birini içermelidir!'
    ];
}
