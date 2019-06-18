<?php
  include ('include/abrir_banco.php');
  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    echo('<script>window.alert("Ops ... Você precisa estar logado para isso!");window.location="acesso.php";</script>');
  }
  else{
    $id_animal = $_GET['idanimal'];

    $sql = ("delete from animal where idanimal='$id_animal';");
    $query = $mysqli -> query($sql);

    echo('<script>window.alert("Animal removido ");window.location="meus_animais.php";</script>');
  }
?>
