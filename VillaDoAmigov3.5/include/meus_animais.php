<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Minha Conta - Villa Do Amigo</title>
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
        echo('<div class="backBody">
        <div class="container">
            <h1>Adicionar animal</h1>
            <form name="cadastro" id="cadastro" method="POST" action="#">
                <div name="area" class="show" id="0">
                    <p>Cadastre um animal para ser doado!</p>
                    <div>
                        <p>Nome do animal</p>
                        <input type="text" id="nome" name="nome" required/>
                    </div>
                    <div>
                        <p>Confirme sua senha</p>
                        <input type="password" id="cSenha" name="csenha" onblur="confirmarSenha();" required/>
                    </div>
                    <div>
                        <p>Seu nome</p>
                        <input type="text" id="nome" name="nome" required/>
                    </div>
                    <div>
                        <p>Seu Sobrenome</p>
                        <input type="text" id="sobrenome" name="sobrenome" />
                    </div>
                    <div>
                        <p>CPF</p>
                        <input type="text" maxlength="11" id="cpf" name="cpf" onblur="verificarCPFv2(this.value);" required/>
                    </div>
                    <div class="progresso">
                        <ul>
                            <li class="atual"></li>
                            <li class=""></li>
                        </ul>
                    </div>
                    <div class="acoes">
                        <div class="cancelar">
                            <a href="excluir.php"><div>Excluir Contato</div></a>
                        </div>
                        <div class="proximo">
                            <input type="button" value="Proximo" onclick="proximaEtapa();" />
                        </div>
                    </div>
                </div>
                <div name="area" class="hide" id="1">
                    <p>Estamos quase lá!</p>
                    <div>
                        <p>Seu E-mail</p>
                        <input type="email" id="email" name="email"/>
                    </div>
                    <div>
                        <div class="telFixo">
                            <p>Telefone Fixo</p>
                            <input type="text" id="telFixo" name="telfixo" />
                        </div>

                        <div class="telMovel">
                            <p>Telefone Móvel</p>
                            <input type="text" id="telMovel" name="telmovel" />
                        </div>
                    </div>
                    <div>
                        <p>CEP</p>
                        <input type="text" id="cep" name="cep" />
                    </div>
                    <div>
                        <p>Bairro</p>
                        <input type="text" id="bairro" name="bairro" />
                    </div>
                    <div>
                        <p>Municipio</p>
                        <input type="text" id="municipio" name="municipio" />
                    </div>
                    <div>
                        <p>Estado</p>
                        <input type="text" id="estado" name="estado" />
                    </div>
                    <div class="progresso">
                        <ul>
                            <li class=""></li>
                            <li class="atual"></li>
                        </ul>
                    </div>
                    <div class="acoes">
                        <div class="voltar">
                            <input type="button" value="Anterior" onclick="retrocederEtapa();" />
                        </div>
                        <div class=" concluir ">
                            <input type="submit" value="Atualizar" name="atualizar"/>
                        </div>
                    </div>
                </div>
                ');
                    if($_POST){
                        
                        $senha= $_POST['senha'];
                        $csenha= $_POST['csenha'];
                        $nome= $_POST['nome'];
                        $sobrenome= $_POST['sobrenome'];
                        $cpf= $_POST['cpf'];
                        $email= $_POST['email'];
                        $telfixo= $_POST['telfixo'];
                        $telmovel= $_POST['telmovel'];
                        $cep= $_POST['cep'];
                        $bairro= $_POST['bairro'];
                        $cidade= $_POST['municipio'];
                        $estado= $_POST['estado'];

                        if(empty($senha) OR empty($csenha) OR empty($nome) OR empty($sobrenome) OR empty($cpf) OR empty($email) OR empty($telfixo) OR empty($telmovel) OR empty($cep) OR empty($bairro) OR empty($cidade) OR empty($estado)){
                            echo('<script>window.alert("Preencha todos os campos para que seu cadastro seja feito!");window.location="cadastrar.php";</script>');
                          }
                        else{
                            $sql_cpf=("select * from usuario where cpf = '$cpf';");
                            $query2=$mysqli->query($sql_cpf);
                            if(mysqli_num_rows($query2) > 0 ){
                                echo('<script>window.alert("Este CPF já está sendo utilizado por outra pessoa!");window.location="perfil.php";</script>');
                              }
                              elseif($senha != $csenha){
                                echo('<script>window.alert("a senha dos campos não correspondem!");window.location="perfil.php";</script>');
                              }
                              else{
                                $senha_codificada = base64_encode($senha);
                                $sql = "update usuario set senha = '$senha_codificada', nome = '$nome' , sobrenome= '$sobrenome' , cpf= '$cpf' , email= '$email' , telefone= '$telfixo' , celular= '$telmovel' , cep= '$cep' , bairro= '$bairro' , cidade= '$cidade' , estado= '$estado' where login = '$logado'";
                                $query=$mysqli->query($sql);
                                echo('<script>window.alert("Informações alteradas com sucesso!");window.location="index.php";</script>');
                                //echo($sql);

                              }
                        }
                    }
                ?>
            </form>
        </div>
    </div>
    <?php
    include('include/rodape.php');
    }
    ?>
    <script src="app.js "></script>
</body>

</html>