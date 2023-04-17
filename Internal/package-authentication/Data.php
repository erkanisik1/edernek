<?php namespace ZN\Authentication;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

class Data extends UserExtends
{
    /**
     * Get Data
     * 
     * @param string $tbl = NULL
     * 
     * @return object
     */
    public function get(string $tbl = NULL)
    {
        if( $this->getUsernameSessionCookie() )
        {
            $r[$tbl] = $this->getUserDataRow();

            if( ! empty($this->joinTables) )
            {
                $joinCol = $r[$tbl]->{$this->joinColumn};

                foreach( $this->joinTables as $table => $this->joinColumn )
                {
                    $r[$table] = $this->getUserDataRowByJoinTableAndColumn($table, $joinCol);
                }
            }

            if( empty($this->joinTables) )
            {
                return (object) $r[$tbl];
            }
            else
            {
                if( ! empty($tbl) )
                {
                    return (object) $r[$tbl];
                }
                else
                {
                    return (object) $r; // @codeCoverageIgnore
                }
            }
        }
        else
        {
            return false; // @codeCoverageIgnore
        }
    }

    /**
     * Active Count
     * 
     * @param string $type = 'active'
     * 
     * @return int
     */
    public function activeCount($type = 'active') : int
    {
        $column = $this->getConfig['matching']['columns'][$type];

        return $this->dbClass->where($column, 1)->get($this->tableName)->totalRows();
    }

    /**
     * Banned Count
     * 
     * @param void
     * 
     * @return int
     */
    public function bannedCount() : int
    {
        return $this->activeCount('banned');
    }

    /**
     * Count
     * 
     * @param void
     * 
     * @return int
     */
    public function count() : int
    {
        return $this->dbClass->get($this->tableName)->totalRows();
    }

    /**
     * Protected get user data row
     */
    protected function getUserDataRow()
    {
        $this->_multiUsernameColumns($username = $this->getUsernameSessionCookie());
        
        return $this->dbClass->where($this->usernameColumn, $username, 'and')
                    ->where($this->passwordColumn, $this->getPasswordSessionCookie())
                    ->get($this->tableName)
                    ->row();
    }

    /**
     * Protected get user data row by join table and column
     */
    protected function getUserDataRowByJoinTableAndColumn($table, $column)
    {
        return $this->dbClass->where($this->joinColumn, $column)->get($table)->row();
    }

    /**
     * Protected get username session and cookie
     */
    protected function getUsernameSessionCookie()
    {
        return $this->sessionClass->select($uniqueUsernameKey = $this->getUniqueUsernameKey()) ?: $this->cookieClass->select($uniqueUsernameKey);
    }

    /**
     * Protected get password session cookie
     */
    protected function getPasswordSessionCookie()
    {
        return $this->sessionClass->select($uniquePasswordKey = $this->getUniquePasswordKey()) ?: $this->cookieClass->select($uniquePasswordKey);
    }
}
