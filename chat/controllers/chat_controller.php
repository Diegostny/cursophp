<?php

class Chat_controller extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $chamado = new Chamados();
        $dados = array('nome' => '');
        
        if (isset($_POST['submitNome'])) {
            $nome = filter_input(INPUT_POST, 'nome');
        }        
        $id = filter_input(INPUT_GET, 'id');        
        if (isset($id)) { // entao o chat foi aberto pelo suporte        
            $chamado->updateStatus($id, '1');
            $_SESSION['chatWindow'] = $id;
        } else { 
            if (isset($nome) && !empty ($nome)) {                
            $ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
            $data_inicio = date('H:i:s');
            $idChamado = $chamado->addChamado($nome, $ip, $data_inicio);            
            $_SESSION['chatWindow'] = $idChamado;
            }
        }
        if (!isset($_SESSION['chatWindow']) || empty($_SESSION['chatWindow']) ){            
            $this->loadTemplate('novochamado'); //, $dados);
            exit;
        }
        if (isset($_SESSION['area']) && $_SESSION['area'] == 'suporte') {
            $dados['nome'] = 'Suporte';
        }
        elseif (isset($_SESSION['area']) && $_SESSION['area'] == 'cliente') {
            $id = $_SESSION['chatWindow'];
            $cliente = $chamado->getChamados($id);
            $dados['nome'] = $cliente[0]['nome'];
        }        
        $this->loadTemplate('chat', $dados);
    }
    
}