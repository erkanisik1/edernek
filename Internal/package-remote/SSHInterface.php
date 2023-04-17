<?php namespace ZN\Remote;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

interface SSHInterface
{
    /**
     * Output
     * 
     * @param int $length = 4096
     * 
     * @return string
     */
    public function output(int $length = 4096) : string;

    /**
     * Command
     * 
     * @param string $command
     * 
     * @return SSH
     */
    public function command(string $command) : SSH;

    /**
     * Run
     * 
     * @param string $command = NULL
     * 
     * @return resource|false
     */
    public function run(string $command = NULL);
}
