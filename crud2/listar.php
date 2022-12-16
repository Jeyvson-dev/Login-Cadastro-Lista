<?php

require_once 'conection.php';

class Select extends Connect
{

    private $sql_code;
    private $sql_query;
    private $lista;


    public function select()
    {

        $this->connexion();

        $this->sql_code = "SELECT * FROM cadastros";

        $this->sql_query = $this->conexao->query($this->sql_code);

        $this->lista =  $this->sql_query->fetchAll(PDO::FETCH_OBJ);


        foreach ($this->lista as $key => $value) {

            //Função informar o sexo do usuário
            if ($value->sexo == 'M') {

                $value->sexo = 'Masculino';
            } else if ($value->sexo == 'F') {

                $value->sexo = 'Feminino';
            }

            //Função para alterar a estrutura de data
            $value->nascimento = implode('/', array_reverse(explode('-', $value->nascimento)));
        }

        echo json_encode($this->lista);
    }
 
    public function getSql_code()
    {
        return $this->sql_code;
    }
 
    public function getSql_query()
    {
        return $this->sql_query;
    }
 
    public function getLista()
    {
        return $this->lista;
    }
    
 
    public function setSql_code($sql_code)
    {
        $this->sql_code = $sql_code;

        return $this;
    }
 
    public function setSql_query($sql_query)
    {
        $this->sql_query = $sql_query;

        return $this;
    }
 
    public function setLista($lista)
    {
        $this->lista = $lista;

        return $this;
    }
}
$select = new Select();
$select->select();