<?php
	$x = intval($_GET['x']);
	$y = intval($_GET['y']);
	$cidade = $_GET['cidade'];
    $uf = $_GET['estado'];
	
	$soma = $x + $y;
	$str = $cidade."/".$uf." tem ".$soma." anos de idade.";
	echo $str;
?>