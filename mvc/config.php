<?php

define("BASE_URL", "http://projetophp.pc/mvc");

require 'environment.php';
global $config;
$config = array();

if(ENVIRONMENT == 'development') {
    $config['dbname'] = 'dbteste';
    $config['host']   = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';    
} else {
    $config['dbname'] = 'outro-producao';
    $config['host']   = 'ip';
    $config['dbuser'] = 'user';
    $config['dbpass'] = 'pass';    
}
?>