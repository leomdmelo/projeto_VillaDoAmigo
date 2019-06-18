<?php
include('include/abrir_banco.php');
session_start();
?>
<div class="backHeader">
        <div class="container">
            <div class="access">

            <?php
                if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
                //echo("<input type='submit' value='Logar' onclick='javascript: location.href='sair.php';'/>");
                echo('<div ><a href="acesso.php"><input type="button" value="Login"></a></div>');
                $logado = false;
                }
                else{
                $logado = $_SESSION['login'];
                $executa = ("select * from usuario where login = '$logado';");
                $query = $mysqli->query($executa);
                while ($dados = $query->fetch_object()) {
                    $tipo =  $dados->tipo;
                }
                if($tipo == '1'){
                    
                   /* echo("<input type='submit' value='Minha Conta' onclick='javascript: location.href='perfil.php';' />   ");
                    echo("<input type='submit' value='Meus Animais' onclick='javascript: location.href='meus_animais.php';' />   ");
                    echo("<input type='submit' value='Sair' onclick='javascript: location.href='sair.php';' />"); */
                    
                    echo('<div ><a href="perfil.php"><input type="button" value="Minha Conta"/></a></div>');
                    echo('<div ><a href="meus_animais.php"><input type="button" value="Meus Animais"/></a></div>');
                    echo('<div ><a href="sair.php"><input type="button" value="Sair"/></a></div>');

                }
                elseif($tipo == '0'){
                    /*echo("<input type='button' value='Gerenciar' onclick='javascript: location.href='gerenciar.php';' />   ");
                    echo("<input type='button' value='Sair' onclick='javascript: location.href='sair.php';' />"); */

                    echo('<div ><a href="gerenciar.php"><input type="button" value="Gerenciar"/></a></div>');
                    echo('<div ><a href="sair.php"><input type="button" value="Sair"/></a></div>');
                }
                }
            ?>

            </div>
            <div class="nav">
                <a href="index.php"><img src="imagens/logo.png" /></a>
                <a href="index.php">
                    <p>Home</p>
                </a>
                <a href="quem-somos.php">
                    <p>Quem Somos</p>
                </a>
                <a href="adote-um-amigo.php">
                    <p>Adotar</p>
                </a>
                <a href="Amigos_adotados.php">
                    <p>Amigos Adotados</p>
                </a>
            </div>
        </div>
    </div>