<?php
require_once 'conection.php';

    class Delete extends Connect{

        private $id;

        public function __construct($id){
            
            $this->id = $id;

        }
             
        public function excluir(){

            $this->connexion();
            
           $sql = "DELETE 
                   FROM 
                        cadastros
                   WHERE 
                        id = $this->id
                ";

            $this->conexao->query($sql);

            echo 'Usuário excluído com sucesso';

        }

       
        public function getId()
        {
                return $this->id;
        }

         
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }

$delete = new Delete($_POST['id']);
$delete->excluir();

?>