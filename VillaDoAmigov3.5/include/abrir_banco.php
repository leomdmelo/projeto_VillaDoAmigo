<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'villadoamigo';


//Faz a conex�o com o banco de dados
$mysqli = new mysqli
($servidor, $usuario, $senha, $banco);


//verifica se esta correta a conex�o
if (mysqli_connect_errno())
	trigger_error(mysqli_connect_error());


?>
