<?php namespace ZN\Crontab;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */
class Limit extends QueueLimitExtends
{
    /**
     * Keeps queue file name.
     * 
     * @var string
     */
    protected $file = 'Limit.json';

    /**
     * Magic constructor
     * 
     * @param string $path
     */
    public function __construct(int $getLimit, Job $crontab)
    {
        $backtrace = (object) debug_backtrace(2)[4];

        $id = $crontab->getJobIdFromExecFileWithTerm($backtrace->class, $backtrace->function);

        if( $id !== false )
        {
            $this->start($id, 1, $key, $getJsonData, $limit, $crontab);

            if( $limit === $getLimit )
            {
                $this->removeKeyFromJsonData($key, $getJsonData);
            }
            else
            {
                $getJsonData[$key] = ++$limit;   
            }
            
            $this->end($getJsonData);
        }
    } 
}
