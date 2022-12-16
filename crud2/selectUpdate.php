<?php
require_once 'conection.php';

class Listar extends Connect{
    private $id;
    private $stmt;

    public function __construct($ids){

        $this->id = $ids;

        
    }

    public function alterSex($sexo){

        if($sexo == 'M'){

            $sexo = "Masculino";

        }else if($sexo == "F"){

            $sexo = "Feminino";

        }

    }

    public function selectUpdate(){

        $this->connexion();
        
        $sql = "
            SELECT 
                *
            FROM
                cadastros
            WHERE
                 id = '$this->id'
        ";
      

        $this->stmt = $this->conexao->query($sql);

        $lista = $this->stmt->fetch(PDO::FETCH_OBJ);

        $this->alterSex($lista->sexo);

        echo json_encode($lista); 

    }

}
$select = new Listar($_POST['id']);
$select->selectUpdate();
?>