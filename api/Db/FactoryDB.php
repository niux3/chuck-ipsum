<?php
    namespace App\Db;

    use Exception;


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

                $className = __NAMESPACE__ . '\\' . $params['driver'];
                /* echo $className; die; */

                if (!class_exists($className)) {
                    throw new Exception("Could not find the driver: {$className}", 500);
                }

                self::$_instance = new $className($params);
            }

            return self::$_instance;
        }
    }