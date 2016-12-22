<?php
/* 
 * Cache Básico
 * Salva alguns dados (variáveis) no arquivo cache
 */
/***********************************************************
require 'cacheBasico.php';

$content = new CacheBasico();
//$content->setVar('nome', 'Diego');
//$content->setVar('idade', 31);
//$content->setVar('nome2', 'Luana');
//$content->setVar('idade2', 28);

echo 'Meu nome: '.$content->getVar('nome').' Idade: '.$content->getVar('idade').'<br/>';
echo 'Meu nome: '.$content->getVar('nome2').' Idade: '.$content->getVar('idade2').'<br/>';
***********************************************************/

/* 
 * Cache Intermediário
 * Salva toda a página no arquivo cache
 */
/***********************************************************
if(file_exists("cache.cache")) {
    require 'cache.cache';    
} else {
    // tudo dentro de 'ob' é salvo em memoria.
    ob_start();
    require 'pagina.php';
    $html = ob_get_contents();
    ob_end_clean();    
    file_put_contents("cache.cache", $html);
  
    echo $html;
}
***********************************************************/

/* 
 * Cache Avançado
 * Salva toda a página no arquivo cache temporário
 */
///***********************************************************
// http://projetophp.pc/cache/?p=pagina2
$p = 'pagina';
if(isset($_GET['p']) && !empty($_GET['p']) && file_exists($_GET['p'].'.php')) {
    $p = $_GET['p'];
}

if(file_exists($p.'.cache') && is_valido($p.'.cache')) {
    require $p.'.cache';    
} else {
    // tudo dentro de 'ob' é salvo em memoria.
    ob_start();
    require $p.'.php';
    $html = ob_get_contents();
    ob_end_clean();    
    file_put_contents($p.'.cache', $html);
  
    echo $html;
}

function is_valido($cache) {
    $duracao = 10;
    $ultima_modificacao = filectime($cache);
    $tempo = time() - $ultima_modificacao;
    
    if($tempo > $duracao) {
        return false;
    } else {
        return true;
    }
}

//***********************************************************/
?>