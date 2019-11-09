<?php
session_start();

require_once "classes/motoboy.class.php";
$motoboy = new  motoboy();
$id_usuario = $_SESSION['login'];

$data = date("Y-m-d");

$valor = $motoboy->getvalor($id_usuario,$data);

$valorR = $valor['receita'];
$valorD = $valor['debito'];
$valor2 = $valorR - $valorD;
$motoboy->setliquido($id_usuario,$data, $valor2);

date_default_timezone_set('America/Sao_Paulo');
