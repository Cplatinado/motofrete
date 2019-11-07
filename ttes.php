<?php

require_once "classes/usuario.class.php";
$usuario = new usuario();
$email = "te22ste@test222e.com";
$senha = "dasd";
$senha2 = "dasd";
$nome = "'1234dasd'";
$nascimento = '05/16/1994';
$rua = "teste";
$numero = 123;
$telefone = 456;
$nivel = 2;
$novoemail = "23454@.com";
$id = $usuario->getid($email);
echo ($id);

$usuario->deletar($email);


#$usuario->teste($numero);
