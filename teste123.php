<form method="POST">
    <input type="date" name="datai">
    <input type="date" name="dataf">
    <input type="submit" value="enviar">
</form>

<?php
require_once  "classes/motoboy.class.php";
$data = date("Y-m-d");
$motoboy = new motoboy();
$bairo  = "libra";
$datai = $_POST['datai'];
$dataf = $_POST['dataf'];

echo  $datai."  ".$dataf."  ";
$receita = 8;
$idusuario = 39;
$teste = $motoboy->getTdbairro();

echo $teste['valor'];

/*
$valordb  = $motoboy->getvalor($idusuario, $data);
$valordb = $valordb['receita'] + $receita;
echo "<br>";
echo $valordb;
echo "<br>";
echo $receita;
*/
