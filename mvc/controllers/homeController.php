<?php
class homeController extends Controller {
    
    public function index() {
       $usuario = new Usuario();
       /*
       $usuario->setName("Diego");
       $usuario->setSobrenome("Sebastiany");       
       $dados = array('nome' => $usuario->getName(),
                    'sobrenome' => $usuario->getSobrenome());
       */
       
       $dados['usuario'] = $usuario->getAllUsuarios(); 
       // A chave 'usuario' transforma-se em uma variavel
       // em 'Controller.php->loadViewTemplate()' para ser
       // utilizada no view home.php
       
       $this->loadTemplate('home', $dados);       
    }
    
    public function sobre() {
        $dados = array();
        $this->loadTemplate('sobre', $dados);
    }
    
    /*
    public function sobre($p) {
        //$dados = array();
        $dados[] = $p;
        $this->loadTemplate('sobre', $dados);
    }
    */
}
