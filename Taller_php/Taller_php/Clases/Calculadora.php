<?php
class Calculadora{

public function operar($a,$b,$op){

switch($op){

case "+": return $a+$b;
case "-": return $a-$b;
case "*": return $a*$b;
case "/": return $b!=0?$a/$b:"Error";
case "%": return ($a*$b)/100;
}
}
}
?>