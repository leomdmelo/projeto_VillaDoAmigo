<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Villa Do Amigo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styleL.css" />
</head>

<body>
    <?php
        include('include/cabecalho.php');
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    ?>
    <div class="backBody">
        <div class="container">
            <h1>Area de acesso</h1>
            <form name="login" id="login" class="hide" mothod="GET" action="#">
                <div>
                    <p>Você está a um passo de acessar sua conta!</p>
                    <div>
                        <p>Seu Login</p>
                        <input type="text" name="login" />
                    </div>
                    <div>
                        <p>Sua senha</p>
                        <input type="password" name="senha" />
                        
                    </div>
                    <div class="acoes">
                        <div class="cadastrar">
                            Ainda sem uma conta?<br/>
                            <a href="cadastrar.php">
                                <div>
                                    Cadastre-se
                                </div>
                            </a>
                        </div>
                        <div class="logar">
                            <button type="submit" value="entrar" name="entrar">Entrar</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php
                if($_GET){
                    $u = $_GET["login"];
                    $s = base64_encode($_GET["senha"]);


                    if(empty($u) OR empty($s)){
                      echo('<script>window.alert("Preencha os campos para fazer Login!");window.location="acesso.php";</script>');
                    }
                    else{
                      $query=$mysqli->query("select * from usuario where login='$u' and senha = '$s'");
                      if(mysqli_num_rows($query) > 0 )
                      {
                        $_SESSION['login'] = $u;
                        $_SESSION['senha'] = $s;

                        echo('<script>window.alert("Seja bem vindo!");window.location="index.php";</script>');
                      }
                      else{

                          unset ($_SESSION['login']);
                          unset ($_SESSION['senha']);

                          echo('<script>window.alert("Usuario ou senha incorreto(s)!");window.location="acesso.php";</script>');
                      }
                    }
                  }
            ?>
        </div>
    </div>
            <?php
                include('include/rodape.php');
                }
                else{
                    echo('<script>window.alert("Ops ... Você já está logado!");window.location="index.php";</script>');
                }
            ?>
    <script src="main.js"></script>
</body>

</html>