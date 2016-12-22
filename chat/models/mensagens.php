<?php

class Mensagens extends Model {
    
    public function enviarMensagem($id, $origem, $msg, $time) {
        if(!empty($id) && !empty($msg)) {
            $sql = "INSERT INTO mensagens (id_chamado, origem, mensagem, data_enviado) "
                    ."VALUES ('$id', '$origem', '$msg', $time)";
            $this->db->query($sql);
        }
    }
    
}
