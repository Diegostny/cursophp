<?php

class Cliente_controller extends Controller {
    
    public function __construct() {
        parent::__construct();
        $_SESSION['area'] = 'cliente';
    }
    
    public function index() {
        $this->loadTemplate('cliente');
    }
  
}