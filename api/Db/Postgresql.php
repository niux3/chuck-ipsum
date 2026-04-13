<?php
    namespace App\Db;


    class Postgresql extends DB{
        public function __construct($params){
            $args = [
                'dns'       => sprintf('pgsql:host=%s;port=%s;dbname=%s', $params['host'], $params['port'] ?? 5432, $params['database']),
                'user'      => $params['user'],
                'password'  => $params['password'],
            ];
            parent::__construct($args);
        }
    }