<?php namespace ZN\Validation;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

interface DataInterface
{
    /**
     * It checks the data.
     * 
     * @param string $submit = NULL
     * 
     * @return bool
     */
    public function check(string $submit = 'all') : bool;

    /**
     * Defines rules for control of the grant.
     * 
     * @param string $name
     * @param array  $config   = []
     * @param string $viewName = ''
     * @param string $met      = 'post' - options[post|get]
     * 
     * @return void
     */
    public function rules(string $name, array $config = [], $viewName = '', string $met = 'post');

    /**
     * Sets user messages
     * 
     * @param array $settings
     */
    public function messages(array $settings);

    /**
     * Add errors
     * 
     * @param string $error
     * @param string $name = NULL
     * 
     * @return self
     */
    public function addError(string $error, string $name = NULL);

    /**
     * Get error
     * 
     * @param string $name      = 'array' - options[array|string]
     * @param string $separator = '<br>'
     */
    public function error(String $name = 'array', string $separator = '<br>');

    /**
     * Get input post back.
     * 
     * @param string $name
     * @param string $met = 'post' - options[post|get]
     */
    public function postBack(string $name, string $met = 'post');

    /**
     * Get error inputs.
     * 
     * @return array
     */
    public function errorInputs();
}
