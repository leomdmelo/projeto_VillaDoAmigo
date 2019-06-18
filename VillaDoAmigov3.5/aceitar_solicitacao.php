<?php
  include ('include/abrir_banco.php');
  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    echo('<script>window.alert("Ops ... Você precisa estar logado para isso!");window.location="acesso.php";</script>');
  }
  else{
    $id_solic = $_GET['id_solic'];
    $id_animal = $_GET['id_animal'];
    $solicitante = "";

    $busca = ("select * from solicitacoes where id_solic='$id_solic'");
    $query = $mysqli->query($busca);
    while($dados = $query->fetch_object()){
        $solicitante = $dados->solicitante;
    }

    $update = "update animal set adotante = '$solicitante' where idanimal = '$id_animal'";
    $query = $mysqli->query($update);

    $delete = "delete from solicitacoes where id_animal = '$id_animal'";
    $query = $mysqli->query($delete);
    echo('<script>window.alert("Adocao confirmada!");window.location="meus_animais.php";</script>');
  }
?>
