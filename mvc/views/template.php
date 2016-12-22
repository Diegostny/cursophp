<!DOCTYPE html>
<html>
    <head>
        <meta lang="pt_BR" charset="UTF-8"/>
        <link href="<?php echo BASE_URL;?>/assets/css/style.css" rel="stylesheet" />
        <title>Meu site</title>        
    </head>
    <body>
        <header>
            Meu header.
        </header>
        <main>
        <?php
            $this->loadViewTemplate($viewName, $viewData);
        ?>
        </main>
        <footer>
            Meu footer.
        </footer>
    </body>
</html>