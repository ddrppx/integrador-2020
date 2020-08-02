<?php 
    namespace Database;
    use \PDO;
    define('DS', DIRECTORY_SEPARATOR);

    class Connect {
        private static $instance;
        const ROOT = __DIR__;
        const pathDB = "database.sqlite";

        public static function getConn() {
                //Verifica se ja tem ou não uma instancia do banco
            if (!isset(self::$instance)){
                self::$instance = new PDO('sqlite:'. self::ROOT. DS. self::pathDB);
                //Modifica os atributos para o erro não ser silencioso
                self::$instance -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
                //Retorna a instancia
            return self::$instance;
        }
    }
