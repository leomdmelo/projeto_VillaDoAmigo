function verificarCPFv2(a) {
    let cpf = Array.from(a);
    let multiplicador = 10;
    let calculo = [];
    let primeiraVerificacao = 0;
    let segundaVerificacao = 0;
    let k = cpf.pop();
    let j = cpf.pop();

    for (i = 0; i < cpf.length; i++) {
        calculo.unshift(cpf[i] * multiplicador);
        multiplicador--;
    }
    primeiraVerificacao = validarDadosDoArray(calculo);

    cpf.push(primeiraVerificacao);
    multiplicador = 11;
    calculo = [];

    for (i = 0; i < cpf.length; i++) {
        calculo.unshift(cpf[i] * multiplicador);
        multiplicador--;
    }

    segundaVerificacao = validarDadosDoArray(calculo);

    if (primeiraVerificacao == parseInt(j) && segundaVerificacao == parseInt(k)) {
        //document.getElementById("cpf").style.borderBottom = "2px solid #00CC00";
        return ajax("2|" + a, "verificarDadosUsuario", "", "verificarDadosUsuario");
    } else {
        document.getElementById("cpf").style.borderBottom = "2px solid #CC3333";
        return false;
    }


    function validarDadosDoArray(b) {
        c = 0;
        for (i = 0; i < b.length; i++) {
            c += parseInt(b[i]);
        }
        d = c % 11;
        if (d < 2) {
            d = 11;
        }
        return 11 - d;
    }
}

function confirmarSenha() {
    let senha = document.getElementById("senha");
    let cSenha = document.getElementById("cSenha");
    if (senha.value == cSenha.value) {
        senha.style.borderBottom = "2px solid #00CC00";
        cSenha.style.borderBottom = "2px solid #00CC00";
        return true;
    } else {
        senha.style.borderBottom = "2px solid #CC3333";
        cSenha.style.borderBottom = "2px solid #CC3333";
        return false;
    }
}

function retrocederEtapa() {
    let inicio = document.getElementById("0");
    let meio = document.getElementById("1");
    let fimSucesso = document.getElementById("2");
    let fimFracasso = document.getElementById("3");
    inicio.setAttribute("class", "show");
    meio.setAttribute("class", "hide");
    fimSucesso.setAttribute("class", "hide");
    fimFracasso.setAttribute("class", "hide");
}

function proximaEtapa() {
    let inicio = document.getElementById("0");
    let meio = document.getElementById("1");
    let fimSucesso = document.getElementById("2");
    let fimFracasso = document.getElementById("3");
    inicio.setAttribute("class", "hide");
    meio.setAttribute("class", "show");
    fimSucesso.setAttribute("class", "hide");
    fimFracasso.setAttribute("class", "hide");
}

//verificarcpf(4, 9, 6, 2, 5, 5, 1, 8, 8);
//verificarCPFv2("13603062821");