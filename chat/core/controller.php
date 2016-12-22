<?php

class Controller {
    
    public function __construct() {
        //echo 'obj_Controller foi criado';
    }
    
    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        include 'views/'.$viewName.'.php';
    }
    
    public function loadTemplate($viewName, $viewData = array()) {        
        include 'core/template.php';
    }
    
    public function loadViewTemplate($viewName, $viewData = array()) {
        extract($viewData);
        include 'views/'.$viewName.'.php';
    }
    
}

