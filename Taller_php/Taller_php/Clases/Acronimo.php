<?php
class Acronimo{

public function generar($frase){

$frase=str_replace("-", " ", $frase);
$frase=preg_replace("/[^a-zA-Z ]/","",$frase);

$palabras=explode(" ",$frase);

$acr="";

foreach($palabras as $p){
if($p!=""){
$acr.=strtoupper($p[0]);
}
}

return $acr;
}
}
?>