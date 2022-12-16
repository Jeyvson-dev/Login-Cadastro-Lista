<?php

require_once 'conection.php';

class Login extends Connect{
private $validation;
private $user;
private $senha;


public function __construct($user, $senha){
    
    $this->user = $user;
    $this->senha = $senha;

}

public function validateLogin($userL, $userSQL, $senhaL, $senhaSQL){

    if($userL == $userSQL && $senhaL == $senhaSQL){

        $this->validation = true;

    }else{

        $this->validation = false;

    }

    echo $this->validation;


}

public function loginUser(){

    $this->connexion();

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

    $this->validateLogin($login->login, $this->user, $login->senha, $this->senha);

    
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

$teste = new Login($_POST['login'],$_POST['senha']);

$teste->loginUser();


?>