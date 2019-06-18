<?php
  include ('include/abrir_banco.php');
  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    echo('<script>window.alert("Ops ... Você precisa estar logado para isso!");window.location="acesso.php";</script>');
  }
  else{
    $id_solic = $_GET['id_solic'];

    $sql = ("delete from solicitacoes where id_solic='$id_solic';");
    $query = $mysqli -> query($sql);

    echo('<script>window.alert("Solicitacao removido ");window.location="meus_animais.php";</script>');
  }
?>
