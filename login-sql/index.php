<?php
    require 'config.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Cadastro de Usuários</title>
    </head>
    <body>
        <header>            
            <nav>  
                <h1><center>Cadastro de Usuários</center></h1><br/>
                <a href="adicionar.php"><center width="80%">Adicionar Usuário</center></a>
                <hr>
            </nav>
        </header>
        <table border="1" width="100%">
            <tr>
                <td width="40%">Nome</td>
                <td width="40%">Email</td>
                <td>Opções</td>
            </tr>        
            <?php
            // put your code here
                $sql = "SELECT * FROM usuarios";
                $sql = $pdo->query($sql);
                if($sql->rowCount() > 0) {
                    foreach($sql->fetchAll() as $usuario) {
                            echo '<tr>';
                            echo '<td>'.$usuario['nome'].'</td>';
                            echo '<td>'.$usuario['email'].'</td>';
                            echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a> - '
                                    .'<a href="excluir.php?id='.$usuario['id'].'">Excluir</a></td>'; 
                            echo '</tr>';
                    }                    
                }
            ?>
        </table>        
    </body>
</html>