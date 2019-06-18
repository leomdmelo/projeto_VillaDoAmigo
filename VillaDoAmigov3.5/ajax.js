function postCadastro() {
    let login = document.forms["cadastro"][0].value;
    let senha = document.forms["cadastro"][1].value;
    let csenha = document.forms["cadastro"][2].value;
    let nome = document.forms["cadastro"][3].value;
    let sobrenome = document.forms["cadastro"][4].value;
    let cpf = document.forms["cadastro"][5].value;
    let email = document.forms["cadastro"][6].value;
    let telfixo = document.forms["cadastro"][7].value;
    let telmovel = document.forms["cadastro"][8].value;
    let cep = document.forms["cadastro"][9].value;
    let bairro = document.forms["cadastro"][10].value;
    let cidade = document.forms["cadastro"][11].value;
    let estado = document.forms["cadastro"][12].value;
    let formulario = login + "|" + senha + "|" + csenha + "|" + nome + "|" + sobrenome + "|" + cpf + "|" + email + "|" + telfixo + "|" + telmovel + "|" + cep + "|" + bairro + "|" + cidade + "|" + estado;
    console.log(formulario);
    ajax(formulario, "cadastrarUsuario", "", "cadastrarUsuario");
};

function ajax(dados, alvo, elementoAlvo, feedback) {
    let php = "ajax/" + alvo + ".php";
    let req = new XMLHttpRequest;

    req.open("POST", php, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("r=" + dados);
    console.log("to poraqui");
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            if (feedback != false) {
                console.log("poraqui tb");
                resposta = this.responseText;
                if (feedback == "verificarDadosUsuario") {
                    if (resposta == 0) {
                        document.getElementById('login').style.borderBottom = "2px solid #00CC00";
                        document.getElementById('alertUsuario').innerText = "";
                    }
                    if (resposta == 1) {
                        document.getElementById('login').style.borderBottom = "2px solid #CC3333";
                        document.getElementById('alertUsuario').innerText = "Login ja está sendo utilizado!";
                    }
                    if (resposta == 2) {
                        document.getElementById('cpf').style.borderBottom = "2px solid #00CC00";
                        document.getElementById('alertUsuario').innerText = "";
                    }
                    if (resposta == 3) {
                        document.getElementById('cpf').style.borderBottom = "2px solid #CC3333";
                        document.getElementById('alertCPF').innerText = "CPF Já está sendo usado!";
                    }
                }
                if (feedback == "recuperarEndereco") {
                    console.log(resposta);
                    let json = JSON.parse(resposta);
                    if (json.erro == true) {
                        alert("Insira um CEP existente");
                    } else {
                        let bairro = document.forms['cadastro']['bairro'];
                        let cidade = document.forms['cadastro']['municipio'];
                        let estado = document.forms['cadastro']['estado'];
                        bairro.setAttribute("value", json.bairro);
                        cidade.setAttribute("value", json.localidade);
                        estado.setAttribute("value", json.uf);
                    }
                }
                if (feedback == "cadastrarUsuario") {
                    //console.log(resposta);
                    let json = JSON.parse(resposta);
                    if (json.status == "sucesso") {
                        document.getElementById("1").setAttribute("class", "hide");
                        document.getElementById("2").setAttribute("class", "show");
                        setTimeout(() => {
                            window.location = "file:///C:/wamp64/www/VillaDoAmigov3/acesso.php";
                        }, 300);
                    }
                    if (json.status == "fracasso") {
                        document.getElementById("1").setAttribute("class", "hide");
                        document.getElementById("3").setAttribute("class", "show");
                        document.getElementById("relatorio").innerHTML = json.mensagem;
                    } else {
                        console.log("samuel, tem algo errado..");
                    }
                }
            }
            if (feedback == false) {

            }
        }
    }
}