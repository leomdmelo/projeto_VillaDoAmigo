<div class="backFooter ">
        <div class="container ">
            <div class="foot1 ">
                <p><b>Silvana Mitne</b><br/> Protetora de Animais<br/> (11) 9 9995-0516 / 9 9866-3573 <br/>contatovilladoamigo@gmail.com</p><br/>
                <p><b>Villa do Amigo</b><br/> Proteção e respeito aos animais ​© 2017</p>

            </div>
            <div class="foot2 ">
                <form method="POST" action="#">
                    <div>Seja nosso parceiro entraremos em contato com voce.</div>
                    <div>
                        <p>&#9755</p><input type="text " placeholder="Nome " name="nome_parceiro" id="nome_parceiro"/><br/>
                        <p>&#9993</p><input type="email " placeholder="Endereço de email " name="email_parceiro" id="email_parceiro"/><br/>
                        <input type="submit" value="contate-nos" name="enviar"/>
                    </div>
                </form>
                <?php 
                    if(isset($_POST["nome_parceiro"]) && isset($_POST["email_parceiro"])){
                        $nome = $_POST["nome_parceiro"];
                        $email = $_POST["email_parceiro"];
                        $sql = "INSERT INTO parceiro (nome_parceiro, email_parceiro)
                                VALUES ('$nome', '$email')";
                        if($query=$mysqli->query($sql)){
                            echo "Você se inscreveu com sucesso!";
                        } else {
                            echo "Você não inscreveu :c";
                        }
                    }
                ?>
            </div>
        </div>
    </div>