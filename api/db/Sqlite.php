<?php
    require_once './db/DB.php';

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