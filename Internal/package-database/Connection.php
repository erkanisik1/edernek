<?php namespace ZN\Database;
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
use ZN\Config;
use ZN\Support;
use ZN\Helpers\Logger;
use ZN\DataTypes\Arrays;
use ZN\Database\Exception\InvalidArgumentException;

class Connection
{
    /**
     * Keeps database drivers
     * 
     * @var array
     */
    protected $drivers =
    [
        'odbc'      => 'ODBC', 
        'mysqli'    => 'MySQLi',
        'oracle'    => 'Oracle',
        'postgres'  => 'Postgres',
        'sqlite'    => 'SQLite',
        'sqlserver' => 'SQLServer'
    ];

    /**
     * Keeps database driver
     * 
     * @var object
     */
    protected $db;

    /**
     * Keeps database config
     * 
     * @var array
     */
    protected $config;

    /**
     * Keeps database default config
     * 
     * @var array
     */
    protected $defaultConfig;

    /**
     * Keeps table prefix
     * 
     * @var string
     */
    protected $prefix;

    /**
     * Keeps secure data
     * 
     * @var array
     */
    protected $secure = [];

    /**
     * Keeps aliases data
     * 
     * @var array
     */
    protected $aliases = [];

    /**
     * Select table name
     * 
     * @var string
     */
    protected $table;

    /**
     * Keeps table name
     * 
     * @var string
     */
    protected $tableName;

    /**
     * Get string query
     * 
     * @var string
     */
    protected $stringQuery;

    /**
     * Get string queries
     * 
     * @var array
     */
    protected $stringQueries;

    /**
     * Keeps select functions
     * 
     * @var array
     */
    protected $selectFunctions;

    /**
     * Keeps column
     * 
     * @var array
     */
    protected $column;

    /**
     * Keep database driver
     * 
     * @var string
     */
    protected $driver;

    /**
     * Keeps string query
     * 
     * @var string
     */
    protected $string;

    /**
     * Transaction queries
     * 
     * @var bool
     */
    protected $transaction;

    /**
     * Keeps transaction queries
     * 
     * @var array
     */
    protected $transactionQueries;

    /**
     * Magic construtor
     * 
     * @param array $config
     * 
     * @return void
     */
    public function __construct(array $config = [])
    {
        $this->defaultConfig = Config::default('ZN\Database\DatabaseDefaultConfiguration')
                                     ::get('Database', 'database');
        $this->config        = array_merge($this->defaultConfig, $config);
        $this->db            = $this->runDriver();
        $this->prefix        = $this->config['prefix'];
        Properties::$prefix  = $this->prefix;

        $this->db->connect($this->config);
    }

    /**
     * Magic Debug Info
     */
    public function __debugInfo()
    {
        return ['return' => $this->stringQuery ?: 'This is a general object, please call the sub method!'];
    }

    /**
     * Alias different connection
     * 
     * @param mixed $connectName = NULL
     * 
     * @return Connection
     */
    public function new($connectName = NULL) : Connection
    {
        return $this->differentConnection($connectName);
    }

    /**
     * Creates different connection
     * 
     * @param mixed $connectName = NULL
     * 
     * @return Connection
     */
    public function differentConnection($connectName = NULL) : Connection
    {
        $getCalledClass = get_called_class();

        if( empty($connectName) )
        {
            return new $getCalledClass;
        }

        $config          = $this->defaultConfig;
        $configDifferent = $config['differentConnection'];

        if( is_string($connectName) && isset($configDifferent[$connectName]) )
        {
            $connection = $configDifferent[$connectName];
        }
        elseif( is_array($connectName) )
        {
            $connection = $connectName;
        }
        else
        {
            throw new InvalidArgumentException('Error', 'invalidInput', 'Mixed $connectName');
        }

        foreach( $config as $key => $val )
        {
            if( $key !== 'differentConnection' )
            {
                if( ! isset($connection[$key]) )
                {
                    $connection[$key] = $val;
                }
            }
        }

        return new $getCalledClass($connection);
    }

    /**
     * Get var types
     * 
     * @param void
     * 
     * @return array
     */
    public function vartypes() : array
    {
        return $this->db->vartypes();
    }

    /**
     * Sets table name
     * 
     * @param string $table
     * 
     * @return Connection
     * 
     * @codeCoverageIgnore
     */
    public function table(string $table) : Connection
    {
        $this->table       = ' '.$this->prefix.$table.' ';
        $this->tableName   = $this->prefix.$table;
        Properties::$table = $this->tableName;

        return $this;
    }

    /**
     * Sets column
     * 
     * @param string $col
     * @param mixed  $val = NULL
     * 
     * @return Connection
     */
    public function column(string $col, $val = NULL) : Connection
    {
        $this->column[$col] = $val;

        return $this;
    }

    /**
     * Converts string query
     * 
     * @param void
     * 
     * @return Connection
     */
    public function string() : Connection
    {
        $this->string = true;

        return $this;
    }

    /**
     * Get string query
     * 
     * @param void
     * 
     * @return string
     */
    public function stringQuery() : string
    {
        if( ! empty($this->stringQuery) )
        {
            return $this->stringQuery;
        }

        return false;
    }

    /**
     * Get string queries
     * 
     * @param void
     * 
     * @return array|false
     */
    public function stringQueries()
    {
        if( ! empty($this->stringQueries) )
        {
            return $this->stringQueries;
        }

        return false;
    }

    /**
     * Sets query security
     * 
     * @param array $data
     * 
     * @return Connection
     */
    public function secure(array $data) : Connection
    {
        $this->secure = $data;

        return $this;
    }

    /**
     * Defines function
     * 
     * @param string ...$args
     * 
     * @return mixed
     */
    public function func(...$args)
    {
        $array = $args;

        array_shift($array);

        $math  = $this->setMathFunction(isset($args[0]) ? strtoupper($args[0] ?? '') : false, $array);

        if( $math->return === true )
        {
            return $math->args;
        }
        else
        {
            $this->selectFunctions[] = $math->args;

            return $this;
        }
    }

    /**
     * Get database query error
     * 
     * @param void
     * 
     * @return string
     */
    public function error()
    {
        return $this->db->error();
    }

    /**
     * Close database connection
     * 
     * @param void
     * 
     * @return bool
     */
    public function close()
    {
        return $this->db->close();
    }

    /**
     * Get database version
     * 
     * @param void
     * 
     * @return string
     */
    public function version()
    {
        return $this->db->version();
    }

    /**
     * protected escape string add nail
     * 
     * @param mixed $value
     * @param mixed $numeric = false
     * 
     * @return string
     */
    protected function escapeStringAddNail($value, $numeric = false)
    {
        if( $numeric === true && is_numeric($value) )
        {
            return $value;
        }

        return Base::presuffix($this->nailEncode($value), "'");
    }

    /**
     * protected exp
     * 
     * @param string $column = ''
     * @param string $exp    = 'exp'
     * 
     * @return string
     */
    protected function isExpressionExists($column = '', $exp = 'exp')
    {
        return stristr($column, $exp . ':');
    }

    /**
     * @param string $column
     * @param string $ext = 'exp'
     * 
     * @return string
     */
    protected function clearExpression($column, $exp = 'exp')
    {
        return str_ireplace($exp . ':', '', $column ?? '');
    }

    /**
     * protected clear nail
     * 
     * @param string 
     * 
     * @return string
     */
    protected function clearNail($value)
    {
        return trim((string) $value, '\'');
    }

    /**
     * protected convert type
     * 
     * @param string &$column
     * @param string &$value 
     * 
     * @param void
     */
    protected function convertVartype(&$column = '', &$value = '')
    {
        $clearValue = $this->clearNail($value);

        if( $this->isExpressionExists($column, $type = 'int') )
        {
            $value = (int) $clearValue;
        }
        elseif( $this->isExpressionExists($column, $type = 'float') )
        {
            $value = (float) $clearValue;
        }
        else
        {
            $type = 'exp';
        }

        $column = $this->clearExpression($column, $type);
    }

    /**
     * protected query security
     * 
     * @param string $query
     * @param string $isString = false
     * 
     * @return string
     */
    protected function querySecurity($query, $isString = false)
    {
        if( ! empty($this->secure) )
        {
            $query = $this->applySecure($query);
        }

        if( ! empty($this->aliases) )
        {
            $query = $this->applyAliases($query);
        }

        $this->applyNullable($query);
       
        if( $isString === false && ($this->config['queryLog'] ?? NULL) === true )
        {
            Logger::report('DatabaseQueries', $query, 'DatabaseQueries'); // @codeCoverageIgnore
        }

        $this->stringQueries[] = $this->stringQuery = $query;

        return $query;
    }

    /**
     * protected apply nullable
     */
    protected function applyNullable(&$query)
    {
        $query = str_ireplace('\'null\'', 'null', $query ?? '');
    }

    /**
     * protected apply secure
     */
    protected function applySecure($query)
    {
        $query = $query ?? '';

        $secure = $this->secure; $this->secure = []; $secureParams = [];

        if( is_numeric(key($secure)) )
        {
            $strex  = explode('?', $query);
            $newstr = '';

            if( ! empty($strex) ) for( $i = 0; $i < count($strex) - 1; $i++ )
            {
                $sec = $secure[$i] ?? NULL;

                $newstr .= $strex[$i].$this->escapeStringAddNail($sec);
            }

            $query = $newstr . end($strex);
        }
        else
        {
            foreach( $secure as $k => $v )
            {
                $this->convertVartype($k, $v);

                $secureParams[$k] = $this->escapeStringAddNail($v);
            }
        }

        return str_replace(array_keys($secureParams), array_values($secureParams), $query);
    }

    /**
     * protected apply aliases
     */
    protected function applyAliases($query)
    {
        $aliases = $this->aliases; $this->aliases = [];

        foreach( $aliases as $alias => $origin )
        {
            $query = preg_replace
            (
                [
                    '/(^|\s)' . $this->prefix . $alias . '($|\s)/i', 
                    '/(^|\W)' . $this->prefix . $alias . '($|\W)/i'
                ], 
                [
                    '$1' . $this->prefix . $origin . ' ' . $alias . '$2', 
                    '$1' . $alias . '$2'
                ], 
                $query
            );
        }

        return $query;
    }

    /**
     * Sets math functions
     * 
     * @param string $type
     * @param array  $args
     * 
     * @return object
     */
    protected function setMathFunction($type, $args)
    {
        $type    = strtoupper($type ?? '');
        $getLast = Arrays\GetElement::last($args) ?? '';
        $asparam = ' ';

        if( $getLast === true )
        {
            array_pop($args);

            $return = true;
            $as     = Arrays\GetElement::last($args) ?? '';

            // @codeCoverageIgnoreStart
            if( stripos(trim($as), 'as') === 0 )
            {
                $asparam .= $as;
                array_pop($args);
            }
            // @codeCoverageIgnoreEnd
        }
        else
        {
            $return = false;
        }

        // @codeCoverageIgnoreStart
        if( stripos(trim($getLast), 'as') === 0 )
        {
            $asparam .= $getLast;
            array_pop($args);
        }
        // @codeCoverageIgnoreEnd

        $args = $type.'('.rtrim(implode(',', $args), ',').')'.$asparam;

        return (object) 
        [
            'args'   => $args,
            'return' => $return
        ];
    }

    /**
     * Run driver
     * 
     * @param array $settings = []
     * 
     * @return object
     */
    protected function runDriver($settings = [])
    {
        $this->driver = preg_replace('/(\w+)(\:\w+)*/', '$1', $this->config['driver']);

        return $this->getDriver(NULL, $settings);
    }

    /**
     * protected get driver library
     * 
     * @param string $suffix   = 'Driver'
     * @param array  $settings = []
     * 
     * @return object
     */
    protected function getDriver($suffix = NULL, $settings = [])
    {
        Support::driver(array_keys($this->drivers), $this->driver);

        $class = 'ZN\Database\\' . $this->drivers[$this->driver] . '\\DB' . $suffix;

        return new $class($settings);
    }

    /**
     * protected encode nail
     * 
     * @param string $data
     * 
     * @return string
     */
    protected function nailEncode($data)
    {
        if( $data === NULL )
        {
            return 'NULL';
        }

        return str_replace(["'", "\&#39;", "\\&#39;"], "&#39;", $data);
    }

    /**
     * protected run exec query
     * 
     * @param string $query
     * @param string $type = 'query'
     * 
     * @return mixed
     */
    protected function runQuery($query, $type = 'query')
    {
        // @codeCoverageIgnoreStart
        if( $this->string === true )
        {
            $this->string = NULL;

            return $query;
        }
        // @codeCoverageIgnoreEnd

        if( $this->transaction === true )
        {
            $this->transactionQueries[] = $query;

            return $this;
        }

        if( empty($query) )
        {
            $this->stringQuery = NULL;

            return false;
        }

        $this->db->$type($this->querySecurity($query), $this->secure);

        return ! (bool) $this->db->error();
    }

    /**
     * protected run exec query
     * 
     * @param string $query
     * 
     * @return string
     */
    protected function runExecQuery($query)
    {
        return $this->runQuery($query, 'exec');
    }

    /**
     * Sets table name
     * 
     * @param mixed  $p    = NULL
     * @param string $name = 'table'
     * 
     * @return string
     */
    protected function addPrefixForTableAndColumn($p = NULL, $name = 'table')
    {
        if( $name === 'prefix' )
        {
            return $this->$name.$p;
        }

        if( $name === 'table' )
        {
            $p = $this->prefix.$p;
        }

        if( ! empty($this->$name) )
        {
            $data = $this->$name;

            $this->$name = NULL;

            return $data;
        }
        else
        {
            return $p;
        }
    }

    /**
     * Magic destructor
     * 
     * @param void
     * 
     * @return void
     */
    public function __destruct()
    {
        $this->db->close();
    }
}
