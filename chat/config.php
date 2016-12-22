<?php

require 'environment.php';

define("BASE_URL", "http://projetophp.pc/chat/");
global $config;
$config = array();

if(ENVIRONMENT == "development") {
    $config["dbname"] = "chat";
    $config["dbhost"] = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "";
} elseif (ENVIRONMENT == "production") {
    $config["dbname"] = "";
    $config["dbhost"] = "";
    $config["dbuser"] = "";
    $config["dbpass"] = "";
} else {
    echo "ENVIRONMENT não definido.";
}

?>