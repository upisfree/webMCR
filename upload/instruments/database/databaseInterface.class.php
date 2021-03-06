<?php
 /** 
 * @category  MySQL Database Tools
 * @package   Kelly\DataBase
 * @author    Rubchuk Vladimir <torrenttvi@gmail.com>
 * @copyright 2014 Rubchuk Vladimir
 * @license   GPLv3
 */

interface DataBaseInterface
{
    public function connect($data);

    /**
     * Close connection to database
     */
    
    public function close();

    /**
     * Make query directly, without prepared statement
     * @param string $query MySQL query
     * @return mixed <b>StatementInterface</b> or <b>false</b> on query fail
    */
    
    public function query($query);    
    
    /**
     * Make variable safe for include to sql query and put variable into single queotes 
     * @param string $var unsafe input
     * @return string or <b>false</b> on fail
     */   
     
    public function quote($var);
    
    /**
     * Make query to database and return result statement
     * @param string $queryTpl prepared statement (in order of rules PDO)
     * @param array  $data Pairs of pseudo parameters and their values
     * @return mixed <b>StatementInterface</b> or <b>false</b> on query fail
     */
    
    public function ask($queryTpl, $data = array());
    
    /**
     * Make query to database and fetch one row
     * @param string $queryTpl prepared statement (in order of rules PDO)
     * @param array  $data Pairs of pseudo parameters and their values
     * @param array  $fetchMode return data format
     * @return mixed  Return <b>array</b> or <b>null</b> (if count of rows is zero) on success query and boolean <b>false</b> on fail
     */
    
    public function fetchRow($queryTpl, $data = array(), $fetchMode = 'assoc');

    public function lastInsertId();    
    
    public function isColumnExist($table, $column);
    
    public function getColumnType($table, $column);    
    public function getLastError();
}
