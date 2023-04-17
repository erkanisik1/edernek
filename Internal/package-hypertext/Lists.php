<?php namespace ZN\Hypertext;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Hypertext\HtmlHelpersAbstract;
use ZN\DataTypes\Arrays;
use ZN\Base;
use ZN\IS;

class Lists extends HtmlHelpersAbstract
{
    /**
     * Create"
     * 
     * @param array ...$elements
     */
    public function create(...$elements) : string
    {
        return $this->_element($elements[0], '', 0);
    }

    /**
     * Protected element
     */
    protected function _element($data, $tab, $start)
    {
        static $start;

        $output  = '';
        $attrs   = '';
        $tab     = str_repeat("\t", (int) $start);

        if( ! is_array($data) )
        {
            return $data.$eof;
        }
        else
        {
            foreach( $data as $k => $v )
            {
                if( IS::realNumeric($k) )
                {
                    $value = $k;
                    $k     = 'li';
                }
                else
                {
                    $value = '';
                }

                $end = Base::prefix(Arrays\GetElement::first(explode(' ', $k)));

                if( ! is_array($v) )
                {

                    $output .= $tab . '<' . $k . '>' . $v . '<' . $end . '>' . EOL;
                }
                else
                {
                    if( stripos($k, 'ul') !== 0 && stripos($k, 'ol') !== 0 && $k !== 'li' )
                    {
                        $value = $k;
                        $k     = 'li';
                        $end   = Base::prefix($k);
                    }
                    else
                    {
                        $value = '';
                    }

                    $output .= $tab . '<' . $k . '>' . $value . EOL . $this->_element($v, $tab, $start++) . $tab . '<' . $end . '>' . $tab . EOL;
                    $start--;
                }
            }
        }

        return $output;
    }
}
