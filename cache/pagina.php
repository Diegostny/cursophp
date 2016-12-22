<html>
<head>
    <title>Teste de Cache</title>
</head>
<body>
    <div style="width:auto;margim:auto;background:gray;padding:10px;">
        <h2>Cabeçalho <?php echo rand(0,999);?></h2>

        <form method="POST">
            <input type="text" placeholder="E-mail"/>
            <br/><br/>
            <input type="password" placeholder="Senha"/>
            <br/><br/>
            <input type="submit" value="Enviar"/>
        </form>
    </div>
</body>
</html>