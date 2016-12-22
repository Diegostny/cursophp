<?php
class testeController extends Controller {
    
    public function index() {
        echo 'Este é o "index" do testeController.';
    }
    
    public function ver($nome, $sobrenome) {    
        echo 'Este é o "ver" do testeController.<br/>';
        echo 'Nome: '.$nome." Sobrenome: ".$sobrenome;
    }
    
}