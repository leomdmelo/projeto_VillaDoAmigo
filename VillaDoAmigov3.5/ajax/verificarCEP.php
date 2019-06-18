<?php
//Pode ser POST aqui tambem
$cep = $_POST['r'];
//"Limpa" o CEP deixando apenas os digitos, sem espaços ou "não-numeros"
$cep = preg_replace('/\s{0,10}\D+/','',$cep);

//Verifica se há 8 digitos
if(strlen($cep) == 8){
$resposta = file_get_contents("http://viacep.com.br/ws/$cep/json/unicode/");
echo $resposta;
} else {
    echo "Verifique seu CEP";
}