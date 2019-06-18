<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meus Animais - Villa Do Amigo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styleC.css" />
</head>

<body>
    <?php
    include('include/cabecalho.php');
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        echo('<script>window.alert("Ops ... Você precisa estar logado para isso!");window.location="acesso.php";</script>');
    }
    else{
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
        <div class="backBody">
        <div class="container">
            <div class="opcao">
            
            <?php
                $executa = "select * from parceiro order by id_parceiro desc";
                if($query = $mysqli->query($executa)){
                echo "<div class='cadastrado'>
                <h3>Parceiros</h3>
                <table>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th></th>
                </tr>";
                while($dados = $query->fetch_object()){
                    echo "<tr>";
                    echo "<td>$dados->nome_parceiro</td>";
                    echo "<td> $dados->email_parceiro</td>";
                    echo "<td class='remover'><a href='adm_excluir_parceiro.php?id_parceiro=$dados->id_parceiro' role='button'>Remover</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                $query->free();
            }
            ?>
            </div>
        </div>
    </div>
    <br><br>
    <?php
            }
        }
    ?>
    <script src="app.js "></script>
</body>

</html>