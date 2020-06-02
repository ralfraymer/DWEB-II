//Exercio 01
// Utilize a função prompt para perguntar para o usuário seu nome e idade. Após a leitura, imprima a 
// string "{nome} tem {idade} anos";
function ex01(){
    var nome = prompt('Qual o seu nome?')
    var idade = prompt('Qual o sua idade?')
    document.getElementById('nomeIdade').innerHTML = nome + ' tem ' + idade + ' anos';
}

//Exercício 02
function ex02(){
    var codProd = prompt('Qual o código do produto que você deseja excluir?')
    if (codProd != null){
        var confirmar = confirm('Você quer excluir o produto ' + codProd +'?')
            if(confirmar){
                alert('Você excluiu o produto ' + codProd)
            }

    }
}
//Exercício 03
function ex03(){
    document.getElementById("tipoTitulos").innerHTML = ""
    for (let i = 1; i <= 6; i++) {      
        var para = document.createElement("H"+i)                   
        var texto = document.createTextNode("Exemplo H"+i)
        para.appendChild(texto)                                        
        document.getElementById("tipoTitulos").appendChild(para)    
    }
}


//Exercício 04 e Exercício 05
function excluirProduto(){
    ex02();
}


//Exercício 06 
function calcularIMC(alt, peso){
    if(!alt & !peso){
        var alt = prompt('Qual a sua altura?');
        var peso = prompt('Qual o seu peso?');
    }

    var imc = peso / (alt * alt);
    imc = parseFloat(imc.toFixed(2))
    alert("O seu IMC é de: "+ imc);
}

//Exercício 07
function capturaInputIMC(){
    var altura = document.getElementById('altura').value;
    var peso = document.getElementById('peso').value;
    if(peso != "" & altura != ""){
        calcularIMC(altura, peso)
    }else{
        alert("Digite a altura/Peso!")
    }
}
