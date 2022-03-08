<?php

// Handling of database connection / queries
class database {
    private $db;
    public  $error      = true;
    public  $error_msg  = 'Failed to initiate database';

    // Initiate database connection
    public function __construct() {

        // Ensure config file exists
        global $private;
        if(!file_exists($private.'config.php')){
            $this->error_msg = 'Missing config file';
            return;
        }

        // Load credentials from config file
        try {
            include $private.'config.php';
        } catch(Exception $e){
            $this->error_msg = 'Failed to load config file';
            return;
        }

        // Establish connection to database
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->db = new mysqli(
                $mysql['host'],
                $mysql['username'],
                $mysql['password'],
                $mysql['database']
            );
        } catch (Exception $e){
            $this->error_msg = 'Failed to connect to database';
            return;
        }
        $this->error = false;
    }

    public function query($query){
        return $this->db->query($query);
    }
}

?>
