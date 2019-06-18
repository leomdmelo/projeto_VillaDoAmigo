<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gerencia - Villa Do Amigo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styleI.css" />
</head>

<body>
    <?php
    include('include/cabecalho.php');
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        echo('<script>window.alert("Ops ... Você precisa estar logado para isso!");window.location="acesso.php";</script>');
    }
    else{
    ?>
    <div class="backBody">
        <div class="container">
            <?php
            $sql="select * from usuario where login='$logado'";
            $query = $mysqli->query($sql);
            while($dados = $query->fetch_object()){
                $tipo = $dados->tipo;
            }
            if($tipo == 1){
                echo('<script>window.alert("Voce nao possui autorizacao para acessar essa pagina.");window.location="index.php";</script>');
            }
            else{       
        ?>

            <div class="titulo">Administrativo</div>
            <div class="opcoes">
                <a href="adm_usuarios.php"><div class="card"><img src="icons/user.png"/><p>Usuarios</p></div></a>
                <a href="adm_animal.php"><div class="card"><img src="icons/animais.png"/><p>Animais</p></div></a>
                <a href="adm_parceiros.php"><div class="card"><img src="icons/email.png"/><p>Parceiros</p></div></a>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
    <script src="main.js"></script>
    <script src="app.js"></script>
</body>

</html>