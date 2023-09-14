<?php
    require_once './db/DB.php';

    class Sqlite extends DB{
        public function __construct($params){
            $path = $params['path'];
            if(file_exists($path)){
                $args = [
                    'dns'       => sprintf('sqlite:%s', $path ),
                    'user'      => null,
                    'password'  => null
                ];
                parent::__construct($args);
            }
        }
    }
