<?php
	$nome = $_POST['nome'];
	$senha = md5($_POST['senha']); //1234
	
	$resultado = array("status" => false);
    if($nome == "Diego" && $senha == "81dc9bdb52d04dc20036dbd8313ed055"){
        $resultado["status"] = true;
    }
    
    echo json_encode($resultado);
?>