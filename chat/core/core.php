<?php

class Core {

    public function run() {
        $currentController = "home_controller";
        $currentAction = 'index';
        $params = array();

        $request = filter_input(INPUT_SERVER, "REQUEST_URI", FILTER_SANITIZE_URL); // '/chat/home/index'        
        $request = explode("/chat/", $request); // ([0]=>'' [1]=>home/index)

        if (!empty($request)) {
            $request = explode("/", join("", $request)); // ([0]=>home [1]=>index)            
            if (strpos($request[0], "index") > -1) {
                array_shift($request);
            }
            if (!empty($request[0])) {
                if (file_exists("controllers/" . $request[0] . "_controller.php")) {
                    $currentController = $request[0] . "_controller";
                }
                array_shift($request);
                if (!empty($request[0])) {
                    if (method_exists($currentController, $request[0])) {
                        $currentAction = $request[0];
                        array_shift($request);
                    } else {
                        $currentAction = 'index'; // TODO: direcionar para um erro ao inves de index
                        array_shift($request);
                    }
                    if (count($request) > 0) {
                        $params = $request;
                    }
                }
            }
        }
        //echo "<br/>currenteController: ".$currentController;
        //echo "<br/>currentAction: ".$currentAction;
        //echo "<br/>params: "; print_r($params);

        $start = new $currentController();
        call_user_func_array(array($start, $currentAction), $params);
    }

}
