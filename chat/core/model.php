<?php

class Model {
    protected $db;
    
    public function __construct() {
        global $config;
        try{
            $this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['dbhost'],
                                $config['dbuser'],$config['dbpass']);
        } catch (PDOException $ex) {
            echo 'Erro: '.$ex->getMessage();
        }        
    }
    
}