<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$senha = null;
if(!empty(filter_input(INPUT_POST, 'senha'))) {
    $senha = md5(filter_input(INPUT_POST, 'senha'));
}
//echo 'Nome: '.$nome."<br/>"."Email: ".$email."<br/>"."Senha: ".$senha."<br/>";

if($nome && $email && $senha) {    
    $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
    $pdo->query($sql);
    echo '<h1>Cadastro realizado com sucesso.</h1>';
    echo '<a href="index.php">Voltar</a>';
    exit;
} if($nome || $email || $senha) {
    echo '<h2 align="center"><mark>Preencha todos os campos.</h2>';
    //header("Location: index.php");
}
?>

<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8" lang="BR">
        <title>Adicionar Usuário</title>
    </head>
    <body>
        <table align="center" >
            <tr><td><h1>Adicionar Usuário</h1><td><tr/>
            <tr><td>
                    <form method="POST">
                    Nome:<br/>
                    <input type="text" name="nome" value="Nome completo" /><br/><br/>
                    Email:<br/>
                    <input type="email" name="email" value="Seu email" /><br/><br/>
                    Senha:<br/>
                    <input type="password" name="senha" /><br/><br/>
                    <input type="submit" value="Cadastrar" />
                    </form>
            </td></tr>
        </table>
    </body>
</html>

