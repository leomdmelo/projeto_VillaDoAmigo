<?php
  include ('include/abrir_banco.php');
  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    echo('<script>window.alert("Ops ... Você precisa estar logado para isso!");window.location="acesso.php";</script>');
  }
  else{
    $id_parceiro = $_GET['id_parceiro'];

    $sql = ("delete from parceiro where id_parceiro='$id_parceiro';");
    $query = $mysqli -> query($sql);

    echo('<script>window.alert("parceiro removido ");window.location="adm_parceiros.php";</script>');
  }
?>