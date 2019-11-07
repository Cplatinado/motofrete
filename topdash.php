<?php

require 'config.php';
require_once  "classes/usuario.class.php";

$login = new usuario();
$motoboy = "#M357";
$cliente ="#C578";
$ponto = "#C159";



if(empty($_SESSION['login'])){
    header("location: index.php");
}
if($_SESSION['nivel'] != $motoboy ){
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Moto Frete cataratas</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <link rel="stylesheet" href="css/style.css">




</head>
<body>
    <header>

        <nav>
            <div class="container ">
                <div class="row d-flex align-items-center justify-content-center ">
                    <div class="col d-flex  justify-content-center" >
                        <a href=""><img src="images/logo.jpg" class="logo" height="100" width="110"/></a>

                        <a href="" ><img src="images/logo2.jpg"  class="logo2" height="100" width="300"/></a>
                    </div>
                    <div class="col-sm d-flex align-items-center  espasamento justify-content-center">
                       <ul class="list d-flex small list-inline justify-content-between">
                           <li class="list-inline-item"> HOME</li>
                           <li class="list-inline-item ocultar"> VALORES </li>
                           <li class="list-inline-item ocultar"> CONTATO</li>
                           <li class="list-inline-item ocultar"> QUEM SOMOS</li>

                        <div class="btn-group ">
                           <div class="dropdown teste  text-center">
                               <button type="button" class="btn login  btn-sm btn-primary dropdown-toggle"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                   SERVIÇOS
                               </button>
                               <div class="dropdown-menu">
                                   <a href="#" class="dropdown-item"> VALORES</a>
                                   <a href="#" class="dropdown-item "> CONTATO</a>
                                   <a href="#" class="dropdown-item "> QUEM SOMOS</a>
                               </div>
                           </div>
                        </div>


                            <?php if (isset($_SESSION['login']) && !empty($_SESSION['login'])) :?>

                           <div class="btn-group dropdown ">
                               <button type="button" class="btn login btn-sm btn-primary dropdown-toggle "
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   informações
                               </button>
                               <div class="dropdown-menu dropdown-menu-sm-left">

                                      <a class="dropdown-item " href="#"> Dashbord </a>
                                      <a class="dropdown-item " href="#"> Tabela de valores </a>
                                      <a class="dropdown-item" href="#"> Meus Dados</a>
                                   <div class="dropdown-divider"> </div>
                                    <a class="btn btn-outline-warning  btn-block shadow-md mb-2 rounded" href="sair.php">Sair</a>
                               </div>
                           </div>

                           <?php else: ?>
                               <div class="btn-group dropleft ">
                                   <button type="button" class="btn login  btn-sm btn-primary dropdown-toggle "
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Login
                                   </button>
                                   <div class="dropdown-menu dropdown-menu-sm-left">
                                       <?php
                                       $email = addslashes($_POST['email']);
                                       $senha = md5($_POST['senha']);

                                           if (isset($email) && !empty($email)){

                                               if($login->login($email, $senha) == True){

                                                   if($_SESSION['nivel'] == $motoboy){
                                                       ?>
                                                       <script type="text/javascript">window.location.href="index.php"</script>
                                                    <?php
                                                    if($_SESSION['nivel'] == $ponto){
                                                        ?>
                                                        <script type="text/javascript">window.location.href="dashponto.php"</script>
                                                       <?php
                                                    }
                                                   }else{
                                                       ?>
                                                   <script type="text/javascript">window.location.href="dashcliente.php"</script>
                                                   <?php
                                                        }


                                                   ?>


                                                <?php
                                               }else{
                                                   ?>
                                                   <div class="modal" tabindex="-1" role="dialog">
                                                       <div class="modal-dialog" role="document">
                                                           <div class="modal-content">
                                                               <div class="modal-header">
                                                                   <h5 class="modal-title">Modal title</h5>
                                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                       <span aria-hidden="true">&times;</span>
                                                                   </button>
                                                               </div>
                                                               <div class="modal-body">
                                                                   <p>Modal body text goes here.</p>
                                                               </div>
                                                               <div class="modal-footer">
                                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                   <button type="button" class="btn btn-primary">Save changes</button>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>

                                                <?php
                                               }
                                           }



                                       ?>
                                       <form method="POST" class="form-group">
                                           <div class="form-group">
                                               <label for="exampleInputEmail1" class="formdrop">Email</label>
                                               <input type="email" name="email" class="form-control formdrop " id="exampleInputEmail1"
                                                      placeholder="Digite o email">

                                           </div>
                                           <div class="form-group">
                                               <label for="exampleInputEmail" class="formdrop">Senha</label>
                                               <input type="password" name="senha" class="form-control formdrop" id="exampleInputEmail"
                                                      placeholder="Digite a Senha">

                                           </div>
                                           <div class="form-group d-flex justify-content-between ">
                                           <button type="submit" class="btn btn-sm btn-outline-success formdrop">Entrar</button>
                                           <a href="cadastrar.php" class="btn  btn-sm btn-outline-warning formdrop" >Cadastrar</a>
                                           </div>
                                       </form>

                                   </div>
                               </div>
                           <?php endif;?>

                       </ul>


                    </div>
                </div>
            </div>
        </nav>



    </header>




