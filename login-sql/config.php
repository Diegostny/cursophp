<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $dsn = "mysql:dbname=dbteste;host=127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Conexão com o dbteste bem sucedida.<br/>';
        
    } catch (Exception $ex) {
        echo 'Erro: '.$ex->getMessage();
    }    
?>