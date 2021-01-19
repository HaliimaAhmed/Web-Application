<?php

mysqli_report(MYSQLI_REPORT_STRICT);

class DAO_Abstract{
    protected $mysqli;
    
    protected static $DB_HOST = "localhost";
    protected static $DB_USERNAME = "wp_eatery";
    protected static $DB_PASSWORD = "password";
    protected static $DB_DATABASE = "wp_eatery";
    
    function __construct() {
        try{
            $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE);
        }catch(mysqli_sql_exception $e){
            throw  $e;
        }
    }
    
    public function getMysqli(){
        return $this->mysqli;
        
    }
}

?>