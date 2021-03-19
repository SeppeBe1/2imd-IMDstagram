<?php
    abstract class Database {
        private static $conn;

        public static function getConn(){
            if(self::$conn != null){
                echo "Connection succesful!";
                return self::$conn;
            } else {
                $config = parse_ini_file("configDB/config.ini");
                self::$conn = new PDO('mysql:host='. $config['db_host'] .';dbname=' . $config['db_name'], $config['db_user'], $config['db_password'] );
                return self::$conn;
            }
        }
    }