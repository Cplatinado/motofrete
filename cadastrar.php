<?php
require 'top.php';
require_once "classes/usuario.class.php";
$cadastar = new usuario();

$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$telefone = addslashes($_POST['telefone']);
$rua = addslashes($_POST['rua']);
$numero = addslashes($_POST['numcasa']);
$senha = md5($_POST['senha']);
$nivel = addslashes($_POST['nivel']);



?>

<div class="container corpo">
    <div class="row d-flex">
        <div class="col">
            <h3> Cadastro</h3>
            <hr class="my-2">
            <br>



            <?php
                if(isset($nivel) && !empty($nivel)){

                        if($cadastar->Getcodigo($nivel) == true){

                                if($cadastar->casdastrar($nome,$senha, $email, $rua, $numero, $telefone, $nivel)){
                                  ?>
                                        <div class="alert alert-success">
                                            <strong> Parabéns </strong> seu cadastro foi conluido com sucesso faça o <a href="login.php">login</a> agora!!
                                        </div>
                                    <?php
                                }else {
                                    ?>
                                    <div class="alert alert-warning">
                                        Este usuario ja exite ! faça o <a href="login.php">login</a> agora!!
                                    </div>

                                    <?php
                                }
                        }else{
                            ?>
                        <div class="alert alert-danger"> É nescessario o codigo de acesso entre em contato conosco atraves do what's App</div>

                        <?php
                        }

                    }
                    ?>




            <form method="POST" class="shadow-lg p-3 mb-5 bg-white rounded">

                    <div class="form-row d-flex justify-content-between">
                        <div class="form-group col-md-4">



                         <label for="nome" >Nome:</label>
                        <input type="text"  name="nome"  required class="form-control shadow p-3 mb-5 bg-white rounded" placeholder="..." autofocus id="nome">

                        </div>
                        <div class="form-group col-md-3">

                             <label for="email" >E-mail:</label>
                            <input type="email" required name="email" placeholder="@"
                                   class="form-control shadow p-3 mb-5 bg-white rounded"  id="email">


                        </div>
                        <div class="form-group col-md-3">

                            <label for="telefone" >Telefone</label>
                            <input type="number" required name="telefone" placeholder="Telefone para contato"
                                   class="form-control shadow p-3 mb-5 bg-white rounded" id="telefone">
                            <i class="fas fa-question-circle"></i>


                        </div>
                    </div>

                    <div class="form-row d-flex justify-content-between " >

                        <div class="form-group col-sm-7">
                            <label for="rua">Endereço</label>
                            <input type="text" required class="form-control shadow p-3 mb-5 bg-white rounded"
                                   placeholder="..." aria-describedby="helprua" id="rua" name="rua">
                            <small id="helprua" class="form-text text-muted"> Digite somente o nome da rua </small>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="numero">numero</label>
                            <input type="number" required class="form-control shadow p-3 mb-5 bg-white rounded" id="numero" name="numcasa" placeholder="0">
                        </div>
                    </div>

                    <div class="form-row d-flex justify-content-between">
                        <div class="form-group col-md-4">
                            <label for="senha">Senha</label>
                            <input type="password" required class="form-control shadow p-3 mb-5 bg-white rounded" name="senha"  id="senha">
                        </div>

                        <div class="form-group col-md-2">
                        <span class="d-inline-block" data-toggle="tolltip" tabindex="0"
                              title="Este codigo de acesso é fornecido somente pelo nosso what's App  ">
                        <label for="nivel">Codigo </label>
                        <input type="text" required class="form-control shadow p-3 mb-5 bg-white rounded" name="nivel" id="nivel">
                            </span>
                        </div>
                    </div>

                <BUTTON type="submit" class="btn btn-outline-success btn-lg btn-block shadow-lg mb-5  rounded" > CADASTRAR</BUTTON>

            </form>




        </div>
        <div class="col-sm-3">
            <h3> Parceiros</h3>
            <hr class="my-2">

        </div>
    </div>
</div>
<div class="container-fluid footertext  d-flex justify-content-center align-items-center">


    <div class="h2">
        Deixe-nos ajudá-lo a encontrar uma solução que atenda às suas necessidades !!

    </div>
</div>
<?php require_once 'footer.php'; ?>