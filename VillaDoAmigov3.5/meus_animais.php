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
    ?>
        <div class="backBody">
        <div class="container">
            <h1>Adicionar animal</h1>
            <form enctype="multipart/form-data" name="cadastro" id="cadastrO" class="cadastro" method="POST" action="#">
                <div name="area" class="show" id="0">
                    <p>Cadastre um animal para ser doado!</p>
                    <div>
                        <p>Nome do animal</p>
                        <input type="text" id="nome" name="nome"/>
                    </div>
                    <div>
                        <div class="select">
                            <p>Especie</p>
                            <select name="especie">
                                <option value="Gato">Gato</option> 
                                <option value="Cachorro">Cachorro</option>
                            </select>   
                        </div>

                        <div class="select">
                            <p>Sexo</p>
                            <select name="sexo">
                                <option value="Macho">Macho</option> 
                                <option value="Fêmea">Femea</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <p>Raça</p>
                        <input type="text" id="nome" name="raca"/>
                    </div>
                    <div>
                        <div class="select">
                            <p>Porte</p>
                            <select name="porte">
                                <option value="Pequeno">Pequeno</option> 
                                <option value="Medio">Medio</option>
                                <option value="Grande">Grande</option>
                            </select>
                        </div>
                        <div class="select">
                            <p>Docil</p>
                            <select name="docil">
                                <option value="Sim">Sim</option> 
                                <option value="Não">Nao</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="select">
                            <p>Idade</p>
                            <input type="text" id="telMovel" name="idade" />
                        </div>
                        <div class="select">
                            <p>Peso (KG)</p>
                            <input type="text" id="telMovel" name="peso" />
                        </div>
                    </div>

                    <div class="progresso">
                        <ul>
                            <li class="atual"></li>
                            <li class=""></li>
                        </ul>
                    </div>
                    <div class="acoes">
                        <div class="proximo" onclick="proximaEtapa();">Proximo</div>
                    </div>
                </div>
                <div name="area" class="hide" id="1">
                    <p>Estamos quase lá!</p>
                    <div>
                        <div class="select">
                            <p>Pelagem</p>
                            <select name="pelagem">
                                <option value="Baixo">Baixo</option> 
                                <option value="Medio">Medio</option>
                                <option value="Longo">Longo</option>
                            </select>
                        </div>
                        <div class="select">
                            <p>Vacinado</p>
                            <select name="vacinado">
                                <option value="Sim">Sim</option> 
                                <option value="Não">Nao</option>
                                <option value="Incompleto">Incompleto</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="select">
                            <p>Castrado</p>
                            <select name="castrado">
                                <option value="Sim">Sim</option> 
                                <option value="Não">Nao</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <p>Foto do Animal</p>
                        <input name="arquivo" type="file" />
                    </div>
                    <div class="progresso">
                        <ul>
                            <li class=""></li>
                            <li class="atual"></li>
                        </ul>
                    </div>
                    <div class="acoes">
                        <div class="voltar"onclick="retrocederEtapa();">Voltar</div>
                        <div class="concluir ">
                            <input type="submit" value="Publicar" name="publicar"/>
                        </div>
                    </div>
                </div>
                <?php
                    if($_POST){
                        $nomeanimal= $_POST['nome'];
                        $especie= $_POST['especie'];
                        $sexo= $_POST['sexo'];
                        $raca= $_POST['raca'];
                        $porte= $_POST['porte'];
                        $docil= $_POST['docil'];
                        $vacinado= $_POST['vacinado'];
                        $peso= $_POST['peso'];
                        $idade= $_POST['idade'];
                        $pelagem= $_POST['pelagem'];
                        $castrado= $_POST['castrado'];
                        var_dump($_FILES);
                        if(empty($nomeanimal) OR empty($especie) OR empty($sexo) OR empty($raca) OR empty($porte) OR empty($docil) OR empty($vacinado) OR empty($peso) OR empty($idade) OR empty($pelagem) OR empty($castrado)){
                            echo('<script>window.alert("Preencha todos os campos para cadastro o animal!");window.location="meus_animais.php";</script>');
                        }
                        if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0){
                    		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
                    		$nome = $_FILES['arquivo']['name'];
                            $extensao = strrchr($nome, '.');
                            $extensao = strtolower($extensao);
                            if(strstr('.jpg;.jpeg;.gif;.png', $extensao)){
                                $imagem = md5(microtime()) . $extensao;
                                $destino = 'imagens/animais/' . $imagem;
                                if( @move_uploaded_file( $arquivo_tmp, $destino  )){
                                    $sql = "insert into animal (doador, nome, especie, sexo, raca, porte, docil, vacinado, peso, idade, pelagem, castrado, foto) values ('$logado','$nomeanimal','$especie','$sexo','$raca','$porte','$docil','$vacinado','$peso','$idade','$pelagem','$castrado','$destino')";
                                    $query=$mysqli->query($sql);
                                    if($query){
                                    echo('<script>window.alert("Animal cadastrado!");window.location="meus_animais.php";</script>');
                                    }
                                    else{
                                    echo('<script>window.alert("Animal não pode ser cadastrado!");window.location="meus_animais.php";</script>');
                                    }
                                }
                            }
                        }
                        
                        else{
                            echo('<script>window.alert("erro no codigo!");window.location="meus_animais.php";</script>');}
                    }
                ?>
            </form>
            
            <?php
                $executa = "select * from animal where doador = '$logado' order by idanimal desc";
                echo "<div class='cadastrado'><h3>Animais Cadastrados</h3>";
                $query = $mysqli->query($executa);
                $i=0;
                $flag=false;
                if(mysqli_num_rows($query)>0){
                echo "<table>
                <tr>
                    <th>Especie</th>
                    <th>Nome</th>
                    <th></th>
                </tr>";
                while($dados = $query->fetch_object()){
                    $i++;
                    $flag=true;
                    echo "<tr>";
                    echo "<td> $dados->especie</td>";
                    echo "<td> $dados->nome</td>";

                    if(empty($dados->adotante)){
                        echo "<td class='remover'><a href='excluir_animal.php?idanimal=$dados->idanimal' role='button'>Remover</a></td>";
                    }
                    else{
                    echo "<td class='adotado'>Adotado!</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } echo "</div>";
            $solicitacoes = "select * from solicitacoes where login_doador = '$logado' order by id_solic desc";
            $query = $mysqli->query($solicitacoes);
            if(mysqli_num_rows($query)>0){
                if($i < 10 && $flag==true){
                    echo "<img class='seemore' src='icons/seemore.png'/>";
                }
            }
                $query->free();
            
                $executa = "select * from solicitacoes where login_doador = '$logado' order by id_solic desc";
                $query = $mysqli->query($executa);

                echo"<br><br>";
                echo "<div class='solicitacoes'><h3>Solicitações Recebidas</h3>
                <table>
                <tr>
                    <th>Nome</th>
                    <th>Animal</th>
                    <th>Solicitante</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>";
                while($dados = $query->fetch_object()){

                    $executa1 = ("select * from usuario where login = '$dados->solicitante'");
                $query1 = $mysqli->query($executa1);
                while($dados1 = $query1->fetch_object()){
                    $nome = $dados1->nome;
                    $telefone = $dados1->telefone;
                    $celular = $dados1->celular;
                    $email = $dados1->email;
                }

                $executa2 = ("select * from animal where idanimal = '$dados->id_animal'");
                $query2 = $mysqli->query($executa2);
                while($dados2 = $query2->fetch_object()){
                    $nome_animal = $dados2->nome;
                    $especie = $dados2->especie;
                }

                    echo "<tr>";
                    echo "<td>$nome_animal</td>";
                    echo "<td>$especie</td>";
                    echo "<td>$nome</td>";
                    echo "<td>$telefone</td>";
                    echo "<td>$celular</td>";
                    echo "<td>$email</td>";
                    echo "<td class='aceitar'><a href='aceitar_solicitacao.php?id_solic=$dados->id_solic&&id_animal=$dados->id_animal' role='button'>Aceitar</a></td>";
                    echo "<td class='remover'><a href='excluir_solicitacao.php?id_solic=$dados->id_solic' role='button'>Excluir</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                $query->free();

            ?>
        </div>
    </div>
    <br><br>
    <?php
    include('include/rodape.php');
    }
    ?>
    <script src="app.js "></script>
</body>

</html>