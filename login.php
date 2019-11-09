<?php
require_once "top.php";
?>

<div class="container  ">
    <div class="row ">
        <div class="col d-flex justify-content-center align-items-center ">
            <div class="login2 text-center shadow-lg p-3 mb-5 rounded ">
                <h3 class="espasamento3 ">Login</h3>

                <form method="post" class="form-group espasamento3">
                    <?php
                    $email = addslashes($_POST['email']);
                    $senha = md5($_POST['senha']);

                    if (isset($email) && !empty($email)){

                        if($login->login($email, $senha) == True){

                        if($_SESSION['nivel'] == $motoboy){
                            ?>
                            <script type="text/javascript">window.location.href="dashmoto.php"</script>
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

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="formdrop">Email</label>
                        <input type="email" name="email" class="form-control formdrop " autofocus id="exampleInputEmail1"
                               placeholder="Digite o email">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="formdrop">Senha</label>
                        <input type="password" name="senha" class="form-control formdrop" id="exampleInputEmail"
                               placeholder="Digite a Senha">

                    </div>
                    <div class="form-group d-flex justify-content-between ">

                    <button type="submit" class="btn btn-success btn-block">Entrar</button>


                </form>



            </div>

        </div>
    </div>

</div>




<?php
require_once "footer.php";