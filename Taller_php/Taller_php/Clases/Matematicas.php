<?php
class Matematicas{

public function fibonacci($n){
$serie=[0,1];

for($i=2;$i<$n;$i++){
$serie[$i]=$serie[$i-1]+$serie[$i-2];
}

return implode(", ",array_slice($serie,0,$n));
}

public function factorial($n){
$res=1;
for($i=1;$i<=$n;$i++){
$res*=$i;
}
return $res;
}
}
?>