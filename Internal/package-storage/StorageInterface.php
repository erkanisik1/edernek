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

interface StorageInterface
{
    /**
     * Inserts at the beginning of the data.
     * 
     * @return this
     */
    public function first();

    /**
     * Inserts at the lasting of the data.
     * 
     * @return this
     */
    public function last();

    /**
     * Encode session key & value
     * 
     * @param string $nameAlgo  = NULL
     * @param string $valueAlgo = NULL
     * 
     * @return $this
     */
    public function encode(string $name, string $value);
    
    /**
     * Decode only session key
     * 
     * @param string $nameAlgo
     * 
     * @return $this
     */
    public function decode(string $hash);
    
    /**
     * Regenerate status
     * 
     * @param bool $regenerate = true
     * 
     * @return $this
     */
    public function regenerate(bool $regenerate);

    /**
     * Insert session
     * 
     * @param string $name
     * @param mixed  $value
     * 
     * @return bool
     */
    public function insert(string $name, $value) : bool;

    /**
     * Select session
     * 
     * @param string $name
     * 
     * @return mixed
     */
    public function select(string $name);

    /**
     * Delete session
     * 
     * @param string $name
     * 
     * @return bool
     */
    public function delete(string $name) : bool;

    /**
     * Select all session
     * 
     * @param void
     * 
     * @return array
     */
    public function selectAll() : array;

    /**
     * Delete all session
     * 
     * @param void
     * 
     * @return void
     */
    public function deleteAll() : bool;

    /**
     * Session start
     * 
     * @param void
     * 
     * @return void
     */
    public static function start();
}