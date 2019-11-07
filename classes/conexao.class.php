<?php
class conexaodb{
    private $pdo;
    public function __construct(){
        try{
            $this->pdo = new PDO('mysql:dbname=dbcataratas;host=localhost','admin','admin');

        }catch (PDOException $e){
            echo 'falhou a conexão '.$e->getMessage();

        }
    }
}