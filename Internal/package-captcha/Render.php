<?php namespace ZN\Captcha;
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
use ZN\Image;
use ZN\Config;
use ZN\Singleton;
use ZN\Filesystem;
use ZN\Request\URL;
use ZN\DataTypes\Arrays;
use ZN\Cryptography\Encode;

class Render implements RenderInterface
{
    /**
     * Keeps settings.
     * 
     * @var array
     */
    protected $sets = [];

    /**
     * Get path.
     * 
     * @var string
     */
    protected $path = FILES_DIR ?? 'captcha/';

    /**
     * Keeps session class
     * 
     * @var object
     */
    protected $session;

    /**
     * Keeps session key
     * 
     * @var string
     */
    protected $key;

    /**
     * Keeps config variables
     */
    protected $sizeWidthC,
              $sizeHeightC;

    /**
     * Magic constructor
     * 
     * @param void
     * 
     * @return void
     */
    public function __construct()
    {
        $this->session = Singleton::class('ZN\Storage\Session');
        $this->key     = md5('SystemCaptchaCodeData');
    }

    /**
     * The image specifies the path to save.
     * 
     * @param string $path
     * 
     * @return Captcha
     */
    public function path(string $path) : Render
    {
        $this->path = Base::suffix($path);

        return $this;
    }

    /**
     * Adjust the size of the captcha.
     * 
     * @param int $width
     * @param int $height
     * 
     * @return Captcha
     */
    public function size(int $width, int $height) : Render
    {
        $this->sets['size']['width']  = $width;
        $this->sets['size']['height'] = $height;

        return $this;
    }

    /**
     * Sets the character type.
     * 
     * @param string $type = 'alnum' - options[alnum|numeric|string|alpha|special|all]
     * 
     * @return Captcha
     */
    public function type(string $type = 'alnum') : Render
    {
        $this->sets['text']['type'] = $type;

        return $this;
    }

    /**
     * Sets the character width.
     * 
     * @param int $param
     * 
     * @return Captcha
     */
    public function length(int $param) : Render
    {
        $this->sets['text']['length'] = $param;

        return $this;
    }

    /**
     * Sets the character angle.
     * 
     * @param int $param
     * 
     * @return Captcha
     */
    public function angle(Float $param) : Render
    {
        $this->sets['text']['angle'] = $param;

        return $this;
    }

    /**
     * Add ttf fonts.
     * 
     * @param array $fonts
     * 
     * @return Captcha
     */
    public function ttf(array $fonts) : Render
    {
        $this->sets['text']['ttf'] = $fonts;

        return $this;
    }

    /**
     * Sets the border color.
     * 
     * @param string $color = NULL
     * 
     * @return Captcha
     */
    public function borderColor(string $color = NULL) : Render
    {
        $this->sets['border']['status'] = true;

        if( ! empty($color) )
        {
            $this->sets['border']['color'] = $this->convertColor($color);
        }

        return $this;
    }

    /**
     * Sets the background color.
     * 
     * @param string $color = NULL
     * 
     * @return Captcha
     */
    public function bgColor(string $color) : Render
    {
        $this->sets['background']['color'] = $this->convertColor($color);

        return $this;
    }

    /**
     * Add background pictures.
     * 
     * @param array $image
     * 
     * @return Captcha
     */
    public function bgImage(array $image) : Render
    {
        $this->sets['background']['image'] = $image;

        return $this;
    }

    /**
     * Sets the text size.
     * 
     * @param int $size
     * 
     * @return Captcha
     */
    public function textSize(int $size) : Render
    {
        $this->sets['text']['size'] = $size;

        return $this;
    }

    /**
     * Sets the text coordiante.
     * 
     * @param int $x
     * @param int $y
     * 
     * @return Captcha
     */
    public function textCoordinate(int $x = 0, int $y = 0) : Render
    {
        $this->sets['text']['x'] = $x;
        $this->sets['text']['y'] = $y;

        return $this;
    }

    /**
     * Sets the text color.
     * 
     * @param string $color
     * 
     * @return Captcha
     */
    public function textColor(string $color) : Render
    {
        $this->sets['text']['color'] = $this->convertColor($color);

        return $this;
    }

    /**
     * Sets the grid color.
     * 
     * @param string $color
     * 
     * @return Captcha
     */
    public function gridColor(string $color = NULL) : Render
    {
        $this->sets['grid']['status'] = true;

        if( ! empty($color) )
        {
            $this->sets['grid']['color'] = $this->convertColor($color);
        }

        return $this;
    }

    /**
     * Sets the grid space.
     * 
     * @param int $x = 0
     * @param int $y = 0
     * 
     * @return Captcha
     */
    public function gridSpace(int $x = 0, int $y = 0) : Render
    {
        if( ! empty($x) )
        {
            $this->sets['grid']['spaceX'] = $x;
        }

        if( ! empty($y) )
        {
            $this->sets['grid']['spaceY'] = $y;
        }

        return $this;
    }

    /**
     * Completes the captcha creation process.
     * 
     * @param bool $img = false
     * 
     * @return string
     */
    public function create(bool $img = false) : string
    {   
        # Create Session
        $this->session();

        if( ! $this->getCode() )
        {
            return ''; // @codeCoverageIgnore
        }

        # Clean Captcha Images
        $this->clean();

        # Create Directory
        $this->directory();

        # Create Color
        $this->color($file);

        # Background Image
        $this->background($file);

        # Text 
        $this->text($file);

        # Grid
        $this->grid($file);

        # Border
        $this->border($file);

        # Output
        return $this->output($img, $file);
        
    }

    /**
     * Returns the current captcha code.
     * 
     * @param void
     * 
     * @return string
     */
    public function getCode() : string
    {
        return $this->session->select($this->key);
    }

    /**
     * Protected Color
     */
    protected function color(& $file = NULL)
    {
        $sizeset = $this->sets['size'];

        $this->sizeWidthC  = $sizeset['width']  ?? 100;
        $this->sizeHeightC = $sizeset['height'] ?? 30;  

        $file = imagecreatetruecolor($this->sizeWidthC, $this->sizeHeightC);
    }

    /**
     * Protected Create Directory
     */
    protected function directory()
    {
        if( ! is_dir($this->path) )
        {
            mkdir($this->path); // @codeCoverageIgnore
        } 
    }
    
    /**
     * Protected Session Insert
     */
    protected function session()
    {
        $this->sets = array_merge
        (
            Config::default('ZN\Captcha\CaptchaDefaultConfiguration')
                  ::get('ViewObjects', 'captcha'), 
            $this->sets
        );

        $this->session->insert($this->key, Encode\RandomPassword::create($this->sets['text']['length'] ?? 6, $this->sets['text']['type'] ?? 'alnum'));
    }

    /**
     * Protected Output
     */
    protected function output($img, & $file)
    {
        $filePath = $this->path . $this->name();

        imagepng($file, $filePath);

        $baseUrl = URL::base($filePath);

        if( $img === true )
        {
            $captcha = '<img src="'.$baseUrl.'">';
        }
        else
        {
            $captcha = $baseUrl;
        }

        imagedestroy($file);

        $this->sets = [];

        return $captcha;
    }

    /**
     * Protected Border
     */
    protected function border(& $file)
    {
        $borderset = $this->sets['border'];

        $borderStatusC = $borderset['status'] ?? true;

        if( $borderStatusC === true )
        {
            $bordercolorC = $borderset['color'] ?? '200|200|200';
            $borderColor  = imagecolorallocate($file, ...explode('|', $bordercolorC));

            # Top
            imageline($file, 0, 0, $this->sizeWidthC, 0, $borderColor); 

            # Right
            imageline($file, $this->sizeWidthC - 1, 0, $this->sizeWidthC - 1, $this->sizeHeightC, $borderColor); 

            # Bottom
            imageline($file, 0, $this->sizeHeightC - 1, $this->sizeWidthC, $this->sizeHeightC - 1, $borderColor); 

            # Left
            imageline($file, 0, 0, 0, $this->sizeHeightC - 1, $borderColor); 
        }
    }

    /**
     * Protected Grid
     */
    protected function grid(& $file)
    {
        $gridset     = $this->sets['grid'];
        $gridStatusC = $gridset['status'] ?? false;

        if( $gridStatusC === true )
        {
            $gridSpaceXC = $gridset['spaceX'] ?? 12;
            $gridSpaceYC = $gridset['spaceY'] ?? 4;
            $gridColorC  = $gridset['color']  ?? '240|240|240';

            $gridIntervalX  = $this->sizeWidthC / $gridSpaceXC;

            if( ! isset($gridSpaceYC))
            {
                $gridIntervalY  = (($this->sizeHeightC / $gridSpaceXC) * $gridIntervalX / 2); // @codeCoverageIgnore

            } 
            else 
            {
                $gridIntervalY  = $this->sizeHeightC / $gridSpaceYC;
            }

            $gridColor  = imagecolorallocate($file, ...explode('|', $gridColorC));

            for( $x = 0 ; $x <= $this->sizeWidthC ; $x += $gridIntervalX )
            {
                imageline($file, $x, 0, $x, $this->sizeHeightC - 1, $gridColor);
            }

            for( $y = 0 ; $y <= $this->sizeWidthC; $y += $gridIntervalY )
            {
                imageline($file, 0, $y, $this->sizeWidthC, $y, $gridColor);
            }
        }
    }

    /**
     * Protected Text
     */
    protected function text(& $file)
    {
        $textset = $this->sets['text'];

        $textSizeC  = $textset['size']  ?? 10;
        $textXC     = $textset['x']     ?? 23;
        $textYC     = $textset['y']     ?? 9;
        $textAngleC = $textset['angle'] ?? 0;
        $textTTFC   = $textset['ttf']   ?? [];
        $textColorC = $textset['color'] ?? '0|0|0';
        $fontColor  = imagecolorallocate($file, ...explode('|', $textColorC));

        if( ! empty($textTTFC) )
        {
            $textTTFC = $textTTFC[rand(0, count($textTTFC) - 1)];

            $textTTFC = Base::suffix($textTTFC, '.ttf');

            if( is_file($textTTFC) )
            {
                imagettftext
                (
                    $file, 
                    $textSizeC, 
                    $textAngleC, 
                    $textXC, 
                    $textYC + $textSizeC, 
                    $fontColor, 
                    $textTTFC, 
                    $this->getCode()
                );
            }
        }
        else
        {
            imagestring($file, $textSizeC, $textXC, $textYC, $this->getCode(), $fontColor);
        }
    }

    /**
     * Protected Background Image
     */
    protected function background(& $file)
    {
        $bgset = $this->sets['background'];

        $backgroundImageC = $bgset['image'] ?? [];
        
        if( ! empty($backgroundImageC) )
        {
            if( is_array($backgroundImageC) )
            {
                $backgroundImageC = $backgroundImageC[rand(0, count($backgroundImageC) - 1)];
            }

            if( is_file($backgroundImageC) )
            {
                $infoExtension = strtolower(pathinfo($backgroundImageC, PATHINFO_EXTENSION));

                switch( $infoExtension )
                {
                    case 'jpeg':
                    case 'jpg' : $file = imagecreatefromjpeg($backgroundImageC); break;
                    case 'png' : $file = imagecreatefrompng($backgroundImageC);  break;
                    case 'gif' : $file = imagecreatefromgif($backgroundImageC);  break; // @codeCoverageIgnore
                    default    : $file = imagecreatefromjpeg($backgroundImageC);
                }
            }
        }
        else
        {
            $backgroundColorC = $bgset['color'] ?? '255|255|255';

            $color = imagecolorallocate($file, ...explode('|', $backgroundColorC));
            
            imagefill($file, 0, 0, $color);
        }
    }

    /**
     * protected clean captcha
     * 
     * @param void
     * 
     * @return void
     */
    protected function clean()
    {
        $captcha = $this->path . $this->name();

        $getCaptchaImages = preg_grep('/captcha\-\w+\.png/', Filesystem::getFiles($this->path, 'png'));

        foreach( $getCaptchaImages as $image)
        {
            if( $this->name() !== $image )
            {
                $captcha = $this->path . $image;

                if( is_file($captcha) )
                {
                    unlink($captcha);
                }
            }      
        } 
    }

    /**
     * protected captcha name
     * 
     * @param void
     * 
     * @return string
     */
    protected function name()
    {
        return 'captcha-' . $this->getCode() . '.png';
    }

    /**
     * protected conver color
     * 
     * @param string $color
     * 
     * @return string
     */
    protected function convertColor($color)
    {
        if( $convert = (Image\Properties::$colors[$color] ?? NULL) )
        {
            return $convert; // @codeCoverageIgnore
        }

        return $color;
    }
}
