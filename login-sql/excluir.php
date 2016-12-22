<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'config.php';

$id = filter_input(INPUT_GET, 'id');
if($id) {
    $sql = "DELETE FROM usuarios WHERE id = '$id'";
    $pdo->query($sql);
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>