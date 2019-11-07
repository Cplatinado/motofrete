<?php


class usuario {
    private $pdo;
    private $nome;
    private $senha;
    private $email;
    private $nascimento;
    private $rua;
    private $numero;
    private $telefone;
    private $nivel;


    public function __construct(){
        try{
            $this->pdo = new PDO('mysql:dbname=dbcataratas;host=localhost','admin','admin');

        }catch (PDOException $e){
            echo 'falhou a conexão '.$e->getMessage();

        }
    }

    public  function Getcodigo($nivel){

        $sql = "SELECT nivel FROM nivel where nivel = :nivel";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nivel", $nivel);
        $sql->execute();
        if( $sql->rowCount() > 0){
            $dado = $sql->fetch();
            return true;
        }else{
            return false;
        }
    }

    public function login($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE  email = :email and senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue("senha", $senha);
        $sql->execute();
        if ($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $_SESSION['login'] = $dado['id'];
            $_SESSION['nivel'] = $dado['nivel'];

            return true;

        }
    }

    public function casdastrar ($nome,$senha, $email, $rua, $numero, $telefone, $nivel){

        if($this->verificaremail($email) == true ){

            $sql = "INSERT INTO usuarios SET nome = :nome, senha = :senha, email = :email, rua = :rua, numcasa = :numero, telefone = :telefone, nivel = :nivel ";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":rua", $rua);
            $sql->bindValue(":numero", $numero);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":nivel", $nivel);
            $sql->execute();

            return true;

        }else{

            return false;
        }

    }
    public function deletar($email){
        $sql= "DELETE FROM usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

    }

    public function updateinfo($id, $telefone, $nome, $rua, $numero){
        $idd = $this->getid($email);
        echo $idd;

        $sql = "UPDATE usuarios SET nome = :nome, rua = :rua, numcasa = :numero, telefone = :telefone WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":rua", $rua);
        $sql->bindValue(":numero", $numero);
        $sql->bindValue(":telefone", $telefone);
        $sql->execute();
        return true;

    }
    public function updatesenha($id,$senha,$senha2){
        if($senha == $senha2){
            $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        }else{
            return false;
        }

    }


    private function verificaremail($email){

        $sql = "SELECT * FROM usuarios  where email= :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() == 0){
            return true;
        }else{
            return false;
        }

    }
    public function getid($email){
        $sql = "SELECT * FROM usuarios  WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0){
            $id = $sql->fetch();
            return $id['id'];
        }
    }



}