<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adote um amigo - Villa do Amigo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styleA.css" />
</head>

<body>
    <?php
		include('include/cabecalho.php');
	?>
    <div class="backBody">
        <div class="container">
            <div class="titulo">Adote um amigo</div>

            <?php
                
                $sql = ("select * from animal where adotante is null order by idanimal desc");
                $query = $mysqli->query($sql);
                while($dados = $query->fetch_object()){
                    echo('<div class="card">
                        <div class="foto">
                            <div class="setaEsquerda"></div>
                            <div class="setaDireita"></div>
                            <img name="foto" src="'.$dados->foto.'" />
                            
                        </div>
                        <div class="informacoes">
                            <div class="nome"><b>'.$dados->nome.'</b></div>
                                <br/>');


                    $sql2 = ("select * from solicitacoes where id_animal = '$dados->idanimal'");
                    $query2 = $mysqli->query($sql2);
                    $solicitante = '';
                    while($dados2 = $query2->fetch_object()){
                        $solicitante = $dados2->solicitante;
                    }
                    if($logado != ''){
                        if($solicitante == $logado){
                            echo('<b class="adotado"><div class="solicitado">Solicitação Enviada</div></b>');
                        }
                        else{
                            echo('<a href="solicitacao.php?idanimal='.$dados->idanimal.'&&login_doador='.$dados->doador.'" class="adotado"><div class="solicitar"><b>Quero Adotar</b></div></a>');
                        }
                    }
                    else{
                        echo('<a href="acesso.php" class="adotado"><div class="solicitar"><b>Quero Adotar</b></div></a>');
                    }


                    echo('<div class="info"><b>Especie: '.$dados->especie.'</b></div>
                    <div class="info"><b>Sexo: '.$dados->sexo.'</b></div>
                    <div class="info"><b>Raça: '.$dados->raca.'</b></div>
                    <div class="info"><b>Porte: '.$dados->porte.'</b></div>
                    <div class="info"><b>Dócil: '.$dados->docil.'</b></div>
                    <div class="info"><b>Vacinado: '.$dados->vacinado.'</b></div>
                    <div class="info"><b>Castrado: '.$dados->castrado.'</b></div>
                    <div class="info"><b>Peso (KG): '.$dados->peso.'</b></div>
                    <div class="info"><b>Idade: '.$dados->idade.'</b></div>
                    <div class="info"><b>Pelagem: '.$dados->pelagem.'</b></div>');
                    $executa = ("select * from usuario where login = '$dados->doador'");
                    $query1 = $mysqli->query($executa);
                    while($dados1 = $query1->fetch_object()){
                        $cidade = $dados1->cidade;
                        $estado = $dados1->estado;
                    }
                    
                    echo("<div class='info'><b>Onde se encontra: $cidade - $estado</b></div>
                            </div>
                        </div>
                    ");
                }
                ?>

        </div>
    </div>
    <br><br>
    <?php
		include('include/rodape.php');
	?>
        <script src="main.js"></script>
</body>

</html>