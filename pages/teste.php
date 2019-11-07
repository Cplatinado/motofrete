<form method="post">
    <input type="week" name="semana">
    <input type="date" name="mes">
    <button type="submit" value="enviar">enviar</button>
</form>

<?php

require_once  "classes/motoboy.class.php";
$motoboy = new motoboy();
$bairro  = "libra";
$valor = $motoboy->valorbairro($bairro);


