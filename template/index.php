<?php
require 'template.php';

$array = array (
    'titulo' => 'Título da página',
    'nome' =>  'fulano' );

$tpl = new Template('template.phtml');
$tpl->render($array);
