<?php

class Chamados extends Model {
        
    public function getChamados() {
        $res = array();
        //$sql = "SELECT * FROM chamados WHERE status = '0' OR status = '1'";
        $sql = "SELECT * FROM chamados WHERE status IN (0, 1)";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0) {
            $res = $sql->fetchAll();
        }        
        return $res;
    }
    
    public function updateStatus($id, $status) {
        if(!empty($id) && !empty($status)) {
            $sql = "UPDATE chamados SET status = '$status' WHERE id = '$id'";
            $this->db->query($sql);            
        }
    }
    
}