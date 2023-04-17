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

use ZN\Base;
use ZN\Datatype;
use ZN\Buffering;
use ZN\Inclusion;
use ZN\Authorization;

trait ViewCommonTrait
{
    use OutputElements, 
        CallableElements, 
        FormElementsTrait,
        HtmlElementsTrait,
        BootstrapAttributes, 
        BootstrapComponents, 
        BootstrapLayouts;

    /**
     * Keeps settings
     * 
     * @var array
     */
    protected $settings = [];

    /**
     * Keeps bootstrap options
     * 
     * @var array
     */
    protected $bootstrapOptions = [];

    /**
     * Sets attributes
     * 
     * @param array $attributes
     * 
     * @return string
     */
    public function attributes(array $attributes) : string
    {
        unset($this->settings['attr']['perm']);

        $attribute = '';

        if( ! empty($this->settings['attr']) )
        {
            $attributes = array_merge($attributes, $this->settings['attr']);

            $this->settings['attr'] = [];
        }

        foreach( $attributes as $key => $values )
        {
            if( is_numeric($key) )
            {
                $attribute .= ' '.$values; // @codeCoverageIgnore
            }
            else
            {
                if( ! empty($key) )
                {
                    $attribute .= ' '.$key.'="'.$values.'"';
                }
            }
        }

        return $attribute;
    }

    /**
     * Get input 
     * 
     * @param string $type       = NULL
     * @param string $name       = NULL
     * @param string $value      = NULL
     * @param array  $attributes = []
     * 
     * @return string
     */
    public function input(string $type = NULL, string $name = NULL, string $value = NULL, array $attributes = []) : string
    {
        if( isset($this->settings['attr']['type']) )
        {
            $type = $this->settings['attr']['type'];
        }

        $this->settings['attr'] = [];

        return $this->_input($name, $value, $attributes, $type);
    }

    /**
     * Serilize form into controller
     * 
     * @param string          $url
     * @param string|callable $selector
     * @param string|array    $datatype|$properties
     */
    public function serializer(string $url, $selector = '.modal-body', $datatype = 'standart')
    {
        $selector = is_string($selector)
                  ? ($this->settings['attr']['data-target'] ?? NULL) . Base::prefix($selector, ' ')
                  : $selector;

        return $this->trigger('click', $url, $selector, $datatype, 'serializer');
    }

    /**
     * Trigger controller
     * 
     * @param string          $event
     * @param string          $url
     * @param string|callable $selector
     * @param string|array    $datatype|$properties
     */
    public function trigger(string $event, string $url, $selector, $datatype = 'standart', $resource = 'trigger')
    {
        $this->convertSerializerDataType($datatype);

        $data = 
        [
            'serializerUrl'       => $url,
            'serializerSelector'  => $selector,
            'serializerFunction'  => $function = $resource . md5(uniqid()),
            'serializerProperties'=> $this->transferAttributesAndUnset('serializer', 'properties')
        ];

        $this->settings['attr'][Base::prefix($event, 'on')] = $function . '(this)';

        echo $this->getAjaxResource($resource, $data);

        return $this;
    }

    /**
     * On event
     * 
     * @param string   $parameter
     * @param callable $callback
     * 
     * @return this
     */
    public function on(string $parameter, $callback)
    {
        $this->settings['attr']['on']         = $parameter;
        $this->settings['attr']['onCallback'] = $this->stringOrCallback($callback);

        return $this;
    }

    /**
     * On key wait event
     * 
     * @param callable $callback
     * @param int      $time = 100
     * 
     * @return this
     */
    public function onkeywait($callback, int $time = 300)
    {
        $timer = 'timer' . md5(uniqid()); $callback = $this->stringOrCallback($callback);

        $this->settings['attr']['onkeywaititem'] = $timer;

        $compress = (new Script)->compress(function() use($timer, $time, $callback){ return "function {$timer}Function(callback, ms){var $timer = 0; return function(){var context = this, args = arguments; clearTimeout($timer); $timer = setTimeout(function(){callback.apply(context, args);}, ms || 0);};} $('input[onkeywaititem=\"$timer\"]').keyup({$timer}Function(function(e){ $callback }, $time));"; });

        $this->settings['attr']['onkeywait'] = "<script>$compress</script>" . EOL;
        
        return $this;
    }

    /**
     * Protected string or callback
     */
    protected function stringOrCallback($content)
    {
        if( is_scalar($content) || is_null($content) )
        {
            return $content;
        }
        elseif( is_callable($content) )
        {
            return Buffering\Callback::do($content);
        }

        throw new Exception\InvalidArgumentException('[$content] parameter must be [scalar] or [callable] type!'); // @codeCoverageIgnore
    }

    /**
     * Protected class resolution
     */
    protected function bootstrapClassResolution($type, $class)
    {
        $result = $type . ' ';

        $parts = explode(' ', $class);

        foreach( $parts as $part )
        {
            if( ! strstr($part, $type) )
            {
                $result .= Base::prefix($part, $type . '-');
            }
            else
            {
                $result .= $part; // @codeCoverageIgnore
            }

            $result .= ' ';
        }

        return trim($result);
    }

    /**
     * Protected bootstrap class complement
     * 
     * @codeCoverageIgnore
     */
    protected function bootstrapClassComplement($class)
    {
        return preg_replace
        ([
            '/((sm|md|lg|xs|xl)-[0-9]+)/'
        ],
        [
            'col-$1'
        ], $class ?? '');
    }

    /**
     * Protected convert serializeer data type
     */
    protected function convertSerializerDataType($datatype)
    {
        if( $datatype === 'json' )
        {
            $this->settings['serializer']['properties'] = 'dataType:"json",' . EOL; // @codeCoverageIgnore
        }
        elseif( is_array($datatype) )
        {
            $this->settings['serializer']['properties'] = rtrim(ltrim(json_encode($datatype), '{'), '}') . ',' . PHP_EOL; // @codeCoverageIgnore
        }
    }

    /**
     * Protected transfer attributes and unset
     */
    protected function transferAttributesAndUnset($type, $attr)
    {
        $return = $this->settings[$type][$attr] ?? NULL;

        unset($this->settings[$type][$attr]);

        return $return;
    }

    /**
     * Protected object options
     */
    protected function bootstrapObjectOptions(string $selector, $options, $type)
    {
        if( ! empty($options) )
        {
            $optionsEncode = json_encode($options);
        }
        
        $return  = '<script>$(document).ready(function(){$(\'' . $selector . '\').' . $type . '(' . ($optionsEncode ?? NULL) . ')';
        
        if( $parameter = $this->transferAttributesAndUnset('attr', 'on') )
        {
            $return .= '.on(\'' . $parameter . '\', function(){' . $this->transferAttributesAndUnset('attr', 'onCallback') . '})';
        }

        $return .= '});</script>';

        $this->bootstrapOptions[$type][$selector] = $return;

        return $return;
    }

    /**
     * Protected is bootstrap attribute
     */
    protected function isBootstrapAttribute($attr, $callback)
    {
        if( isset($this->settings['attr'][$attr]) )
        {
            $attribute = $this->settings['attr'][$attr];

            if( $attribute === str_replace('-', '', $attr ?? '') )
            {
                $attribute = NULL;
            }

            unset($this->settings['attr'][$attr]);

            $callback($attribute);
        }
    }

    /**
     * Protected get resource
     */
    protected function getResource(string $resource, $data, $directory)
    {
        return Inclusion\View::use($resource, $data, true, __DIR__ . '/Resources/' . $directory . '/');
    }

    /**
     * Protected get modal resource
     */
    protected function getModalResource(string $resource = 'standart', $data = [])
    {
        return $this->getResource($resource, $data, 'Modals');
    }

    /**
     * Protected get toast resource
     */
    protected function getToastResource(string $resource = 'standart', $data = [])
    {
        return $this->getResource($resource, $data, 'Toasts');
    }

    /**
     * Protected get modal resource
     */
    protected function getAjaxResource(string $resource = 'serializer', $data = [])
    {
        return $this->getResource($resource, $data, 'Ajax');
    }

    /**
     * Protected get carousel resource
     */
    protected function getCarouselResource(string $resource = 'standart', $data = [])
    {
        return $this->getResource($resource, $data, 'Carousels');
    }

    /**
     * Protected Input
     */
    protected function _input($name = '', $value = '', $attributes = [], $type = '')
    {
        $this->setNameAttributeWithReference($name, $attributes);

        $value = htmlspecialchars($value);

        $this->setValueAttributeWithReference($value, $attributes);

        if( ! empty($attributes['name']) )
        {
            $this->_postback($attributes['name'], $attributes['value'], $type);

            # 5.8.2.8[added]
            $this->getVMethodMessages();

            # 5.4.2[added]
            $this->_validate($attributes['name'], $attributes['name']);

            # 5.4.2[added]
            $this->_getrow($type, $value, $attributes);
        }

        $this->commonMethodsForInputElements($type);

        $this->getPermAttribute($perm);

        $this->createFormInputElementByType($type, $attributes, $return);
        
        $this->createBootstrapFormInputElementByType($type, $return, $attributes, $return);

        $this->outputElement .= $this->_perm($perm, $return);

        return $this;
    }

    /**
     * Protected change form attributes
     */
    protected function changeFormAttributes($types)
    {
        foreach( $types as $new => $old )
        {
            $oldEx = explode(':', $old);

            if( isset($this->settings['attr'][$new]) )
            {
                unset($this->settings['attr'][$new]); // @codeCoverageIgnore
    
                $this->settings['attr'][$oldEx[0]] = $oldEx[1]; // @codeCoverageIgnore
            }
        } 
    }

    /**
     * Protected common methods for input elements
     */
    protected function commonMethodsForInputElements($type)
    {
        $this->isBootstrapLabelUsage($type);
        $this->isBootstrapGroupUsage($type);
    }

    /**
     * Protected is bootstrap label usage
     */
    protected function isBootstrapLabelUsage($type)
    {
        if( $for = ($this->settings['label']['for'] ?? NULL) )
        {   
            if( ! $this->isCheckboxOrRadio($type) )
            {
                $this->settings['attr']['id'] = $for;
            }
        }
    }

    /**
     * Protected is bootstrap group usage
     */
    protected function isBootstrapGroupUsage($type)
    {
        if( ($this->settings['group']['class'] ?? NULL) || isset($this->callableGroup) )
        {   
            if( ! $this->isCheckboxOrRadio($type) )
            {
                if( ! isset($this->settings['attr']['class']) )
                {
                    $this->settings['attr']['class'] = 'form-control';
                }
                else
                {
                    $this->settings['attr']['class'] .= ' form-control'; // @codeCoverageIgnore
                }
            }
        }
    }

    /**
     * Protected is checkbox or radio
     */
    protected function isCheckboxOrRadio($type)
    {
        return in_array($type, ['checkbox', 'radio']);
    }

    /**
     * Protected set name attribute with reference
     */
    protected function setNameAttributeWithReference($name, &$attributes)
    {
        if( $name !== '' )
        {
            $attributes['name'] = $name;
        }
    }

    /**
     * Protected set value attribute with reference
     */
    protected function setValueAttributeWithReference($value, &$attributes)
    {
        if( $value !== '' )
        {
            $attributes['value'] = $value;
        }
    }

    /**
     * Protected create form input element by type
     */
    protected function createFormInputElementByType($type, $attributes, &$return)
    {
        if( isset($this->settings['attr']['onkeywait']) )
        {
            $onkeywait = $this->settings['attr']['onkeywait'];

            unset($this->settings['attr']['onkeywait']);
        }

        $return .= '<input type="' . $type . '"' . $this->attributes($attributes) . '>' . EOL . ( $onkeywait ?? NULL );
    }

    /**
     * Protected create form input element by type
     */
    protected function createBootstrapFormInputElementByType($type, $value, $attributes, &$return)
    {
        $return = '';

        if( $class = ($this->settings['group']['class'] ?? NULL) )
        {
            if( $this->isCheckboxOrRadio($type) )
            {
                if( $class === 'form-group' )
                {
                    $class = $type;
                }
                // @codeCoverageIgnoreStart
                elseif( $class !== $type )
                {
                    $class = Base::prefix($class, $type . ' ');
                }
                // @codeCoverageIgnoreEnd
            }

            $return .= '<div class="' . $class . '">' . EOL;

            unset($this->settings['group']);
        }

        if( $for = ($this->settings['label']['for'] ?? NULL) )
        {   
            if( ! $this->isCheckboxOrRadio($type) )
            {
                $this->createBootstrapInputLabelElement($for, $return);
            }
            else
            {
                $this->createBootstrapRadioOrCheckboxOpenLabelElement($type, $radioOrCheckboxLabel, $return);
            }

            unset($this->settings['label']);
        }

        $return .= $value;

        $this->isHelpBlockElement($return);

        $this->isBootstrapColumnSize($return);

        if( isset($radioOrCheckboxLabel) )
        {
            $this->createBootstrapRadioOrCheckboxCloseLabelElement($for, $radioOrCheckboxLabel, $return);
        }

        if( $class )
        {
            $return .= '</div>' . EOL;
        }
    }

    /**
     * Protected is help block element
     */
    protected function isHelpBlockElement(&$return)
    {
        $return .= $this->transferAttributesAndUnset('help', 'text');
    }

    /**
     * Protected bootstrap column size
     */
    protected function isBootstrapColumnSize(&$return)
    {
        if( $colsize = $this->transferAttributesAndUnset('col', 'size'))
        {
            $return = $this->getHTMLClass()->class(Base::prefix($colsize, 'col-'))->div($return);
        }
    }

    /**
     * Protected create bootstrap input label element
     */
    protected function createBootstrapInputLabelElement($for, &$return)
    {
        $return .= '<label'.$this->createAttribute('class', $this->settings['label']['class']).' for="' . $for . '">' . 
                   $this->settings['label']['value'] . 
                   '</label>' . EOL;
    }

    /**
     * Protected create bootstrap radio or checkbox open label element
     */
    protected function createBootstrapRadioOrCheckboxOpenLabelElement($type, &$radioOrCheckboxLabel, &$return)
    {
        if( $value = $this->settings['label']['value'] )
        {
            $this->settings['label']['value'] = Base::prefix($value, $type . '-'); // @codeCoverageIgnore
        }
        
        $return .= '<label'.$this->createAttribute('class', $this->settings['label']['value']).'>' . EOL;

        $radioOrCheckboxLabel = true;
    }

    /**
     * Protected create bootstrap radio or checkbox close label element
     */
    protected function createBootstrapRadioOrCheckboxCloseLabelElement($for, &$radioOrCheckboxLabel, &$return)
    {
        $return .= $for . EOL . '</label>' . EOL;

        unset($radioOrCheckboxLabel);
    }

    /**
     * Protected craete attribute
     */
    protected function createAttribute($type, $value)
    {
        return $value ? ' ' . $type . '="' . $value. '"' : NULL;
    }

    /**
     * Protected get perm attribute
     */
    protected function getPermAttribute(&$perm)
    {
        $perm = $this->settings['attr']['perm'] ?? NULL;
    }

    /**
     * Protected Perm [5.4.5]
     */
    protected function _perm($perm, $return)
    {
        if( $perm !== NULL )
        {
            if( Authorization\PermissionExtends::$roleId === NULL )
            {
                throw new Exception\PermissionRoleIdException(); // @codeCoverageIgnore
            }

            return Authorization\Process::use($perm, $return);
        }

        return $return;
    }

    /**
     * Protected Element
     */
    protected function _element($function, $element)
    {
        if( ! is_callable($element) )
        {
            if( $element === false )
            {
                $element = 'false';
            }
            else if( $element === true )
            {
                $element = 'true';
            }
            else if( is_array($element) || is_object($element) )
            {
                $element = json_encode($element, JSON_UNESCAPED_UNICODE);
            }

            $element = htmlentities($element, ENT_COMPAT);
        }

        $this->settings['attr'][strtolower($function ?? '')] = $element;
    }
}
