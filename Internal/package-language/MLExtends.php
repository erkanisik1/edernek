<?php namespace ZN\Language;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Lang;
use ZN\Config;

class MLExtends 
{
    /**
     * Keeps MLGrid config
     * 
     * @var array
     */
    protected $gridConfig;

    /**
     * Keeps language file
     * 
     * @var string
     */
    protected $appdir;

    /**
     * Keeps external language file
     * 
     * @var string
     */
    protected $externalAppdir;

    /**
     * Keeps file extension
     * 
     * @var string
     */
    protected $extension = '.ml';

    /**
     * Keeps directory
     * 
     * @var string
     */
    protected $directory = 'ml/';

   /**
     * Keeps external language path
     * 
     * @var string 
     */
    protected $externalLang;

    /**
     * Magic constructor
     * 
     * @param void
     * 
     * @return void
     */
    public function __construct()
    {
        $this->gridConfig = Config::default('ZN\Language\GridDefaultConfiguration')
                                  ::get('ViewObjects', 'mlgrid');

        $mlDir = $this->directory;

        $this->appdir         = LANGUAGES_DIR . $mlDir;
        $this->externalAppdir = EXTERNAL_LANGUAGES_DIR . $mlDir;

        if( ! is_dir($this->appdir) )
        {
            mkdir($this->appdir, 0755); // @codeCoverageIgnore
        }

        $getLang = Lang::get();

        $this->externalLang = $this->externalAppdir.$getLang.$this->extension;
    }

    /**
     * protected get file path
     */
    protected function getFilePath()
    {
        return $this->appdir . Lang::get(). $this->extension;
    }

    /**
     * protected lang file
     * 
     * @param string $app
     * 
     * @return string
     */
    protected function _langFile($app)
    {
        return $this->appdir . $app . $this->extension;
    }
}
