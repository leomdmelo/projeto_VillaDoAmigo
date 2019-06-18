<?php
  include ('include/abrir_banco.php');
  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    echo('<script>window.alert("Ops ... Você precisa estar logado para isso!");window.location="acesso.php";</script>');
  }
  else{
    $id_animal = $_GET['idanimal'];
    $login_doador = $_GET['login_doador'];
    $logado = $_SESSION['login'];

    $sql = "insert into solicitacoes (id_animal, login_doador, solicitante) values ('$id_animal', '$login_doador', '$logado')";
    $query = $mysqli -> query($sql);

    echo('<script>window.alert("Solicitacao enviada ;) ");window.location="adote-um-amigo.php";</script>');
  }
?>
