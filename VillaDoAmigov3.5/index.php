<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home - Villa Do Amigo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styleI.css" />
</head>

<body>
    <?php
    include('include/cabecalho.php');
    ?>
    <div class="backCall" onmouseover="pararTimer();" onmouseout="continuarTimer();">
        <div class="container">
            <div class="content show">
                <p>Respeito e Proteção ao animal</p>
            </div>
            <div class="content">
                <p>Adote hoje mesmo!</p>
                <input type="button" value="Adotar!" />
            </div>
            <div class="content">
                <p>Veja alguns depoimentos</p>
            </div>
            <!--<div class="controladores">
                <input type="button" class="controlador ativo" />
                <input type="button" class="controlador" />
                <input type="button" class="controlador" />-->
            </div>
        </div>
    </div>
    <div class="backBody">
        <div class="container">
            <p class="call">Alguns amiguinhos que encontraram uma familia</p>
            <div>
                <?php 
                $sql = "SELECT nome, foto FROM animal WHERE adotante IS NOT NULL LIMIT 4";
                if($query = $mysqli->query($sql)){
                    while($row = $query->fetch_array()){
                        echo '<div><img src="'.$row['foto'].'"/><p>'.$row['nome'].'</p></div>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="backBody alt">
        <div class="container">
            <p class="call">Outros que ainda podem encontrar</p>
            <div>
            <?php
                if(isset($_SESSION['login'])){
                $login = $_SESSION['login'];
                }else{
                    $login = "";
                }
                $sql = "SELECT nome, foto, idanimal, doador FROM animal WHERE adotante IS NULL LIMIT 8";
            if($query = $mysqli->query($sql)){
                    $i=0;
                    while($row = $query->fetch_array()){
                        $flag=false;
                        if($i%4 == 0){
                            echo "</div><div>";
                        }
                        echo '<div><img src="'.$row['foto'].'"/>';
                        $sqlUser = "SELECT id_animal FROM solicitacoes WHERE solicitante = '$login'";
                        if($queryUser = $mysqli->query($sqlUser)){
                            while($rowUser = $queryUser->fetch_object()){
                                if($rowUser->id_animal == $row['idanimal']){
                                    echo'<div class="adotar">Solicitado</div><p>'.$row['nome'].'</p></div>';
                                    $flag=true;
                                }
                            }
                        }if($flag==false){
                        echo'<a href="solicitacao.php?idanimal='.$row['idanimal'].'&&login_doador='.$row['doador'].'"">'.
                            '<div class="adotar">Adotar</div></a><p>'.$row['nome'].'</p></div>';
                        }
                        $i++;
                    }
                }
                ?>
                <!--<div><img src="imagens/animais/5c904fd4df29c937ac1c86d3cfef3c41.jpg"/>
                <a href="#"><div class="adotar">Adotar</div></a><p>Lilica</p></div>-->
           
            </div>
            <div class="verMais"><a href="adote-um-amigo.php"><div>Ver mais</div></a></div>
        </div>
</div>
    </div>
    <?php
        include('include/rodape.php');
    ?>
    <script src="main.js"></script>
    <script src="app.js"></script>
</body>

</html>