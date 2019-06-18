<?php
include('../include/abrir_banco.php');
$dados = explode("|", $_POST['r']);
$verificacao = $dados[0];
$dado = $dados[1];

if($verificacao == 1){
    $sql_login=("select * from usuario where login = '$dado';");
    $query1=$mysqli->query($sql_login);
    if(mysqli_num_rows($query1) > 0 ){
        echo('1');
    }else{
        echo('0');
    }
}
if($verificacao == 2){
    $sql_cpf=("select * from usuario where cpf = '$dado';");
    $query2=$mysqli->query($sql_cpf);

    if(mysqli_num_rows($query2) > 0 ){
        echo('3');
    }else{
        echo('2');
    }
}

?>