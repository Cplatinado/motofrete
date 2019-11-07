<?php
require_once "topdash.php";

require_once  "classes/motoboy.class.php";
$motoboy = new motoboy();
$id_usuario = $_SESSION['login'];
$data = date("Y-m-d");
$datai = addslashes($_GET['datainicio']);
$dataf = addslashes($_GET['datafim']);

$dataig = addslashes($_GET['datainiciog']);
$datafg = addslashes($_GET['datafimg']);

$datail = addslashes($_GET['datainiciol']);
$datafl = addslashes($_GET['datafiml']);

$R7g = $motoboy->realatorio7G($id_usuario);
$R7d = $motoboy->realatorio7D($id_usuario);
$R7l = $motoboy->realatorio7L($id_usuario);

$R30g = $motoboy->realatorio30G($id_usuario);
$R30d = $motoboy->realatorio30D($id_usuario);
$R30l = $motoboy->realatorio30L($id_usuario);




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
                            <a href="addreceita.php" class="list-group-item list-group-item-action">Adcionar Reseita</a>
                            <a href="adddebito.php" class="list-group-item list-group-item-action">Adcionar Debito</a>
                            <a href="relatorio.php" class="list-group-item active  list-group-item-action">Relatorio Geral</a>

                        </div>

                    </div>

                </div>

            </nav>
        </div>
        <div class="col-sm ">
            <br>
           <h5> RELATORIO </h5>
            <div class="dropdown-divider espasamento"></div><?php

            # fericicando data do campo de ganho e puxando os valores do db
            if(isset($datai) && !empty($datai)){
                $verificar = $motoboy->verificardata($datai);
                if($verificar == false){?>
                     <div class="alert alert-warning">insisara uma data valida</div>
            <?php
                }else{
                    $relatorio = $motoboy->somarganhos($id_usuario,$datai,$dataf); ?>
                     <div class="alert alert-success">
                        A soma dos valores tem o total de de <strong>R$ <?php echo $relatorio?>,00</strong>,  isso referente do seus ganhos brutos.
                    </div><?php
                }
            }

            #ferificando as dadas do campo de gastos e puxando os valores do db
            if(isset($dataig) && !empty($dataig)){
                $verificar = $motoboy->verificardata($dataig);
                if($verificar == false){?>
                    <div class="alert alert-warning">insisara uma data valida</div>
            <?php
                }else{
                    $relatorio = $motoboy->somardebitos($id_usuario,$dataig, $datafg); ?>
                    <div class="alert alert-success">
                    A soma dos valores tem o total de de <strong>R$ <?php echo $relatorio?>,00</strong>,  isso referente do seus GASTOS.
                    </div><?php

                }

            }

            #ferificando as datas do compo de liquido e puxando os valores do db
            if(isset($datail) && !empty($datail)){
                $verificar = $motoboy->verificardata($datail);
                if($verificar == false){?>
                    <div class="alert alert-warning">insisara uma data valida</div>
                    <?php
                }else{
                    $relatorio = $motoboy->somarliquido($id_usuario,$datail, $datafl); ?>
                    <div class="alert alert-success">
                    A soma dos valores tem o total de de <strong>R$ <?php echo $relatorio?>,00</strong>,  isso referente do seus ganhos liquidos.
                    </div><?php

                }

            }


            ?>
            <h5 class="espasamento2"> Relatorio dos ultimos 7 dias</h5>

                <div class="row  justify-content-center  align-items-center">
                    <div class="col-sm  valoresr text-center align-items-center  justify-content-center">

                        <div > Valor ganho </div>
                        <div class="h5"><strong>R$<?php echo $R7g; ?>,00</strong></div>
                    </div>

                    <div class="col-sm  valoresd text-center align-items-center justify-content-center"">

                    <div > Valor gasto </div>
                    <div class="h5"><strong>R$<?php echo $R7d;?>,00</strong></div>
                </div>


                <div class="col-sm  valoresr text-center align-items-center justify-content-center"">

                <div > Valor liquido </div>
                <div class="h5"><strong>R$<?php echo $R7l; ?>,00</strong></div>
            </div>
            </div>

             <div class="dropdown-divider"></div>
             <h5 class="espasamento2">Relatorio ultimos 30 dias</h5>

                <div class="row  justify-content-center  align-items-center">
                    <div class="col-sm  valoresr text-center align-items-center  justify-content-center">

                        <div > Valor ganho </div>
                        <div class="h5"><strong>R$<?php echo $R30g; ?>,00</strong></div>
                    </div>

                    <div class="col-sm  valoresd text-center align-items-center justify-content-center"">

                    <div > Valor gasto </div>
                    <div class="h5"><strong>R$<?php echo $R30d;?>,00</strong></div>
                </div>


                <div class="col-sm  valoresr text-center align-items-center justify-content-center"">

                <div > Valor liquido</div>
                <div class="h5"><strong>R$<?php echo $R30l; ?>,00</strong></div>
            </div>
            </div>
            <div class="dropdown-divider"></div>









           <h5 class="espasamento2">Relatorio por entervalo de datas </h5>

            <div class="row  espasamento2">
                <div class="col-sm text-center">
                    <button class="btn btn-primary  espasamento" data-toggle="collapse" data-target="#area">relatorio  de ganhos</button>

                    <div class="collapse  text-center" id="area">
                        <p class="btn btn-outline-success espasamento">Escoha o intervalo das datas para calcular os ganhos</p>
                        <form method="get" >
                            <label for id="datainicio"> selecione a primeira data</label>
                            <input type="date" name="datainicio" autofocus id="datainicio">


                            <label for  class="espasamento" id="datafim">Selecione a segunda data</label>
                            <input type="date" name="datafim" autofocus id="datafim">


                            <button type="submit" class="btn btn-success espasamento">Enviar dados</button>



                        </form>
                        <div class="dropdown-divider"></div>

                    </div>
                </div>

                <div class="col-sm text-center">
                    <button class="btn btn-primary espasamento " data-toggle="collapse" data-target="#area1">relatorio  de Gastos</button>

                    <div class="collapse  text-center" id="area1">
                        <p class="btn btn-outline-success espasamento">Escoha o intervalo das datas para calcular os gastos</p>
                        <form method="get" >
                            <label for id="datainicio"> selecione a primeira data</label>
                            <input type="date" name="datainiciog" autofocus id="datainicio">


                            <label for  class="espasamento" id="datafim">Selecione a segunda data</label>
                            <input type="date" name="datafimg" autofocus id="datafim">


                            <button type="submit" class="btn btn-success espasamento">Enviar dados</button>


                        </form>
                        <div class="dropdown-divider"></div>


                    </div>

                </div>

                <div class="col-sm text-center">
                    <button class="btn btn-primary espasamento " data-toggle="collapse" data-target="#area2">relatorio  do Valor Liquido</button>

                    <div class="collapse  text-center" id="area2">
                        <p class="btn btn-outline-success espasamento">Escoha o intervalo das datas para calcular os ganhos liquidos</p>
                        <form method="get" >
                            <label for id="datainicio"> selecione a primeira data</label>
                            <input type="date" name="datainiciol" autofocus id="datainicio">


                            <label for  class="espasamento" id="datafim">Selecione a segunda data</label>
                            <input type="date" name="datafiml" autofocus id="datafim">


                            <button type="submit" class="btn btn-success espasamento">Enviar dados</button>


                        </form>
                        <div class="dropdown-divider"></div>


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
