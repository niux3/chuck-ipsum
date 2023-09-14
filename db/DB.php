<?php
    class DB{
        private $pdo = null;
        private $query = null;

        public function __construct($params){
            $this->pdo = new PDO($params['dns'], $params['user'], $params['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function beginTransaction(){
            $this->pdo->beginTransaction();
        }

        public function commit(){
            $this->pdo->commit();
        }

        public function rollBack(){
            $this->pdo->rollBack();
        }

        public function query($sql, $params = []){
            try {
                if(count($params) > 0){
                    $this->query = $this->pdo->prepare($sql);
                    foreach($params as $k => $v){
                        $this->query->bindParam($k, $v, is_numeric($v)? PDO::PARAM_INT : PDO::PARAM_STR);
                    }
                    $this->query->execute();
                }else{
                    $this->query = $this->pdo->query($sql);
                }

                return $this;
            } catch (Exception $e) {
                return false;
            }
        }

        public function fetch(){
            return $this->query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getLastInsertId(){
            return $this->pdo->lastInsertId();
        }
    }
