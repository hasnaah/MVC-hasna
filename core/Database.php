<?php

class Database extends PDO {
    private $servername = 'localhost';
    private $dbname = 'site_pizza';
    private $username = 'root';
    private $password = '';
    public function __construct(){
        try {
            parent::__construct("mysql:host=$this->servername;dbname=$this->dbname; charset=utf8", $this->username, $this->password);
            // echo ("connexion ok");
        }
        catch(Exception $e){
            print_r($e);
        }
    }
}