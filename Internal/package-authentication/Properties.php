<?php namespace ZN\Authentication;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

class Properties
{
    /**
     * Keeps parameters
     * 
     * @var array
     */
    public static $parameters = [];

    /**
     * Keeps errors
     * 
     * @var array
     */
    public static $error;

    /**
     * Keeps success
     * 
     * @var array
     */
    public static $success;

    /**
     * Redirecting
     * 
     * @var array
     */
    public static $redirectExit = true;

    /**
     * Keeps set email template
     * 
     * 5.7.3[added]
     * 
     * @var string
     */
    public static $setEmailTemplate = NULL;

    /**
     * Keeps set email subject. [6.7.0]
     * 
     * @var string
     */
    public static $setEmailTemplateSubject = NULL;
}
