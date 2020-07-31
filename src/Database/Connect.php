<?php 
    namespace Database;

use PDOException;

class Connect {
        private static $instance;

        public static function getConn() {
            try {
            if (!isset(self::$instance)){
                self::$instance = new \PDO('sqlite:database.sqlite');
            }
        
        return self::$instance;
             } catch (PDOException $e) {
                 echo $e -> getMessage();
             }
        }

        public static function getTest() {
            return "<br />Trying this echo. <br />";
        }
    }
