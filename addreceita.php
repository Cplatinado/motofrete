<?php
require_once "topdash.php";

require_once  "classes/motoboy.class.php";
$motoboy = new motoboy();
$id_usuario = $_SESSION['login'];

$data = date("Y-m-d");
$receita = addslashes($_GET['bairro']);
$bairro = addslashes($_GET['bairro2']);



?>


<div class="container">
    <div class="row espasamento">
        <div class="col-sm-3  navbar-dark">
            <nav class="navbar navbar-expand-sm  " >


                <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbarmenu" >
                    <span class="navbar-toggler-icon bg-info"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarmenu">

                    <div class="navbar-nav ">
                        <div class="list-group text-center">
                            <a href="dashmoto.php" class="list-group-item list-group-item-action ">
                                Dashboard
                            </a>
                            <a href="addreceita.php" class="list-group-item active list-group-item-action">Adcionar Reseita</a>
                            <a href="adddebito.php" class="list-group-item list-group-item-action">Adcionar Debito</a>
                            <a href="relatorio.php" class="list-group-item list-group-item-action">Relatorio Geral</a>

                        </div>

                    </div>

                </div>

            </nav>
        </div>
        <div class="col-sm">
            <br>
           <h5> ADCIONAR RECEITA</h5>
            <div class="dropdown-divider espasamento"></div><?php
              if(isset($receita) && !empty($receita)){
                  $inserir = $motoboy->addreceita($id_usuario,$data,$receita);

                if($inserir == true){
                    ?>
                    <div class="alert alert-success">Foi adcionado o valor de R$<?php echo $receita ?>.00 com susseso</div>

                    <?php
                }else{

                }
            }


            if(isset($bairro) && !empty($bairro)){


              $valor = $motoboy->valorbairro($bairro);
              $receita = $valor['valor'];

              $inserir = $motoboy->addreceita($id_usuario,$data,$receita);

                if($inserir == true){
                    ?>
                    <div class="alert alert-success">Foi adcionado o valor de R$<?php echo $receita ?>.00 ,
                    referente ao bairro <?php echo $bairro  ?></div>

                    <?php
                }else{
                    echo 'deu ruim';
                }
            }

            ?>




            <div id="acordion">
                <div class="">
                    <div class="d-flex justify-content-center">

                        <button class="btn btn-lg btn-primary" data-toggle="collapse" data-target="#c1">Adcionar um valor livre </button>
                    </div>
                    <div class="collapse" id="c1">
                        <div class="card-body">
                            <form class="form-inline d-flex justify-content-center"  method="get">


                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputPassword2" >Digite o valor  :   </label>
                                    <input type="number" class="form-control" id="inputPassword2"  name="bairro" placeholder="0">
                                </div>
                                <button type="submit" class="btn btn-success mb-2 espasamento3">enviar</button>
                            </form>


                        </div>
                    </div>


                </div>
                <div class="">
                    <div class="espasamento d-flex justify-content-center">
                        <button class="btn btn-lg btn-primary" data-toggle="collapse" data-target="#c2">Adcionar um valor apartir de um bairro </button>
                    </div>
                    <div class="collapse" id="c2">
                        <div class="card-body">
                            <form class="form-inline d-flex justify-content-center"  method="get">


                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputPassword2" >Digite o Bairro  :   </label>
                                    <input type="text" class="form-control" id="inputPassword2"  name="bairro2" placeholder="bairro">
                                </div>
                                <button type="submit" class="btn btn-success mb-2 espasamento3">enviar</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>


        </div>

    </div>
</div>



</div>

</div>

<br>
<br>
<br>
<br>
<br>
<br>
<?php
require_once "footer.php";
?>
