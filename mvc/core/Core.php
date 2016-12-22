<?php
class Core {
    
    public function run() {
        $url = explode("index.php", $_SERVER['PHP_SELF']); // obtém a url digitada
        $url = end($url); // obtém "/home/..."
        $params = array();
        
        if(!empty($url)) {
            $url = explode('/', $url); // remove as "/"
            array_shift($url); // remove "home"
            
            $currentController = $url[0]."Controller";
            array_shift($url);
            
            // minha validacao:
            if(! file_exists('controllers/'.$currentController)) {
                $currentController = "homeController";
            }
            
            if(!empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
                
                // minha validacao:
                if(! method_exists($currentController, $currentAction)) {
                    $currentAction = "index";
                }                
            } else {
                $currentAction = "index";
            } 
            if(count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = "homeController";
            $currentAction = "index";            
        }
        echo "currenteController: ".$currentController."<br/>";
        echo "currentAction: ".$currentAction."<br/>";
        echo "params: "; print_r($params);
        
        //require_once 'core/controller.php';
        $start = new $currentController();
        //$start->$currentAction();               
        call_user_func_array(array($start, $currentAction), $params);
    }
    
}