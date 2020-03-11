<?php

//Cria uma classe contato
class Contato{
    //Variavel privada, serve para acesso somente dentro dessa classe
    private $dbo;
    private $nome;
    private $email;

    //AQui inicia a conexão com o banco de dados
    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=alfa;host=localhost","root","");
        echo "fez a conexão";
    }

    //Função de adicionar novos contatas, note que os campos obrigatórios vem por primeiro nos parametros, depois
    //vem os não obrigatórios que são atribuidos = '', para que se tenha um valor nulo em caso de não vir nada do
    //programa principal.
    public function adicionar($email, $nome = ''){
        //chama uma função interna que verifica se o email existe, a funçao internet é chamada com o $this->NomeFunção():
            if($this->existeEmail($email) == false){
                //Criamos a variávvel $sql e atribuimos à ela um SQL, neste caso de inserção.
                $sql = "INSERT INTO contato (nome, email) VALUES (:nome, :email)";
                //Pegamos esse SQL e criamos uma preparação, poiis dentro dele tem as variaveis que precisam receber um
                //valor, neste caso, referenciamos com $this->pdo->prepare($nomeVariavelSql)
                $sql = $this->pdo->prepare($sql);
                //Com a $sql->bindValue(:nomeParametro, $variavelNome), colocamos dentro do SQL os valores de cada variavel             
                $sql->bindValue(':nome',$nome);
                $sql->bindValue(':email',$email);
                //Por fim, pegamos esse SQL preparado e executamos ele.
                $sql->execute();
            }else{
                //Caso já tenha esse email, ele retorna false.
                return false;
            }
    }

    //Função que pega busca informação de um contato, através de um parametro, no caso uma busca com um id para 
    //retornar somente um elemento.
    public function getNome($email){
        //Criamos a variávvel $sql e atribuimos à ela um SQL, neste caso de seleção.
        $sql = "SELECT * FROM contato WHERE email = :email";
        //Pegamos esse SQL e criamos uma preparação, poiis dentro dele tem as variaveis que precisam receber um
        //valor, neste caso, referenciamos com $this->pdo->prepare($nomeVariavelSql)
        $sql = $this->pdo->prepare($sql);
        //Com a $sql->bindValue(:nomeParametro, $variavelNome), colocamos dentro do SQL os valores de cada variavel  
        $sql->bindValue(':email', $email);
        //Por fim, pegamos esse SQL preparado e executamos ele.
        $sql->execute();

        //Verificamos se o SQL executado tem algum registro, para isso usamos rowCount(), que retornar a quantidade
        //de registros daquela consulta
        if($sql->rowCount()>0){
            //Caso exista um registro, ele atribui para uma variável $info o valor encontrado. Para isso ele utiliza a 
            //função fetch(), que pega o primeiro elemento encontrado deste sql.
            $info = $sql->fetch();
            //Retorna para a função o campo nome deste array;
            return $info['nome'];
        }else{
            return '';
        }
    }


    //Com o mesmo intuito de fazer o R do CRUD, está função tem como objetivo pegar todos os elementos do SQL
    public function getAll(){
        //Faz o SQL para pegar todas as informações do contato
        $sql = "SELECT * FROM contato";
        //Quando o Sql NÃO tem nenhum PARAMETRO, não precisa preparar o sql como os de mais que tiveram anteriormente
        //Basta somente pegar o SQL, referenciar ao PDO e posteriormente atribuir a query($nomeFuncao)
        //A variavel $sql e tem dentro dela a query mencionada ficando assim '$sql = $this->pdo->query($sql)'
        $sql = $this->pdo->query($sql);
        //Verifica se a quantidade de elementos encontradas é maior que 0
        if($sql->rowCount()>0){
            //Casoo tenha registros, ele retorna a todos os elementos da Query, com a função fetchAll(), que cria uma array
            return $sql->fetchAll();
        }else{
            //IMPORTANTE, para não se perder na programação, tem que se retornar tipo de valores iguais, caso tenha 
            //registros ou não, neste caso como a função fetchAll()retorna um array, devemos colocar um array() vazio
            // quando não houver registros encontrados
            return array();
        }
    }
    
    //Primeiro vai os campos que você quer editar e por ultimo os campos de identificação do registro à ser trocado.
    public function editar($nome,$email){
        //devemos verifiar se existe um contato com esse email
        if($this->existeEmail($email)){
            //Criamos a variávvel $sql e atribuimos à ela um SQL, neste caso de atualzação.
            $sql = "UPDATE contato SET nome = :nome WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();
            
            return true;
        }else{
            return false;
        }
    }

    public function excluir($email){

        if($this->existeEmail($email)){
            $sql = "DELETE FROM contato WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;
        }else{
            return false;
    }
}



    private function existeEmail($email){
        $sql = "SELECT * FROM contato WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email',$email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }


    

}