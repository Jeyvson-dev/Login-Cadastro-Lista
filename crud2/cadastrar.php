<?php

require_once 'conection.php';

class Cadastrar extends Connect{

    private $nome;
    private $idade;
    private $nascimento;
    private $sexo;
    private $email;
    private $login;
    private $senha;

    public function cadastrar(){

        $this->connexion();

        $this->nome = $_POST['nome'];
        $this->nascimento = $_POST['nascimento'];
        $this->idade = $this->formatIdade($this->nascimento);
        $this->sexo = $_POST['sexo'];
        $this->email = $_POST['email'];
        $this->login = $_POST['login'];
        $this->senha = $_POST['senha'];

        

        if(empty($this->nome)){

           die('Campo "Nome" é obrigatório');

        }
        if(empty($this->nascimento)){

            die('Preencher o campo "Data de nascimento corretamente"');
        }
        if($this->sexo != 'M' && $this->sexo != 'F'){

            die('Valor indicado em "Sexo" Incorreto');

        }
        if(empty($this->email)){

            die('Favor preencher o campo "E-mail"');

        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){

            die('Favor preencher um e-mail válido');

        }
        if(empty($this->login)){

            die('campo login não pode estar vazio');
            
        }
        if(empty($this->senha)){

            die('Campo senha precisa ser preenchido');
            
        }
        
        if(strlen($this->senha) < 8){

            die('O Campo senha precisa ter mais de 8 Caracteres');

        }else{
        
        $sql = "
        INSERT INTO cadastros (nome, idade, sexo, email, login, senha, nascimento)
        value('$this->nome','$this->idade','$this->sexo','$this->email','$this->login','$this->senha','$this->nascimento')
        ";
        
        $this->conexao->query($sql);

        echo 'O usuário foi cadastrado com sucesso';

        }


    }

    public function formatIdade($dataNascimento){

        $anoNasc = substr($dataNascimento,0,4);

        $idade = intval(date('Y')) - intval(substr($anoNasc,0,4));

        return $idade;

    }

       // Getters

    public function getNome()
    {
        return $this->nome;
    }

     
    public function getNascimento()
    {
        return $this->nascimento;
    }

     
    public function getSexo()
    {
        return $this->sexo;
    }

     
    public function getEmail()
    {
        return $this->email;
    }

     
    public function getLogin()
    {
        return $this->login;
    }

     
    public function getSenha()
    {
        return $this->senha;
    }

     //Setters

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

     
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

     
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

     
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

     
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;

        return $this;
    }

     
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
}

$cadastrar = new Cadastrar();
$cadastrar->cadastrar()

?>