<?php

require_once "topdash.php";
require_once  "classes/motoboy.class.php";
$motoboy = new motoboy();
$id_usuario = $_SESSION['login'];

$data = date("Y-m-d");


$valor = $motoboy->getvalor($id_usuario,$data);
$valorR = $valor['receita'];
$valorD = $valor['debito'];

$valorL = $valor['liquido'];

$pesquisaBairro = $_GET['buscar'];




$infoBairro = $motoboy->getTdbairro();




?>
<div class="container">
    <div class="row">
        <div class="col-sm-3  navbar-dark">
            <nav class="navbar navbar-expand-sm  " >


            <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbarmenu" >
                <span class="navbar-toggler-icon bg-info"></span>
            </button>
                <div class="navbar-collapse collapse" id="navbarmenu">

                    <div class="navbar-nav ">
                        <div class="list-group text-center">
                            <a href="#" class="list-group-item list-group-item-action active">
                                Dashboard
                            </a>
                            <a href="addreceita.php" class="list-group-item list-group-item-action">Adcionar Reseita</a>
                            <a href="adddebito.php" class="list-group-item list-group-item-action">Adcionar Debito</a>
                            <a href="relatorio.php" class="list-group-item list-group-item-action">Relatorio Geral</a>

                        </div>

                    </div>

                </div>

            </nav>
        </div>


        <div class="col-sm">
            <h5 class="espasamento3"> Valores acomulados até o momento.</h5>
            <div class="dropdown-divider"></div>
            <div class="row  justify-content-center  align-items-center">
                <div class="col-sm  valoresr text-center align-items-center  justify-content-center">

                    <div > Valor ganho ate o momento</div>
                    <div class="h5"><strong>R$<?php echo $valorR?>,00</strong></div>
                </div>

                <div class="col-sm  valoresd text-center align-items-center justify-content-center"">

                    <div > Valor gasto ate o momento</div>
                    <div class="h5"><strong>R$<?php echo $valorD?>,00</strong></div>
               </div>


                <div class="col-sm  valoresr  text-center align-items-center justify-content-center "">

                    <div > Valor liquido ate o momento</div>
                    <div class="h5"><strong>R$<?php echo $valorL ?>,00</strong></div>
                </div>




            </div>
            <h5 class="espasamento3"> Tabala de taxa dos bairros</h5>
            <div class="dropdown-divider"></div>

             <div class="container-fluid d-flex espasamento3 justify-content-center" >
                <form method="get"class="form-row">
                   <div class="form-row align-items-center">
                       <div class="col-auto">
                           <label class="sr-only" for="busca">Bairro</label>
                           <div class="input-group mb-2">
                               <div class="input-group-prepend">
                                   <div class="input-group-text">Buscar</div>
                               </div>
                               <input type="text" class="form-control"  name="buscar" id="busca" placeholder="Bairro">
                               <button type="submit" class="btn btn-primary">Enviar</button>


                           </div>

                       </div>

                   </div>
                </form>


             </div>

            <div class="container-fluid  espasamento3 justify-content-center">
                <?php if(isset($pesquisaBairro) && !empty($pesquisaBairro)){
                    $bucar = $motoboy->pesquisarbairro($pesquisaBairro);

                    if($bucar == true){
                        ?>
                        <div class="alert alert-info">
                            O valor da taxa para o bairro <?php echo $bucar['bairo'] ?> é de R$ <?php echo $bucar['valor'] ?>,00

                        </div>
                        <?php


                    }else{
                        ?>
                        <div class="alert alert-danger text-center"> Digite o nome do bairro corretamente </div>
                        <?php
                    }

                } ?>

                <div class="table-responsive tabela shadow-sm p-3 mb-5 bg-white rounded ">
                    <table class="table table-striped table-hover  text-center table-sm shadow-lg p-3 mb-5 bg-white rounded">
                        <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Bairro</th>
                            <th>Valor</th>
                        </tr>


                        </thead>

                        <tbody class="bg-light">
                        <?php
                        foreach ($infoBairro as $infoBairro){



                            echo "<tr>";
                            echo "<td>".utf8_encode($infoBairro['id'])."</td>";
                            echo "<td>".utf8_encode($infoBairro['bairo'])."</td>";
                            echo "<td>"."R$ ".$infoBairro['valor'].",00"."</td>";
                            echo "<tr>";
                        }

                        ?>



                        </tbody>

                    </table>
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