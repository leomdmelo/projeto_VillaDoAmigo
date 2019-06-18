window.onload = function() {
    var fotos = document.getElementsByClassName("foto").length;

    for (i = 0; i < fotos; i++) {
        ajustarImagem(i);
        ajustarMargem(i);
    }

}

function ajustarImagem(i) {
    var alturaDiv = document.getElementsByClassName("foto")[i].clientHeight;
    var comprimentoDiv = document.getElementsByClassName("foto")[i].clientWidth;
    var div = document.getElementsByClassName("foto")[i].children;
    var foto = div[2];
    var comprimentoHTML = comprimentoDiv + "px";
    var alturaHTML = alturaDiv + "px";
    if (foto.clientWidth > foto.clientHeight) {
        foto.setAttribute("width", comprimentoHTML);
    }
    if (foto.clientWidth < foto.clientHeight || foto.clientWidth == foto.clientHeight) {
        foto.setAttribute("height", alturaHTML);
    }
}

function ajustarMargem(i) {
    var alturaDiv = document.getElementsByClassName("foto")[i].clientHeight;
    var larguraDiv = document.getElementsByClassName("foto")[i].clientWidth;
    var div = document.getElementsByClassName("foto")[i].children;
    var foto = div[2];
    var alturaFoto = foto.clientHeight;
    var larguraFoto = foto.clientWidth;
    var html = "";
    if (alturaFoto > alturaDiv) {
        foto.setAttribute("width", "auto");
        foto.setAttribute("height", "100%");
        larguraFoto = foto.clientWidth;
        html = "left:" + (larguraDiv - larguraFoto) / 2 + "px";

        foto.setAttribute("style", html);
    } else {
        if (alturaFoto < larguraFoto) {
            html = "top:" + (alturaDiv - alturaFoto) / 2 + "px";
        }
        if (alturaFoto > larguraFoto || alturaFoto == larguraFoto) {
            html = "left:" + (larguraDiv - larguraFoto) / 2 + "px";
        }

    }
    foto.setAttribute("style", html);
}