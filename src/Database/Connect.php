<?php 
    namespace Database;

    class Connect {
        private static $instance;

        public static function getConn() {
            if (!isset(self::$instance)){
                self::$instance = new \PDO('sqlite:database.sqlite');
            }
        
        return self::$instance;
        }
    }
?>