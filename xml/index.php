<?php
//$xml = simplexml_load_file('exemplo.xml');
//echo '<br/>OrderID: '.$xml->orderperson;
//echo '<br/>Address: '.$xml->shipto->address;
//echo '<br/>';

$xml = simplexml_load_file('ondas.xml');
echo '<br/>Nome: '.$xml->nome;
echo '<br/>Dia: '.$xml->manha->dia;
echo '<br/>';

//print_r($xml);

// criar um xml de um array:
$data = array('nome' => 'Diego',
              'sobrenome' => 'Sebastiany',
              'idade' => 31,
              'conhecimentos' => array(
                  'php', 'csharp', 'shell script')
              );

$xml_data = new SimpleXMLElement('<data/>');
array_to_xml($data, $xml_data);
$result = $xml_data->asXML();
echo $result;


function array_to_xml( $data, &$xml_data ) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $key = 'item'.$key;
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
        	if( is_numeric($key) ){
                $key = 'item'.$key;
            }
            $xml_data->addChild($key, htmlspecialchars($value));
        }
     }
}