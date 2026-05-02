<?php
class Conjuntos{

public function union($A,$B){
return array_unique(array_merge($A,$B));
}

public function interseccion($A,$B){
return array_intersect($A,$B);
}

public function diferencia($A,$B){
return array_diff($A,$B);
}
}
?>