<?php
  include ('include/abrir_banco.php');
    $nome_parceiro = "";
    $email_parceiro = "";
    
    $nome_parceiro = $_POST['nome_parceiro'];
    $email_parceiro = $_POST['email_parceiro'];

    if(empty($nome_parceiro) OR empty($email_parceiro)){
        echo('<script>window.alert("Preencha os campos para entrarmos em contato com voce");window.location="javascript:history.back()";</script>');
    }
    else{
        $sql = "insert into parceiros (nome_parceiro, email_parceiro) values ('$nome_parceiro', '$email_parceiro')";
        $query = $mysqli -> query($sql);

        echo('<script>window.alert("Aguarde entraremos em contato com você");window.location="javascript:history.back()";</script>');
    }
?>