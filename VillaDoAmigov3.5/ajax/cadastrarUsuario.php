<?php
include('../include/abrir_banco.php');
if($_POST){
    $dados = explode("|",$_POST['r']);
    $login= $dados[0];
    $senha= $dados[1];
    $csenha= $dados[2];
    $nome= $dados[3];
    $sobrenome= $dados[4];
    $cpf= $dados[5];
    $email= $dados[6];
    $telfixo= $dados[7];
    $telmovel= $dados[8];
    $cep= preg_replace('/\s{0,10}\D+/','',$dados[9]);
    $bairro= $dados[10];
    $cidade= $dados[11];
    $estado= $dados[12];

    $pacote = new stdClass();
    $pacote->mensagem = "";

    if(empty($login) OR empty($senha) OR empty($csenha) OR empty($nome) OR empty($sobrenome) OR empty($cpf) OR empty($email) OR empty($telfixo) OR empty($telmovel) OR empty($cep) OR empty($bairro) OR empty($cidade) OR empty($estado)){
        $pacote->mensagem = 'Formulario incompleto';
        $pacote->status = "fracasso";
        echo json_encode($pacote);
    }
    else{
        $flag = false;
        $sql_login=("select * from usuario where login = '$login';");
        $query1=$mysqli->query($sql_login);
        $sql_cpf=("select * from usuario where cpf = '$cpf';");
        $query2=$mysqli->query($sql_cpf);
        if(mysqli_num_rows($query1) > 0 ){
            $pacote->mensagem .= 'Este Usuario já está sendo utilizado tente outro! <br/>';
            $flag = true;
        }
        if(mysqli_num_rows($query2) > 0 ){
            $pacote->mensagem .= 'Este CPF já está sendo utilizado tente outro! <br/>';
            $flag = true;
        }
        if($senha != $csenha){
            $pacote->mensagem .='As senhas dos campos não correspondem!';
            $flag = true;
        }
        if($flag == true){
            $pacote->status = "fracasso";
            echo json_encode($pacote);
        }
        else{
            $senha_codificada = base64_encode($senha);
            $sql = "INSERT INTO usuario (login, senha, tipo,
            nome, sobrenome, cpf, 
            telefone, celular, email, 
            cep, bairro, cidade, estado) VALUES ('$login', '$senha_codificada', '1',
            '$nome', '$sobrenome', '$cpf',
            '$telfixo', '$telmovel', '$email',
            '$cep', '$bairro', '$cidade', '$estado')";                                
            if($query=$mysqli->query($sql)){
                $pacote->status = "sucesso";

                echo json_encode($pacote);
            } else {
                $pacote->mensagem = "Falha ao inserir dados no banco de dados <br/>";
                $pacote->status = "fracasso";

                echo json_encode($pacote);
            }
        }
    }
}
?>