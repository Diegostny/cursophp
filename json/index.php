<?php
$json = file_get_contents("http://www.correiodoestado.com.br/climatempo/json");
$json = json_decode($json);
// forma retornada:
// stdClass Object ( [previsao] => Array ( [0] => stdClass Object ( [codigo] => 212 [cidade] => Campo Grande [uf] => MS [baixa] => 21 [alta] => 29 [ico] => 4 [frase] => Sol com muitas nuvens durante o dia. Períodos de nublado, com chuva a qualquer hora. [data] => 11/12 Dom [dia_mes] => 11/12 [dia_semana] => Dom [selecionada] => 1 )

$obj = new stdClass();
$obj->codigo = 111;
$obj->cidade = "Sao Leopoldo";
$obj->uf = "RS";
$obj->baixa = 12;
$obj->alta = 32;
$obj->ico = 3;
$obj->frase = "Tempo bom";
$obj->data = "hoje";
$obj->dia_mes = "Janeiro";
$obj->dia_semana = "Domingo";
$obj->selecionada = 1;

$json->previsao[] = $obj;

echo 'Cidades retornadas: '.count($json->previsao);
echo '<br/>';
//print_r($json);
foreach ($json->previsao as $item) {
    echo "<br/>Cidade: ".$item->cidade.
        " -- Baixa: ".$item->baixa." Alta: ".$item->alta."<br/>".
        "( ".$item->frase." )<br/>";
}

echo json_encode($json);
