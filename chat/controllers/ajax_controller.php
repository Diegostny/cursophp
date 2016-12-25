<?php

class Ajax_controller extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
        
    public function getChamado() {
        $dados = array();
        $chamado = new Chamados();
        $dados['chamados'] = $chamado->getChamados();
        echo json_encode($dados);
    }
    
    public function enviarMsgToDb() {
        $msg = filter_input(INPUT_POST, 'msg');
        $idChamado = $_SESSION['chatWindow'];
        if ($_SESSION['area'] == 'suporte') {
            $origem = 0;
        } else {
            $origem = 1;
        }
        $msgChamado = new Mensagens(); 
        if($msgChamado->enviarMensagem($idChamado, $origem, $msg)) {
            echo 'Mensagem enviada para o db.';
        } else {
            echo 'Ocorreu um erro ao enviar para o db.';
        }   
    }
    
    public function updateMessages() {
        $dados = array();
        $mensagem = new Mensagens();
        $chamado = new Chamados();
        $idChamado = $_SESSION['chatWindow'];
        $area = $_SESSION['area'];
        
        $lastmsg = $chamado->getLastMsg($idChamado, $area);
        $dados['mensagens'] = $mensagem->getMensagem($idChamado, $lastmsg);
        $dados['area'] = $area;
        echo json_encode($dados);
    }
    
}
