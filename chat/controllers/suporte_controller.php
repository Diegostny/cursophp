<?php

class Suporte_controller extends Controller {
    
    public function __construct() {
        parent::__construct();
        $_SESSION['area'] = 'suporte';
    }
    
    public function index() {
        $this->loadTemplate('suporte');
    }
    
}