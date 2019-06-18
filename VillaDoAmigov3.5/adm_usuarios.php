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
        <h1>Novo Administrador</h1>
            <form name="cadastro" id="cadastrO"  class="cadastro" method='POST' action='#'>
                <div name="area" class="show" id="0">
                    <p>Preencha com dados do novo administrador:</p>
                    <div>
                        <p>Seu Login</p>
                        <input type="text" id="login" name="login" required/>
                    </div>
                    <div>
                        <p>Sua senha</p>
                        <input type="password" id="senha" name="senha" required/>
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
                            
                        </div>
                        <div class="proximo" onclick="proximaEtapa();">Proximo</div>
                    </div>
                </div>
                <div name="area" class="hide" id="1">
                    <p>Estamos quase lá!</p>
                    <div>
                        <p>Seu E-mail</p>
                        <input type="email" id="email" name="email" required/>
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
                        <input type="text" id="bairro" name="bairro" required/>
                    </div>
                    <div>
                        <p>Municipio</p>
                        <input type="text" id="municipio" name="municipio" required/>
                    </div>
                    <div>
                        <p>Estado</p>
                        <input type="text" id="estado" name="estado" required/>
                    </div>
                    <div class="progresso">
                        <ul>
                            <li class=""></li>
                            <li class="atual"></li>
                        </ul>
                    </div>
                    <div class="acoes">
                    <div class="voltar"onclick="retrocederEtapa();">Voltar</div>
                        <div class=" concluir ">
                            <input type="submit" value="Concluir" name="concluir"/>
                        </div>
                    </div>
                </div>
                <?php
                    if($_POST){
                        $login= $_POST['login'];
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

                        if(empty($login) OR empty($senha) OR empty($csenha) OR empty($nome) OR empty($sobrenome) OR empty($cpf) OR empty($email) OR empty($telfixo) OR empty($telmovel) OR empty($cep) OR empty($bairro) OR empty($cidade) OR empty($estado)){
                            echo('<script>window.alert("Preencha todos os campos para que o cadastro do novo administrador seja realizado!");window.location="adm_usuarios.php";</script>');
                          }
                        else{
                            $sql_login=("select * from usuario where login = '$login';");
                            $query1=$mysqli->query($sql_login);
                            $sql_cpf=("select * from usuario where cpf = '$cpf';");
                            $query2=$mysqli->query($sql_cpf);
                            if(mysqli_num_rows($query1) > 0 ){
                                echo('<script>window.alert("Este Usuario já está sendo utilizado tente outro!");window.location="adm_usuarios.php";</script>');
                              }
                              elseif(mysqli_num_rows($query2) > 0 ){
                                echo('<script>window.alert("Este CPF já está sendo utilizado tente outro!");window.location="adm_usuarios.php";</script>');
                              }
                              elseif($senha != $csenha){
                                echo('<script>window.alert("a senha dos campos não correspondem!");window.location="adm_usuarios.php";</script>');
                              }
                              else{
                                $senha_codificada = base64_encode($senha);
                                $sql = "INSERT INTO usuario (login, senha, tipo,
                                 nome, sobrenome, cpf, 
                                 telefone, celular, email, 
                                 cep, bairro, cidade, estado) VALUES ('$login', '$senha_codificada', '0',
                                 '$nome', '$sobrenome', '$cpf',
                                 '$telfixo', '$telmovel', '$email',
                                 '$cep', '$bairro', '$cidade', '$estado')";                                
                                if($query=$mysqli->query($sql)){
                                echo('<script>window.alert("Administrador cadastrado com sucesso!");window.location="adm_usuarios.php";</script>');
                                } else {
                                    echo('<script>window.alert("Falha ao cadastrar!");</script>');
                                    
                                }
                              }
                        }
                    }
                ?>
            </form>
            
            <?php
                $executa = "select * from usuario where tipo = '0'";
                $query = $mysqli->query($executa);
                echo "<div class='cadastrado'><h3>Administradores</h3>
                <table>
                <tr>
                    <th>Login</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th></th>
                </tr>";
                while($dados = $query->fetch_object()){
                    echo "<tr>";
                    echo "<td>$dados->login</td>";
                    echo "<td>$dados->nome</td>";
                    echo "<td>$dados->sobrenome</td>";

                    if($dados->login != $logado){
                        echo "<td><a href='adm_excluir_usuario.php?idUsuario=$dados->idUsuario' role='button'>Excluir</a>  </td>";
                    }
                    else{
                    echo "<td></td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                $query->free();
            
                $executa = "select * from usuario where tipo = '1'  order by idUsuario limit 15";
                $query = $mysqli->query($executa);

                echo '
                <div class="pesquisa">
                <h3>Usuarios comuns</h3>
                <form method="GET" action="#" name="pesquisar">
                    <p>Pesquisar Usuario</p>
                        <input type="text" class="search" id="nome" name="pesquisa">
                        <input type="submit" class="inputSearch" value="Pesquisar" name="pesquisar"/>
                </form>
                </div>';
                if(isset($_GET['pesquisar'])){
                    $pesquisar = $_GET['pesquisa'];
                    if(empty($pesquisar)){
                      echo('<script>window.alert("Digite algo para pesquisar!");window.location="adm_usuarios.php";</script>');
                    }
                    else{
                    $executa = ("select * from usuario where tipo = '1' AND nome like '%$pesquisar%' or sobrenome like '%$pesquisar%' or login like '%$pesquisar%' or cpf like '%$pesquisar%'");
                    $query = $mysqli->query($executa);
                    echo "<div class='cadastrado'><h3>Usuarios comuns</h3>
                    <table>
                    <tr>
                        <th>Login</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th></th>
                    </tr>";
                    while($dados = $query->fetch_object()){
                        echo "<tr>";
                        echo "<td>$dados->login</td>";
                        echo "<td>$dados->nome</td>";
                        echo "<td>$dados->sobrenome</td>";

                        if($dados->login != $logado){
                            echo "<td class='remover'><a href='adm_excluir_usuario.php?idUsuario=$dados->idUsuario' role='button'>Excluir</a></td>";
                        }
                        else{
                        echo "<td></td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                  $query->free();
                  echo"<a href='adm_usuarios.php' role='button'>Limpar Pesquisa</a>";
                  }
                }

                else{
                    echo "<div class='cadastrado'>
                    <table>
                    <tr>
                        <th>Login</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th></th>
                    </tr>";
                    while($dados = $query->fetch_object()){
                        echo "<tr>";
                        echo "<td>$dados->login</td>";
                        echo "<td>$dados->nome</td>";
                        echo "<td>$dados->sobrenome</td>";

                        if($dados->login != $logado){
                            echo "<td class='remover'><a href='adm_excluir_usuario.php?idUsuario=$dados->idUsuario' role='button'>Excluir</a>  </td>";
                        }
                        else{
                        echo "<td></td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                    $query->free();
                }
            ?>
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