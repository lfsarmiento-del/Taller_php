<?php
class Arbol{

public function construir($pre,$in){

if(empty($pre)) return [];

$raiz=$pre[0];
$pos=array_search($raiz,$in);

$izq=$this->construir(
array_slice($pre,1,$pos),
array_slice($in,0,$pos)
);

$der=$this->construir(
array_slice($pre,$pos+1),
array_slice($in,$pos+1)
);

return [$raiz,$izq,$der];
}
}
?>