<?php
    namespace App\Db;


    class Sqlite extends DB{
        public function __construct($params){
            $pathToDatabase = $params['path'];
            if(file_exists($pathToDatabase)){
                $args = [
                    'dns'       => sprintf('sqlite:%s', $pathToDatabase),
                    'user'      => null,
                    'password'  => null
                ];
                parent::__construct($args);
            }
        }
    }