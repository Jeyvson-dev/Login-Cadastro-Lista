<?php

require_once 'conection.php';

class Login extends Connect{
private $validation;
private $user;
private $senha;

public function loginUser(){

    $this->connexion();

    $this->user = $_POST['login'];

    $this->senha = $_POST['senha'];

    $sql = "SELECT
                 * 
            FROM 
                cadastros
            WHERE 
                login = '$this->user'
            AND 
                senha = '$this->senha'
            ";

    $stmt = $this->conexao->query($sql);

    $login = $stmt->fetch(PDO::FETCH_OBJ);

    if($this->user == $login->login && $this->senha == $login->senha){

        $this->validation = true;

    }else{

        $this->validation = false;

    }

    echo $this->validation;
}

public function getValidation()
{
return $this->validation;
}


public function getUser()
{
return $this->user;
}


public function getSenha()
{
return $this->senha;
}

public function setValidation($validation)
{
$this->validation = $validation;

return $this;
}


public function setUser($user)
{
$this->user = $user;

return $this;
}


public function setSenha($senha)
{
$this->senha = $senha;

return $this;
}
}

$teste = new Login();

$teste->loginUser();


?>