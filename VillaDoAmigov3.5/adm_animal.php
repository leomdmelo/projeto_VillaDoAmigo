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
            <div class="opcoes">
            
            <?php
                $executa = "select * from animal where adotante is null order by idanimal desc limit 30";
                $query = $mysqli->query($executa);
                echo "<div class='cadastrado'>
                <h3>Animais Não adotados</h3>
                <table>
                <tr>
                    <th>Especie</th>
                    <th>Nome</th>
                    <th>Doador</th>
                    <th></th>
                </tr>";
                while($dados = $query->fetch_object()){
                    echo "<tr>";
                    echo "<td>$dados->especie</td>";
                    echo "<td>$dados->nome</td>";
                    echo "<td>$dados->doador</td>";
                    echo "<td class='remover'><a href='adm_excluir_animal.php?idanimal=$dados->idanimal' role='button'>Excluir</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                $query->free();


                $executa = "select * from animal where adotante is not null order by idanimal desc limit 30";
                $query = $mysqli->query($executa);
                echo "<div class='cadastrado'>
                <h3>Animais já adotados</h3>
                <table>
                <tr>
                    <th>Especie</th>
                    <th>Nome</th>
                    <th>Doador</th>
                </tr>";
                while($dados = $query->fetch_object()){
                    echo "<tr>";
                    echo "<td>$dados->especie</td>";
                    echo "<td>$dados->nome</td>";
                    echo "<td>$dados->doador</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                $query->free();
            ?>
        </div>
            </div>
            </div>
    <br><br>
    <?php
            }
        }
    ?>
    <script src="app.js"></script>
</body>

</html>