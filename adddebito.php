<?php
require_once "topdash.php";

require_once  "classes/motoboy.class.php";
$motoboy = new motoboy();
$id_usuario = $_SESSION['login'];
$data = date("Y-m-d");
$debito = addslashes($_GET['valor']);




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
                            <a href="addreceita.php" class="list-group-item  list-group-item-action">Adcionar Reseita</a>
                            <a href="adddebito.php" class="list-group-item  active list-group-item-action">Adcionar Debito</a>
                            <a href="relatorio.php" class="list-group-item list-group-item-action">Relatorio Geral</a>

                        </div>

                    </div>

                </div>

            </nav>
        </div>
        <div class="col-sm">
            <br>
           <h5> ADCIONAR DEBITO</h5>
            <div class="dropdown-divider espasamento"></div><?php
              if(isset($debito) && !empty($debito)){
                  $inserir = $motoboy->adddebito($id_usuario,$data,$debito);

                if($inserir == true){
                    ?>
                    <div class="alert alert-success">Foi adcionado o valor de R$<?php echo $debito ?>.00 com susseso</div>

                    <?php
                }else{

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
                                    <input type="number" class="form-control" id="inputPassword2"  name="valor" placeholder="0">
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
