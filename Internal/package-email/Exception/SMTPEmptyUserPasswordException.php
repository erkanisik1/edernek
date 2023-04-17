<?php namespace ZN\Email\Exception;
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

class SMTPEmptyUserPasswordException extends \InvalidArgumentException
{
    use Exclusion;

    const lang = 
    [
        'en' => 'You must assign a SMTP username and password!',
        'tr' => 'Bir SMTP kullanıcı adı ve şifre atamanız gerekir!'
    ];
}
