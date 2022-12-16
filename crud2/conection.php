<?php

class Connect{
    private $dsn;
    private $username;
    private $password;
    public $conexao;
    


public function connexion(){

    $this->dsn = 'mysql:host=localhost;dbname=crud2';
    $this->username = 'root';
    $this->password = '123456';
   
    try {

    $this->conexao = new PDO($this->dsn, $this->username, $this->password);

} catch(PDOException $e) {

    echo 'ERROR: ' . $e->getMessage();

}
    }

     
    public function getDsn()
    {
        
        return $this->dsn;
    }

    
    public function getUsername()
    {
        return $this->username;
    }

     
    public function getPassword()
    {
        return $this->password;
    }

    
    public function getConexao()
    {
        return $this->conexao;
    }

     
    public function setConexao($conexao)
    {
        $this->conexao = $conexao;

        return $this;
    }

     
    public function setPassword($password)
    {
        

        $this->password = $password;

        return $this;
    }

   
    public function setUsername($username)
    {
        

        $this->username = $username;

        return $this;
    }

    
    public function setDsn($dsn)
    {
        
        $this->dsn = $dsn;

        return $this;
    }
}

$teste = new Connect();
$teste->connexion();

?>
