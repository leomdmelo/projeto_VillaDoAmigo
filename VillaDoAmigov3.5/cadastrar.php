<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro - Villa Do Amigo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styleC.css" />
</head>

<body>
    <?php
    include('include/cabecalho.php');
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    ?>
    
    <div class="backBody">
        <div class="container">
            <h1>Area de Cadastro</h1>
            <form name="cadastro" id="cadastro" method='POST' action='#'>
                <div name="area" class="show" id="0">
                    <p>Preencha com seus dados abaixo</p>
                    <div>
                        <p>Seu Login</p>
                        <input type="text" id="login" name="login" onblur="ajax('1|'+this.value,'verificarDadosUsuario', '', 'verificarDadosUsuario');"required/>
                        <span id="alertUsuario"></span>
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
                        <span id="alertCPF"></span>
                    </div>
                    <div class="progresso">
                        <ul>
                            <li class="atual"></li>
                            <li class=""></li>
                            <li class=" "></li>
                        </ul>
                    </div>
                    <div class="acoes">
                        <div class="cancelar">
                            <a href="acesso.php"><div>Cancelar</div></a>
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
                        <input type="text" id="cep" name="cep" onblur="ajax(this.value, 'verificarCEP', '','recuperarEndereco');" />
                        <span id="alertCEP"></span>
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
                            <li class=" "></li>
                        </ul>
                    </div>
                    <div class="acoes">
                        <div class="voltar"onclick="retrocederEtapa();">Voltar</div>
                        <div class="concluir ">
                            <input type="button" value="Concluir" name="concluir" onclick="postCadastro();"/>
                        </div>
                    </div>
                </div>
                <div class="hide" id="2">
                <p>Tudo Pronto!</p>
                    <div>

                        <h1>Cadastramos<br/> você com<br//> sucesso!</h1>
                        <h3>Você está sendo redirecionado</h3>
                        <a href="acesso.php">
                            <h4>Caso isso não aconteça, clique aqui!</h4>
                        </a>
                        <h2 class="alert">&#x2714</h2>

                    </div>
                    <div class="progresso">
                        <ul>
                            <li class=" "></li>
                            <li class=" "></li>
                            <li class="atual"></li>
                        </ul>
                    </div>
                    <div class="acoes">
                        <div class="sucess">
                            <input type="button" value=":)" />
                        </div>
                    </div>
                </div>
                <div class="hide" id="3">
                <p>Algo deu errado..</p>
                    <div>
                        <h1>Infelizmente houve<br/> um erro ao<br//> cadastrar você</h1>
                        <h3>Por favor clique em<br/> "Tentar novamente"</h3>
                        <h4>Seus dados estão preservados.<br/> então não precisa preencher tudo novamente!</h4>
                        <p>Motivo do erro:</p>
                        <div class="relatorio" id="relatorio"></div>
                    </div>
                    <div class="progresso">
                        <ul>
                            <li class=" "></li>
                            <li class=" "></li>
                            <li class="atual"></li>
                        </ul>
                    </div>
                    <div class="acoes">
                        <div class="failure">
                            <input type="button" value="Tentar Novamente" onclick="retrocederEtapa();" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include('include/rodape.php');
    }
    else{
        echo('<script>window.alert("Ops ... Você não pode se cadastrar enquanto está logado!");window.location="index.php";</script>');
    }
    ?>
    <script src="ajax.js"></script>
    <script src="app.js"></script>
</body>

</html>