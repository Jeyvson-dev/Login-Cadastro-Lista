<?php

require_once 'conection.php';
class Update extends Connect{

    private $id;
    private $nome;
    private $nascimento;
    private $sexo;
    private $email;
    private $login;
    private $senha;

    public function __construct($id, $nome, $nascimento, $sexo, $email, $login, $senha){
                       
    $this->id = $id;
    $this->nome = $nome;
    $this->nascimento = $nascimento;
    $this->sexo = $sexo;
    $this->email = $email;
    $this->login = $login;
    $this->senha = $senha;

    }

    public function update(){

        $this->connexion();

            $sql = "
                UPDATE
                    cadastros
                SET
                    nome = '$this->nome',
                    nascimento = '$this->nascimento',
                    sexo = '$this->sexo',
                    email = '$this->email',
                    login = '$this->login',
                    senha = '$this->senha'
                WHERE 
                    id = '$this->id'
            ";

            $this->conexao->query($sql);

            echo "Usuário atualizado com sucesso";
    


    }
    
  

    
    public function getId()
    {
        return $this->id;
    }
   
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
 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
 
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;

        return $this;
    }
 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }
 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}

$update = new Update($_POST['id'], $_POST['nome'], $_POST['nascimento'], $_POST['sexo'], $_POST['email'], $_POST['login'], $_POST['senha']);
$update->update();

?>