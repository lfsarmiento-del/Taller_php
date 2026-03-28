<?php
class FibonacciFactorial {
    
    public function fibonacci($n) {
        $serie = [];
        $a = 0;
        $b = 1;
        
        for ($i = 0; $i < $n; $i++) {
            $serie[] = $a;
            $temp = $a;
            $a = $b;
            $b = $temp + $b;
        }
        
        return $serie;
    }
    
    public function factorial($n) {
        $resultado = 1;
        for ($i = 1; $i <= $n; $i++) {
            $resultado *= $i;
        }
        return $resultado;
    }
}
?>