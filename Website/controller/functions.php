<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 15-02-2023
    //Filename          : functions.php
    //Version           : 1.0
    class Database {
        public $connection;
        public $is_connected;

        function init_connection($servername, $db, $username, $password, $port) {
            $this->connection = mysqli_connect($servername, $username, $password, $db, $port);
            //check if the connection was established.
            if(mysqli_connect_errno()) {
                //set successful
                $this->is_connected = false;
            } else {
                //set unsuccessful
                $this->is_connected = true;
            }
        }

        function close_connection() {
            //close the connection
            mysqli_close($this->connection);
            //disconnected
            $this->is_connected = false;
        }

        function get_connection() {
            return $this->connection;
        }
        
        function is_connected() {
            return $this->is_connected;
        }
    }
?>