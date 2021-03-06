<?php
    namespace src\classes;
    use \PDO;

     class Db {
        private static $conn;

        public static function getInstance(){
            if(self::$conn != null){
                echo "";
                // connection found, return connection
                return self::$conn;
            } else{
                $config = parse_ini_file("settings/settings.ini");
                self::$conn = new PDO('mysql:host='. $config['db_host'] .';dbname=' . $config['db_name'], $config['db_user'], $config['db_password'] );
                return self::$conn;
            }
        }
    }