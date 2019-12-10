var intervalo = 5000;

function image1(){
    document.getElementById("mudaImagem").src = "images/3.jpeg";
    setTimeout("image2()",intervalo);
}
function image2(){
    document.getElementById("mudaImagem").src = "images/jogos/1.jpeg";
    setTimeout("image3()",intervalo);
}
function image3(){
    document.getElementById("mudaImagem").src = "images/jogos/2.jpeg";
    setTimeout("image4()",intervalo);
}
function image4(){
    document.getElementById("mudaImagem").src = "images/jogos/3.jpeg";
    setTimeout("image5()",intervalo);
}
function image5(){
    document.getElementById("mudaImagem").src = "images/jogos/4.jpeg";
    setTimeout("image7()",intervalo);
}
function image7(){
    document.getElementById("mudaImagem").src = "images/jogos/5.jpeg";
    setTimeout("image8()",intervalo);
}
function image8(){
    document.getElementById("mudaImagem").src = "images/jogos/6.jpeg";
    setTimeout("image9()",intervalo);
}
function image9(){
    document.getElementById("mudaImagem").src = "images/jogos/7.jpeg";
    setTimeout("image10()",intervalo);
}
function image10(){
    document.getElementById("mudaImagem").src = "images/jogos/8.jpeg";
    setTimeout("image11()",intervalo);
}
function image11(){
    document.getElementById("mudaImagem").src = "images/9.jpeg";
    setTimeout("image1()",intervalo);
}