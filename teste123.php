<form method="POST">
    <input type="date" name="datai">
    <input type="date" name="dataf">
    <input type="submit" value="enviar">
</form>
<a href="teste.php?id=4">123</a>
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

$receita = number_format($receita, 2,",", " ");
echo $receita;



/*
$valordb  = $motoboy->getvalor($idusuario, $data);
$valordb = $valordb['receita'] + $receita;
echo "<br>";
echo $valordb;
echo "<br>";
echo $receita;
*/
