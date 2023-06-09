<?php namespace ZN\ErrorHandling;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Base;
use ZN\Lang;
use ZN\Config;
use ZN\Helper;
use ZN\Datatype;
use ZN\Inclusion;

class Exceptions extends \Exception implements ExceptionsInterface
{   
    /**
     * Error codes
     * 
     * @var array
     */
    public static $errorCodes = 
    [
        1       => 'ERROR',
        2       => 'WARNING',
        4       => 'PARSE',
        8       => 'NOTICE',
        16      => 'CORE_ERROR',
        32      => 'CORE_WARNING',
        64      => 'COMPILE_ERROR',
        128     => 'COMPILE_WARNING',
        256     => 'USER_ERROR',
        512     => 'USER_WARNING',
        1024    => 'USER_NOTICE',
        2048    => 'STRICT',
        4096    => 'RECOVERABLE_ERROR',
        8192    => 'DEPRECATED',
        16384   => 'USER_DEPRECATED',
        32767   => 'ALL'
    ];

    /**
     * Magic to string 
     * 
     * @param void
     * 
     * @return string
     * 
     * @codeCoverageIgnore
     */
    public function __toString()
    {
        return $this->importExceptionTemplate($this->getMessage(), $this->getFile(), $this->getLine(), $this->getTrace());
    }

    /**
     * Throw exception
     * 
     * @param string $message = NULL
     * @param string $key     = NULL
     * @param mixed  $send    = NULL
     * 
     * @return void
     */
    public static function throws(string $message = NULL, string $key = NULL, $send = NULL)
    {
        $debug = self::throwFinder(debug_backtrace(2), 0, 2);

        if( $lang = Lang::default('ZN\CoreDefaultLanguage')::select($message, $key, $send) )
        {
            $message = '['.self::cleanInternalPrefixFromClassName($debug['class']).'::'.$debug['function'].'()] '.$lang;
        }

        self::table('self', $message, $debug['file'], $debug['line']);
    }

    /**
     * Get exception table
     * 
     * @param mixed  $no    = NULL
     * @param string $msg   = NULL
     * @param string $file  = NULL
     * @param string $line  = NULL
     * @param array  $trace = NULL
     * 
     * @return void
     */
    public static function table($no = NULL, string $msg = NULL, string $file = NULL, string $line = NULL, array $trace = NULL)
    {
        if( is_object($no) )
        {
            $msg   = $no->getMessage();
            $file  = $no->getFile();
            $line  = $no->getLine();
            $trace = $no->getTrace(); 
            
            $no    = 'NULL';
        }

        $lang    = Lang::default('ZN\ErrorHandling\ErrorHandlingDefaultLanguage')::select('Templates');
        $message = $lang['line'].':'.$line.', '.$lang['file'].':'.$file.', '.$lang['message'].':'.$msg;

        Helper::report('ExceptionError', $message, 'ExceptionError');

        $table = self::importExceptionTemplate($msg, $file, $line, $no, $trace);

        $projectError = Config::default('ZN\ErrorHandling\ErrorHandlingDefaultConfiguration')::get('Project');

        if
        ( 
            in_array($no, $projectError['exitErrors'] ?? [], true) || 
            in_array(self::$errorCodes[$no] ?? NULL, $projectError['exitErrors'] ?? [], true) 
        )
        {
            defined('ZN_REDIRECT_NOEXIT') || exit($table); // @codeCoverageIgnore
        }

        echo $table;
    }

    /**
     * Continue exception
     * 
     * @param string $msg
     * @param string $file
     * @param string $line
     * 
     * @return string
     */
    public static function continue($msg, $file, $line)
    {
        return self::importExceptionTemplate($msg, $file, $line, NULL, NULL);
    }

    /**
     * Restore exception
     * 
     * @param void
     * 
     * @return bool
     */
    public static function restore() : bool
    {
        return restore_exception_handler();
    }

    /**
     * Set exception handler
     * 
     * @param void
     * 
     * @return void
     */
    public static function handler()
    {
        set_exception_handler([__CLASS__, 'table']);
    }

    /**
     * protected exception template
     * 
     * @param string $msg
     * @param string $file
     * @param string $line
     * @param string $no
     * @param array  $trace
     * 
     * @return string
     */
    private static function importExceptionTemplate($msg, $file, $line, $no, $trace)
    {
        $projects = Config::default('ZN\ErrorHandling\ErrorHandlingDefaultConfiguration')::get('Project');

        if( ! $projects['errorReporting'] )
        {
            return false;
        }

        if( in_array($no, $projects['escapeErrors'], true) || in_array(self::$errorCodes[$no] ?? NULL, $projects['escapeErrors'], true) )
        {
            return false; // @codeCoverageIgnore
        }

        $wizardErrorData = self::getTemplateWizardErrorData($file, $line);

        $exceptionData =
        [
            'type'    => self::$errorCodes[$no] ?? 'ERROR',
            'msg'     => $msg,
            'file'    => $wizardErrorData->file,
            'line'    => $wizardErrorData->line,
            'trace'   => $trace
        ];

        ob_end_clean(); 
        
        return Inclusion\View::use('Table', $exceptionData, true, __DIR__ . '/Resources/');
    }

    /**
     * protected clean class name
     * 
     * @param string $class
     * 
     * @return string
     */
    protected static function cleanInternalPrefixFromClassName($class)
    {
        return str_ireplace(INTERNAL_ACCESS, '', Datatype::divide($class, '\\', -1));
    }

    /**
     * Throw finder
     * 
     * @param array $trace
     * @param int   $p1 = 2
     * @param int   $p2 = 0
     * 
     * @return array
     */
    protected static function throwFinder($trace, $p1 = 3, $p2 = 5)
    {
        $classInfo = $trace[$p1];
        $fileInfo  = $trace[$p2];

        // @codeCoverageIgnoreStart
        if( ! isset($classInfo['class']) && isset($classInfo['function']) )
        {
            $classInfo['class'] = $classInfo['function'];
            $fileInfo['file']   = $classInfo['file'];
            $fileInfo['line']   = $classInfo['line'];
        }
        // @codeCoverageIgnoreEnd

        return
        [
            'class'    => self::cleanInternalPrefixFromClassName($classInfo['class']),
            'function' => $classInfo['function'],
            'file'     => $fileInfo['file'],
            'line'     => $fileInfo['line'],
            'trace'    => $trace
        ];
    }

    /**
     * Handle template wizard
     * 
     * @param void
     * 
     * @return string|null
     * 
     * @codeCoverageIgnore
     */
    protected static function getTemplateWizardErrorData($file, $line)
    {
        if( strstr($file, DS . 'Buffering.php') )
        {
            $trace = debug_backtrace()[6]['args']    ?? [NULL];
            $args  = debug_backtrace()[1]['args'][4] ?? [];
            
            self::searchErrorWizardFile($args, $file, $line);

            self::isWizardOrStandartFileExists($file, $trace);
        }

        return (object)
        [ 
            'file' => $file,
            'line' => $line
        ];
    }

    /**
     * Protected search error wizard file
     * 
     * @codeCoverageIgnore
     */
    protected static function searchErrorWizardFile($args, &$file, &$line)
    {
        foreach( $args as $key => $value )
        {
            if( is_array($value) )
            {
                if( ! isset($line) && isset($value['file']) && stristr($value['file'], DS . 'Buffering.php') )
                {
                    $line = $value['line'] ?? NULL;
                }

                $find = $value['args'][0] ?? NULL;

                if( is_string($find) && preg_match('/(Views\/)*.*?\.\wizard(\.php)*/', $find) )
                {
                    $file = $find;

                    break;
                }
            }
        }
    }

    /**
     * Protected is wizard or standart file exists
     * 
     * @codeCoverageIgnore
     */
    protected static function isWizardOrStandartFileExists(&$file, $trace)
    {
        if( ! is_file($file) )
        {
            $file = Base::prefix($file, VIEWS_DIR);

            if( ! is_file($file) )
            {
                if( ! is_file($rfile = $file . '.php') )
                {
                    if( ! is_file($rfile = $file . '.wizard.php') )
                    {
                        if( isset($trace[0]) && is_file($rfile = Base::suffix(Base::prefix($trace[0], VIEWS_DIR), '.php')) )
                        {
                            $file = $rfile;
                        }
                        else
                        {
                            if( ! is_file($rfile) )
                            {
                                $file = VIEWS_DIR . CURRENT_CONTROLLER . '/' . CURRENT_CFUNCTION . '.wizard.php';
                            }
                        }          
                    }
                    else
                    {
                        $file = $rfile;
                    }
                }
                else
                {
                    $file = $rfile;    
                }
            } 
        }
    }

    /**
     * Display exception table
     * 
     * @param string $file
     * @param string $line
     * @param string $key
     * 
     * @return void
     */
    public static function display($file, $line, $key)
    {
        ?>
        <a href="#openExceptionMessage<?php echo $key?>" class="list-group-item panel-header" style="color:#999;" data-toggle="collapse">
            <span><i class="fa fa-angle-down fa-fw panel-text"></i>&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $file ?? NULL; ?></span>
        </a>
        <div id="openExceptionMessage<?php echo $key?>" class="collapse<?php echo $key !== 0 ? '' : ' in'?>">
        <pre style="color:#ccc; background:#222; margin-top:-20px; border:0px">
        <?php
        
        $content = is_file($file) ? file($file) : NULL;
        $newdata = '<?PHP' . EOL;
        $intline = $line;

        for( $i = (($startLine = ($intline - 10)) < 0 ? 0 : $startLine); $i < ($intcount = $intline + 10); $i++ )
        {
            if( ! isset($content[$i]) )
            {
                break;
            }

            $index = $i + 1;
            $line  = $content[$i];

            if( $index == $intline )
            {
                $problem = ' {!!!!}';
                
            }
            else
            {
                $problem = ' ';
            }
            
            $newdata .= $index.'.' . $problem .
            str_repeat(' ', strlen($intcount) - strlen($i + 1)) . 
            $line;
        }

        echo self::displayHighlightErrorContent($newdata)

        ?></pre></div><?php
    }

    /**
     * Protected convert php tag to wizard tag
     */
    protected static function convertPHPTagToWizardTag(&$content)
    {
        $content = str_replace(['<?php', '?>', '<?='], ['{[', ']}', '{[='], $content ?? '');
    }

    /**
     * Protected important fields
     */
    protected static function hiddenImportantFields(&$content)
    {
        $content = preg_replace('/\'(user|password|port|database|host|dsn|key)\'(\s+=>\s+)\'(.*?)\'(,*\s*(\n\r|\n))/', '\'$1\'$2\'********\'$4', $content);
    }

    /**
     * Protected display highlight error content
     */
    protected static function displayHighlightErrorContent($content)
    {
        self::convertPHPTagToWizardTag($content);
        self::hiddenImportantFields($content);
        
        $errorBlock = '<div class="error-block col-lg-12"></div>';

        return preg_replace('/(<br\s\/>|'.CRLF.'|'.CR.'|'.LF.')+/', EOL, str_replace(['&#60;&#63;PHP', '{!!!!}'], [NULL, $errorBlock], Helper::highlight($content, 
        [
            'default:color' => '#ccc',
            'keyword:color' => '#00BFFF',
            'string:color'  => '#fff'
        ])));
    }
}