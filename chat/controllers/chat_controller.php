<?php

class Chat_controller extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $chamado = new Chamados();
        $dados = array('nome' => '');
        $id = filter_input(INPUT_GET, 'id');
        if(isset($id)) {            
            $chamado->updateStatus($id, '1');
        } elseif(!isset($_SESSION['chatWindow']) || empty($_SESSION['chatWindow']) ){
            $this->loadViewTemplate('novochamado', $dados);
        }
        if(isset($_SESSION['area']) && $_SESSION['area'] == 'suporte') {
                $dados['nome'] = 'Suporte';
        } else {

        } 
         
        
        $this->loadTemplate('chat', $dados);
    }
    
}