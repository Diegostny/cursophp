<h2>Página: "./views/home.php".</h2>
<br/>
<h2>Usuários do banco de dados dbteste:</h2>
<?php
foreach ($usuario as $u) {
    echo 'Nome: '.$u['nome'].' - Email: '.$u['email'].'<br/>';
}
?>
<br/>