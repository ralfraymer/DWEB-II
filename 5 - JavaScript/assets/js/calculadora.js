function addDigit(num) {
    document.getElementById('display').value = document.getElementById('display').value + num;
}
function total() { //cria uma função total.
    var x = document.getElementById('display').value; //cria uma váriavel x e dentro dela atribui-se o valor do objeto textbox.
    if (x) { //Verifica se X é verdadeiro.
        document.getElementById('display').value = eval(x); //Se for, realiza uma operação usando os valores presentes no objeto textbox.
    }
}
function clearMemory() {
    document.getElementById('display').value = "0";
}
function back() {
    var exp = document.getElementById('display').value;
    document.getElementById('display').value = exp.substring(0, exp.length - 1);
}
