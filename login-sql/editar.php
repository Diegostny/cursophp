<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'config.php';

$id = filter_input(INPUT_GET, 'id');
//echo "<br/>"."ID: ".$id;
//if(isset($_GET['id']) && empty($_GET['id']) == false) {
//	$id = addslashes($_GET['id']);
//}
/*
if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);

	$sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: index.php");
} */
if($id) {
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $row = $pdo->query($sql);
    if($row->rowcount() > 0) {
        $user = $row->fetch();
    } else {
        header("Location: index.php");
    }
}

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$senha = null;
if(!empty(filter_input(INPUT_POST, 'senha'))) {
    $senha = md5(filter_input(INPUT_POST, 'senha'));
}

if($nome && $email) {
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $sql = $pdo->query($sql);
    $user = $sql->fetch();
    if($user['senha'] == $senha) {
        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";
        $pdo->query($sql);
        echo "Dados atualizados"."<br/>"."<a href='index.php'>Voltar</a>";        
        exit;        
    } else {
        echo "Você informou a senha errada. Tente novamente.";
    }
}


?>

<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8" lang="BR">
        <title>Alterar Cadastro</title>
    </head>
    <body>
        <table align="center" >
            <tr><td><h1>Editar Cadastro</h1><td><tr/>
            <tr><td>
                    <form method="POST">
                    Nome:<br/>
                    <input type="text" name="nome" value="<?php echo $user['nome']; ?>" /><br/><br/>
                    Email:<br/>
                    <input type="email" name="email" value="<?php echo $user['email']; ?>" /><br/><br/>
                    Senha:<br/>
                    <input type="password" name="senha" /><br/><br/>
                    <input type="submit" value="Alterar" />
                    <a href="index.php">Voltar</a>
                    </form>
            </td></tr>
        </table>
    </body>
</html>