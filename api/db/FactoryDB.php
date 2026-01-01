<?php
    require_once './db/DB.php';
    require_once './db/Mysql.php';
    require_once './db/Sqlite.php';
    require_once './db/Postgresql.php';

    class FactoryDB{
        private static $_instance = null;

        private function __construct(){}
        private function __clone(){}


        public static function initialize($params){
            if(is_null(self::$_instance)) {
                $allowedDrivers = ['Sqlite', 'Mysql', 'Postgresql'];
                if (!in_array($params['driver'], $allowedDrivers)) {
                    throw new Exception("Driver not allowed: {$params['driver']}", 500);
                }

                if (!class_exists($params['driver'])) {
                    throw new Exception("Could not find the driver: {$params['driver']}", 500);
                }

                self::$_instance = new $params['driver']($params);
            }

            return self::$_instance;
        }
    }