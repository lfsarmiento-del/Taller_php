<?php
class Conjuntos {
    private $conjuntoA;
    private $conjuntoB;
    
    public function __construct($a, $b) {
        $this->conjuntoA = $a;
        $this->conjuntoB = $b;
    }
    
    public function union() {
        return array_values(array_unique(array_merge($this->conjuntoA, $this->conjuntoB)));
    }
    
    public function interseccion() {
        return array_values(array_intersect($this->conjuntoA, $this->conjuntoB));
    }
    
    public function diferenciaAB() {
        return array_values(array_diff($this->conjuntoA, $this->conjuntoB));
    }
    
    public function diferenciaBA() {
        return array_values(array_diff($this->conjuntoB, $this->conjuntoA));
    }
}
?>