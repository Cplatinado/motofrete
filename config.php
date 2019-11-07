<?php
session_start();

require_once "classes/motoboy.class.php";
$motoboy = new  motoboy();
$id_usuario = $_SESSION['login'];

$data = date("Y-m-d");


date_default_timezone_set('America/Sao_Paulo');
