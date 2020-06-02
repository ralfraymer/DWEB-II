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
    var confirmar = confirm('Você quer excluir o produto ' + codProd +'?')

    if(confirmar){
        alert('Você excluiu o produto ' + codProd)
    }
}