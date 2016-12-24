<?php

class Mensagens extends Model {

    public function enviarMensagem($id, $origem, $msg) {
        if (!empty($id) && !empty($msg)) {
            $sql = "INSERT INTO mensagens SET "
                    . "id_chamado='$id',"
                    . "origem='$origem',"
                    . "mensagem='$msg',"
                    . "data_envio=NOW()";
            if ($this->db->query($sql) == false) {
                return false;
            }
        }
        return true;
    }
    
    public function getMensagem($id, $last) {
        $msg = array();
        if (!empty($id) && !empty($last)) {
            $sql = "SELECT * FROM mensagens WHERE id_chamado='$id' "
                    . " AND data_envio > '$last'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $msg = $sql->fetchAll();
            }
        }
        $chamado = new Chamados();        
        $chamado->updateLastMsg($id, $_SESSION['area']);        
        return $msg;
    }

    public function enviarMensagem($id, $origem, $msg, $time) {
        if(!empty($id) && !empty($msg)) {
            $sql = "INSERT INTO mensagens (id_chamado, origem, mensagem, data_enviado) "
                    ."VALUES ('$id', '$origem', '$msg', $time)";
            $this->db->query($sql);
        }
    }
    
}