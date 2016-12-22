<?php

class Ajax_controller extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array();
    } 
    
    public function getChamado() {
        $dados = array();
        //$dados['nome'] = "Diego";
        $chamado = new Chamados();
        $dados['chamados'] = $chamado->getChamados();
        echo json_encode($dados);
    }
    
    public function enviarMsgToDb() {
        $msg = filter_input(INPUT_POST, 'msg');
        $time = filter_input(INPUT_POST, 'hora');
        $idChamado = $_SESSION['chatWindow'];
        if ($_SESSION['area'] == 'suporte') {
            $origem = 0;
        } else {
            $origem = 1;
        }
        $msgChamado = new Mensagens();
        $msgChamado->enviarMensagem($msg, $origem, $idChamado, $time);
    }
}