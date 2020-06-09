//Exercio 01
// Utilize a função prompt para perguntar para o usuário seu nome e idade. Após a leitura, imprima a 
// string "{nome} tem {idade} anos";
function ex01() {
    var nome = prompt('Qual o seu nome?')
    var idade = prompt('Qual o sua idade?')
    document.getElementById('nomeIdade').innerHTML = nome + ' tem ' + idade + ' anos';
}

//Exercício 02
function ex02() {
    var codProd = prompt('Qual o código do produto que você deseja excluir?')
    if (codProd != null) {
        var confirmar = confirm('Você quer excluir o produto ' + codProd + '?')
        if (confirmar) {
            alert('Você excluiu o produto ' + codProd)
        }

    }
}
//Exercício 03
function ex03() {
    document.getElementById("tipoTitulos").innerHTML = ""
    for (let i = 1; i <= 6; i++) {
        var para = document.createElement("H" + i)
        var texto = document.createTextNode("Exemplo H" + i)
        para.appendChild(texto)
        document.getElementById("tipoTitulos").appendChild(para)
    }
}


//Exercício 04 e Exercício 05
function excluirProduto() {
    ex02();
}


//Exercício 06 
function calcularIMC(alt, peso) {
    if (!alt & !peso) {
        var alt = prompt('Qual a sua altura?');
        var peso = prompt('Qual o seu peso?');
    }

    var imc = peso / (alt * alt);
    imc = parseFloat(imc.toFixed(2))
    alert("O seu IMC é de: " + imc);
}

//Exercício 07
function capturaInputIMC() {
    var altura = document.getElementById('altura').value;
    var peso = document.getElementById('peso').value;
    if (peso != "" & altura != "") {
        calcularIMC(altura, peso)
    } else {
        alert("Digite a altura/Peso!")
    }
}

//Exercício 08
function continentePais() {
    var continentes = [
        ['Americano', 'Brasil', 'EUA', 'Canadá', 'Uruguai'],
        ['Europeu', 'Itália', 'Irlanda', 'França'],
        ['Asiático', 'China', 'Japão']
    ]
    for (let i = 0; i < continentes.length; i++) {
        console.log(continentes[i][0] + ':')
        for (let j = 1; j < continentes[i].length; j++) {
            console.log(continentes[i][j])
        }
    }
}


//Exercício 09
function dadosNavegador() {
    document.getElementById('dadosNavegador').innerHTML = ""
    var txt = "";
    var version = "";
    // navigator.appVersion

    txt += "<p>Sistema Operacional: " + verificaOS() + "</p>";
    txt += "<p>Nome do Navegador: " + navigator.appCodeName + "</p>";
    for (let index = 0; index < 3; index++) {
        version += navigator.appVersion[index];
    }
    txt += "<p>Versão do Navegador: " + version + "</p>";
    txt += "<p>Idioma Navegador: " + navigator.language + "</p>";

    txt += "<hr>";
    document.getElementById('dadosNavegador').innerHTML = txt
}

function verificaOS() {
    var OSNome = "";
    if (window.navigator.userAgent.indexOf("Windows NT 10.0") != -1) OSNome = "Windows 10";
    if (window.navigator.userAgent.indexOf("Windows NT 6.2") != -1) OSNome = "Windows 8";
    if (window.navigator.userAgent.indexOf("Windows NT 6.1") != -1) OSNome = "Windows 7";
    if (window.navigator.userAgent.indexOf("Windows NT 6.0") != -1) OSNome = "Windows Vista";
    if (window.navigator.userAgent.indexOf("Windows NT 5.1") != -1) OSNome = "Windows XP";
    if (window.navigator.userAgent.indexOf("Windows NT 5.0") != -1) OSNome = "Windows 2000";
    if (window.navigator.userAgent.indexOf("Mac") != -1) OSNome = "Mac/iOS";
    if (window.navigator.userAgent.indexOf("X11") != -1) OSNome = "UNIX";
    if (window.navigator.userAgent.indexOf("Linux") != -1) OSNome = "Linux";

    return OSNome;
}