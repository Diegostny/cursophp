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
    
}