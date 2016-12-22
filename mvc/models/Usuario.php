<?php
class Usuario extends model {
    /*
    private $name;
    private $sobrenome;

    public function setName($n) {
        $this->name = $n;
    }    
    public function getName() {
        return $this->name;
    }    
    public function setSobrenome($n) {
        $this->sobrenome = $n;
    }    
    public function getSobrenome() {
        return $this->sobrenome;
    }    
    */
   public function getAllUsuarios() {
       $allUsuarios = array();
       $sql = "SELECT * FROM usuarios";
       $sql = $this->db->query($sql);
       if($sql->rowCount() > 0) {
           $allUsuarios = $sql->fetchAll();
       }
       return $allUsuarios;
   }
    
}