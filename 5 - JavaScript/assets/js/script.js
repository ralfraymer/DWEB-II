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


//Exercício 04
function excluirProduto(){
    ex02();
}