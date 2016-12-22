<html>
    <head>
        <meta lang="BR" charset="UTF-8" />
        <meta id="viewport" name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?php echo BASE_URL  ?>assets/css/style.css" />
        <script type="text/javascript" src="<?php echo BASE_URL  ?>assets/js/jquery-3.1.1.min.js" ></script>
        <script type="text/javascript" src="<?php echo BASE_URL  ?>assets/js/script.js" ></script>
    </head>
    <body>
        <div class="environment" style="background-color: 
            <?php
                if(isset($_SESSION['area']) && $_SESSION['area'] == 'suporte') {
                    echo '#FF0000';
                } elseif (isset($_SESSION['area']) && $_SESSION['area'] == 'cliente') {
                    echo '#00FF00';
                } else {
                    echo '#000000';
                }   
            ?>" >
        </div>
        <div class="container">
            <?php
                $this->loadViewTemplate($viewName, $viewData); 
            ?>
        </div>
    </body>    
</html>