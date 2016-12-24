<?php

class Chamados extends Model {

    public function getChamados($id = "") {
        $res = array();
        if(empty($id)) {
            //$sql = "SELECT * FROM chamados WHERE status = '0' OR status = '1'";
            $sql = "SELECT * FROM chamados WHERE status IN (0, 1)";
        } else {
            $sql = "SELECT * FROM chamados WHERE id='$id'";
        }        
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $res = $sql->fetchAll();
        }
        return $res;
    }

    public function addChamado($nome, $ip, $data_inicio) {
        $sql = "INSERT INTO chamados (nome, ip, data_inicio, status) VALUES ('$nome',"
                . "'$ip', '$data_inicio', '0')";
        $sql = $this->db->query($sql);
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function updateStatus($id, $status) {
        if (!empty($id) && !empty($status)) {
            $sql = "UPDATE chamados SET status='$status' WHERE id='$id'";
            $this->db->query($sql);
        }
    }
    
    public function getLastMsg($idChamado, $area) {
        $last = ""; // horario da ultima leitura
        if (!empty($idChamado) && !empty($area)) {
            // recupera somente a coluna 'time_lido_*' desse id
            $sql = "SELECT time_lido_".$area." as last FROM chamados WHERE id='$idChamado'";
            $sql = $this->db->query($sql);             
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();                
                $last = $sql['last'];
            }
        }        
        return $last;
    }
    
    public function updateLastMsg($id, $area) {
        if (!empty($id) && !empty($area)) {
            $sql = "UPDATE chamados SET time_lido_".$area." = NOW() WHERE id='$id";
            $this->db->query($sql);
        }        
    }

}