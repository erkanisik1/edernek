<?php namespace ZN\Database\MySQLi;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use MySQLi;
use stdClass;
use Exception;
use ZN\Support;
use ZN\ErrorHandling\Errors;
use ZN\Database\DriverMappingAbstract;
use ZN\Database\Exception\ConnectionErrorException;

class DB extends DriverMappingAbstract
{
    /**
     * Keep Operators
     * 
     * @var array
     */
    protected $operators =
    [
        'like' => '%'
    ];

    /**
     * Keep Statements
     * 
     * @var array
     */
    protected $statements =
    [
        'autoincrement' => 'AUTO_INCREMENT',
        'primarykey'    => 'PRIMARY KEY',
        'foreignkey'    => 'FOREIGN KEY',
        'unique'        => 'UNIQUE',
        'null'          => 'NULL',
        'notnull'       => 'NOT NULL',
        'exists'        => 'EXISTS',
        'notexists'     => 'NOT EXISTS',
        'constraint'    => 'CONSTRAINT',
        'default'       => 'DEFAULT'
    ];

    /**
     * Keep Variable Types
     * 
     * @var array
     */
    protected $variableTypes =
    [
        'int'           => 'INT',
        'smallint'      => 'SMALLINT',
        'tinyint'       => 'TINYINT',
        'mediumint'     => 'MEDIUMINT',
        'bigint'        => 'BIGINT',
        'decimal'       => 'DECIMAL',
        'double'        => 'DOUBLE',
        'float'         => 'FLOAT',
        'char'          => 'CHAR',
        'varchar'       => 'VARCHAR',
        'tinytext'      => ':TINYTEXT',
        'text'          => 'TEXT',
        'mediumtext'    => ':MEDIUMTEXT',
        'longtext'      => ':LONGTEXT',
        'date'          => ':DATE',
        'datetime'      => 'DATETIME',
        'time'          => 'TIME',
        'timestamp'     => 'TIMESTAMP'
    ];

    /**
     * Keeps Types
     * 
     * @var array
     */
    protected $types = 
    [
        0   => 'DECIMAL',      
        1   => 'TINY',
        2   => 'SHORT',
        3   => 'LONG',
        4   => 'FLOAT',
        5   => 'DOUBLE',
        6   => 'NULL',
        7   => 'TIMESTAMP',
        8   => 'LONGLONG',
        9   => 'INT24',
        10  => 'DATE',
        11  => 'TIME',
        12  => 'DATETIME',
        13  => 'YEAR',          
        14  => 'NEWDATE',     
        247 => 'ENUM',
        248 => 'SET',
        249 => 'TINY_BLOB',
        250 => 'MEDIUM_BLOB',
        251 => 'LONG_BLOG',
        252 => 'BLOB',
        253 => 'VAR_STRING',
        254 => 'STRING',
        255 => 'GEOMETRY'
    ];

    /**
     * Magic Constructor
     */
    public function __construct()
    {
        Support::extension('MySQLi');
    }

    /**
     * Connection
     * 
     * @param array $config = []
     */
    public function connect($config = [])
    {
        $this->config = $config;
        
        $host = ($this->config['pconnect'] === true ? 'p:' : NULL) . $this->config['host'];
        $user = $this->config['user'];
        $pass = $this->config['password'];
        $db   = $this->config['database'];
        $port = $this->config['port'] ?: 3306;
        $ssl  = $this->config['ssl'] ?? NULL;

        // @codeCoverageIgnoreStart
        set_error_handler(function(){});
        if( ! empty($ssl['key']) || ! empty($ssl['cert']) || ! empty($ssl['ca']) || ! empty($ssl['capath']) || ! empty($ssl['cipher']) )
        {
            $this->connect = new MySQLi;

            $this->connect->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
            $this->connect->ssl_set($ssl['key'] ?? NULL, $ssl['cert'] ?? NULL, $ssl['ca'] ?? NULL, $ssl['capath'] ?? NULL, $ssl['cipher'] ?? NULL); 
            $this->connect->real_connect($host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL);
        }  
        // @codeCoverageIgnoreEnd
        else
        {
            $this->connect = new MySQLi($host, $user, $pass, $db, $port);
        }
        restore_error_handler();
        
        if( $this->connect->connect_errno )
        {
            throw new ConnectionErrorException(NULL, $this->connect->connect_error); // @codeCoverageIgnore
        }

        mysqli_report(MYSQLI_REPORT_OFF);

        if( ! empty($this->config['charset']  ) ) $this->query("SET NAMES '".$this->config['charset']."'");  
        if( ! empty($this->config['charset']  ) ) $this->query('SET CHARACTER SET '.$this->config['charset']);  
        if( ! empty($this->config['collation']) ) $this->query('SET COLLATION_CONNECTION = "'.$this->config['collation'].'"');
    }

    /**
     * Execute
     * 
     * @param string $query
     * @param array  $security = NULL
     * 
     * @return bool
     */
    public function exec($query, $security = NULL)
    {
        if( empty($query) )
        {
            return false;
        }

        return $this->connect->query($query);
    }

    /**
     * Query
     * 
     * @param string $query
     * @param array  $security = NULL
     * 
     * @return bool
     */
    public function query($query, $security = NULL)
    {
        return $this->query = $this->exec($query, $security);
    }

    /**
     * Multiple Queries
     * 
     * @param string $query
     * @param array  $security = NULL
     * 
     * @return bool
     */
    public function multiQuery($query, $security = NULL)
    {
        if( empty($query) )
        {
            return false; // @codeCoverageIgnore
        }
        
        if( $this->query = $this->connect->multi_query($query) )
        {
            while( $this->connect->next_result() )
            {
                if( ! $this->connect->more_results() ) 
                {
                    break;
                }
            }
        }

        return (bool) $this->query;
    }

    /**
     * Start Transaction Query
     * 
     * @return bool
     */
    public function transStart()
    {
        $this->connect->autocommit(false);

        return $this->connect->begin_transaction();
    }

    /**
     * Rollback Transaction Query
     * 
     * @return bool
     */
    public function transRollback()
    {
        if( $this->connect->rollback() )
        {
            return $this->connect->autocommit(true);
        }

        return false; // @codeCoverageIgnore
    }

    /**
     * Commit Transaction Query
     * 
     * @return bool
     */
    public function transCommit()
    {
        if( $this->connect->commit() )
        {
            return $this->connect->autocommit(true);
        }

        return false; // @codeCoverageIgnore
    }

    /**
     * Insert Last ID
     * 
     * @return int|false
     */
    public function insertID()
    {
        return $this->connect->insert_id ?? false;
    }

    /**
     * Returns column data
     * 
     * @param string $column
     * 
     * @return array|object
     */
    public function columnData($column)
    {
        if( empty($this->query) )
        {
            return false;
        }

        $columns   = [];
        $fieldData = $this->query->fetch_fields();
        $count     = count($fieldData);

        for( $i = 0; $i < $count; $i++ )
        {
            $fieldName = $fieldData[$i]->name;

            $columns[$fieldName]             = new stdClass();
            $columns[$fieldName]->name       = $fieldName;
            $columns[$fieldName]->type       = $this->types[$fieldData[$i]->type] ?? NULL;
            $columns[$fieldName]->maxLength  = $fieldData[$i]->max_length;
            $columns[$fieldName]->primaryKey = (int) ($fieldData[$i]->flags & 2);
            $columns[$fieldName]->default    = $fieldData[$i]->def;
        }

        return $columns[$column] ?? $columns;
    }

    /**
     * Numrows
     * 
     * @return int
     */
    public function numRows()
    {
        return $this->query->num_rows ?? 0;
    }

    /**
     * Returns columns
     * 
     * @return array
     */
    public function columns()
    {
        if( empty($this->query) )
        {
            return [];
        }

        $columns   = [];
        $fields    = $this->query->fetch_fields();
        $numFields = $this->numFields();

        for( $i = 0; $i < $numFields; $i++ )
        {
            $columns[] = $fields[$i]->name;
        }

        return $columns;
    }

    /**
     * Numfields
     * 
     * @return int
     */
    public function numFields()
    {
        return $this->query->field_count ?? 0;
    }

    /**
     * Real Escape String 
     * 
     * @param string $data
     * 
     * @return string|false
     */
    public function realEscapeString($data)
    {
        if( empty($this->query) )
        {
            return $data; // @codeCoverageIgnore
        }

        return $this->connect->real_escape_string($data);
    }

    /**
     * Returns a string description of the last error.
     * 
     * @return string|false
     */
    public function error()
    {
        return $this->connect->error ?: false;
    }

    /**
     * Fetch a result row as an associative, a numeric array, or both
     * 
     * @return mixed
     */
    public function fetchArray()
    {
        if( empty($this->query) )
        {
            return [];
        }

        return $this->query->fetch_array();
    }

    /**
     * Fetch a result row as an associative array
     * 
     * @return mixed
     */
    public function fetchAssoc()
    {
        if( empty($this->query) )
        {
            return [];
        }
        
        return $this->query->fetch_assoc();
    }

    /**
     * Get a result row as an enumerated array
     * 
     * @return mixed
     */
    public function fetchRow()
    {
        if( empty($this->query) )
        {
            return [];
        }

        return $this->query->fetch_row();
    }

    /**
     * Gets the number of affected rows in a previous MySQL operation
     * 
     * @return int
     */
    public function affectedRows()
    {
        return $this->connect->affected_rows ?? 0;
    }

    /**
     * Returns the version of the MySQL server as an integer
     * 
     * @return int
     */
    public function version()
    {
        return (string) ($this->connect->server_version ?? 0);
    }
}
