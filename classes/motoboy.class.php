<?php

class motoboy{
    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new PDO('mysql:dbname=dbcataratas;host=localhost','admin','admin');

        }catch (PDOException $e){
            echo 'falhou a conexão '.$e->getMessage();

        }
    }


    public function  valorbairro($bairo){

        try{
            $sql = "SELECT * FROM taxas WHERE bairo = :bairo";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":bairo", $bairo);
            $sql->execute();
            if($sql->rowCount() > 0 ){
                return $sql->fetch();
                return true;
            }else{
                throw  new InvalidArgumentException("digite o nome do bairro corretamente");
            }
        }catch (InvalidArgumentException $e){
            echo "atenção ".$e->getMessage();
            return false;

        }
    }

    public function addreceita($id_usuario, $data, $receita){

        if ($this->verificardata($data,$id_usuario) == false){

            $sql = "INSERT INTO info SET  id_usuario  = :idusuario, data = :data, receita = :receita ";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":idusuario", $id_usuario);
            $sql->bindValue(":data", $data);
            $sql->bindValue(":receita", $receita);
            $sql->execute();


            return true;

        }else{

            $valordb  = $this->getvalor($id_usuario, $data);
            $valordb = $valordb['receita'] + $receita;


            $sql = "UPDATE info SET receita = :valor WHERE data = :data and id_usuario = :id_usuario";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":valor", $valordb);
            $sql->bindValue(":data", $data);
            $sql->bindValue(":id_usuario", $id_usuario);
            $sql->execute();

            return true;

        }

    }
    public  function realatorio7G($id_usuario){

        $sql = "SELECT SUM(receita) as total from (SELECT  receita from info where id_usuario = :id_usuario ORDER  BY receita limit 7) as t1";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $dado = $sql->fetch();
            return $dado['total'];
        }
    }
    public  function realatorio7D($id_usuario){

        $sql = "SELECT SUM(debito) as total from (SELECT debito from info where id_usuario = :id_usuario order by debito limit 7)as t1";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $dado = $sql->fetch();
            return $dado['total'];
        }
    }

    public  function realatorio7L($id_usuario){

        $sql = "SELECT SUM(liquido) as total from (SELECT liquido FROM info WHERE id_usuario = :id_usuario order by liquido limit 7) as t1";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $dado = $sql->fetch();
            return $dado['total'];
        }
    }

    public  function realatorio30G($id_usuario){

        $sql = "SELECT SUM(receita) as total from (SELECT  receita from info where id_usuario = :id_usuario ORDER  BY receita limit 30) as t1";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $dado = $sql->fetch();
            return $dado['total'];
        }
    }

    public  function realatorio30D($id_usuario){

        $sql = "SELECT SUM(debito) as total from (SELECT debito from info where id_usuario = :id_usuario order by debito limit 30)as t1";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $dado = $sql->fetch();
            return $dado['total'];
        }
    }

    public  function realatorio30L($id_usuario){

        $sql = "SELECT SUM(liquido) as total from (SELECT liquido FROM info WHERE id_usuario = :id_usuario order by liquido limit 30) as t1";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $dado = $sql->fetch();
            return $dado['total'];
        }
    }


    public function adddebito($id_usuario, $data, $debito){

        if ($this->verificardata($data,$id_usuario) == false){

            $sql = "INSERT INTO info SET  id_usuario  = :idusuario, data = :data, debito = :receita ";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":idusuario", $id_usuario);
            $sql->bindValue(":data", $data);
            $sql->bindValue(":receita", $debito);
            $sql->execute();


            return true;

        }else{

            $valordb  = $this->getvalor($id_usuario, $data);
            $valordb = $valordb['debito'] + $debito;


            $sql = "UPDATE info SET debito = :valor WHERE data = :data and id_usuario = :id_usuario ";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":valor", $valordb);
            $sql->bindValue(":data", $data);
            $sql->bindValue(":id_usuario", $id_usuario);
            $sql->execute();

            return true;

        }

    }


    public function setliquido ($id_usuario, $data, $valor2){

        if(isset($valor2) && !empty($valor2)){

            if ($this->verificardata($data,$id_usuario) == false){

                $sql = "INSERT INTO info SET  id_usuario  = :id_usuario, data = :data, liquido = :valor ";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":id_usuario", $id_usuario);
                $sql->bindValue(":data", $data);
                $sql->bindValue(":valor", $valor2);
                $sql->execute();


                return true;

            }else{

                $sql = "UPDATE info SET liquido = :valor WHERE data = :data and  id_usuario = :id_usuario";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":id_usuario", $id_usuario);
                $sql->bindValue(":data", $data);
                $sql->bindValue(":valor", $valor2);
                $sql->execute();

                return true;

            }
        }
    }

    public  function getvalor($id_usario, $data){

        $sql = "SELECT * FROM info where id_usuario = :id_usuario AND data = :data";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id_usario);
        $sql->bindValue(":data", $data);
        $sql->execute();
        if ($sql->rowCount() > 0 ){
            $valor = $sql->fetch();
            return $valor;

        }

    }

    public function somarganhos($id_usuario, $datai,$dataf){

        $sql = "SELECT SUM(receita) as soma from info where data between :datai and :dataf and id_usuario = :id_usuario";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":datai", $datai);
        $sql->bindValue("dataf", $dataf);
        $sql->bindValue("id_usuario", $id_usuario);
        $sql->execute();
        if($sql->rowCount() > 0 ){
            $dado = $sql->fetch();
            return $dado['soma'];
        }
    }

    public function somardebitos($id_usuario, $datai,$dataf){

        $sql = "SELECT SUM(debito) as soma from info where data between :datai and :dataf and id_usuario = :id_usuario";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":datai", $datai);
        $sql->bindValue("dataf", $dataf);
        $sql->bindValue("id_usuario", $id_usuario);
        $sql->execute();
        if($sql->rowCount() > 0 ){
            $dado  =  $sql->fetch();
            return $dado['soma'];
        }
    }

    public function somarliquido($id_usuario, $datai,$dataf){

        $sql = "SELECT SUM(liquido) as soma from info where data between :datai and :dataf and id_usuario = :id_usuario";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":datai", $datai);
        $sql->bindValue("dataf", $dataf);
        $sql->bindValue("id_usuario", $id_usuario);
        $sql->execute();
        if($sql->rowCount() > 0 ){
            $dado  =  $sql->fetch();
            return $dado['soma'];
        }
    }

    public function pesquisarbairro($bairro){

        $sql = "SELECT * FROM taxas WHERE bairo = :bairro";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":bairro", $bairro);
        $sql->execute();
        if ($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return false;
        }

    }


    public function getTdbairro(){
        $sql = "SELECT * FROM taxas";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){

            $produtos =     $sql->fetchAll();
            return $produtos;
        }
    }


    public function verificardata($data,$id_usuario){
        $sql= "SELECT * FROM info WHERE data = :data and id_usuario = :id_usuario";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":data", $data);
        $sql->bindValue(":id_usuario", $id_usuario);

        $sql->execute();
        if ( $sql->rowCount() > 0){


            return true;
        }else{

            return false;

        }
    }


}
