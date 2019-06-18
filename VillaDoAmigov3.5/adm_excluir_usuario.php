<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Excluir minha conta - Villa Do Amigo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styleC.css" />
</head>

<body>
    <?php
    include('include/cabecalho.php');
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        echo('<script>window.alert("Ops ... Você precisa estar logado para isso!");window.location="index.php";</script>');
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
        elseif(empty($logado)){
            echo('<script>window.alert("Voce nao possui autorizacao para acessar essa pagina.");window.location="index.php";</script>');
        }
        else{
            echo('<div class="backBody">
                <div class="container">
                    <h1>Deseja excluir sua conta?</h1>
                    <form name="cadastro" id="cadastro" method="POST" action="#">
                        <div name="area" class="show" id="0">
                            <p>confirme sua senha para excluir sua conta</p>
                            <div>
                                <p>Sua senha</p>
                                <input type="password" id="senha" name="senha" required/>
                            </div>
                            <div>
                                <p>Confirme sua senha</p>
                                <input type="password" id="cSenha" name="csenha" onblur="confirmarSenha();" required/>
                            </div>
                            <br/>
                            <div class="acoes">
                                <div class="voltar">
                                    <input type="button" value="Cancelar" onclick="retrocederEtapa();" />
                                </div>
                                <div class=" concluir ">
                                    <input type="submit" value="Excluir" name="excluir"/>
                                </div>
                            </div>
                        </div>
                        ');
                            if($_POST){
                                
                                $senha = $_POST['senha'];
                                $csenha = $_POST['csenha'];
                                $idUsuario = $_GET['idUsuario'];
                                $executa = ("select * from usuario where login = '$logado';");
                                $query = $mysqli->query($executa);
                                while ($dados = $query->fetch_object()) {
                                    $nome =  $dados->nome;
                                    $senha_codificada =  $dados->senha;
                                    $senha_deco=base64_decode($senha_codificada);
                                }
                                

                                if(empty($senha) OR empty($csenha)){
                                    echo('<script>window.alert("Preencha todos os campos para que a exclusão da sua conta seja feita!");window.location="adm_excluir_usuario.php";</script>');
                                }
                                elseif($senha != $csenha){
                                    echo('<script>window.alert("As senhas não corespondem!");window.location="adm_excluir_usuario.php";</script>');
                                }
                                elseif($senha != $senha_deco){
                                    echo('<script>window.alert("Senha errada, tente novamente!");window.location="adm_excluir_usuario.php";</script>');
                                }
                                else{
                                    $delete = ("delete from usuario where idUsuario = '$idUsuario';");
                                    $query = $mysqli->query($delete);
                                    echo('<script>window.alert("Usuario removido");window.location="adm_usuarios.php";</script>');
                                }
                            }
                        ?>
                    </form>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <script src="app.js "></script>
</body>

</html>