<?php

/*
* Mysql database class - only one connection allowed (SINGLETON PATTERN)
*/

class DatabaseModel
{

    //Many php developers use the underscore as a prefix for private properties
    private $_connection;
    private static $_instance; //The single instance

    /*
    Get an instance of the Database
    @return Instance
    */
    // In PHP there is no need to indicate the type of the returned value. You can indicate it,
    //but even so, you can return a different type and it will be converted to
    //the right type (unless strict types is set).
    //MORE INFO: http://php.net/manual/es/functions.returning-values.php
    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) { // If no instance of Database, then make one
            self::$_instance = new self(); //it is the same as new Database()
        }
        return self::$_instance;
    }


    // Constructor
    private function __construct()
    {
        $config = parse_ini_file('Config/config.ini');

        // Try and connect to the database
        $this->_connection = new mysqli($config['host'], $config['user'],
            $config['password'], $config['database']);

        // Error handling
        if ($this->_connection->connect_error) {
            trigger_error("Failed to connect to MySQL: " . $this->_connection->connect_error,
                E_USER_ERROR);
        }
        /*
         * ---------------------------------------------------------------------------------------
         * Para que esto funcone, es necesario que el servidor tenga instalado el driver de SQL server!
         * ---------------------------------------------------------------------------------------
        $serverName = "primitiva.database.windows.net,1433";
        $connectionInfo = array( "Database"=>"PrimitivaJavi", "UID"=>"prueba", "PWD"=>"pr23ueba234.");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

        if( $conn ) {
            echo "Conexión establecida.<br />";
        }else{
            echo "Conexión no se pudo establecer.<br />";
            die( print_r( sqlsrv_errors(), true));
        }
        */
    }

    // Magic method clone to prevent duplication of connection
    public function __clone()
    {
        trigger_error("Cloning of " . get_class($this) . " not allowed: ", E_USER_ERROR);
    }

    // Magic method wakeup to prevent duplication through serialization - deserialization
    public function __wakeup()
    {
        trigger_error("Deserialization of " . get_class($this) . " not allowed: ", E_USER_ERROR);
    }

    // Get mysqli connection
    public function getConnection()
    {
        return $this->_connection;
    }

}