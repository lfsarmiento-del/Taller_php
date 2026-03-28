<?php
class Estadisticas {
    private $numeros;
    
    public function __construct($numeros) {
        $this->numeros = $numeros;
    }
    
    public function promedio() {
        if (count($this->numeros) == 0) return 0;
        return array_sum($this->numeros) / count($this->numeros);
    }
    
    public function mediana() {
        $n = count($this->numeros);
        if ($n == 0) return 0;
        
        sort($this->numeros);
        $medio = floor($n / 2);
        
        if ($n % 2 == 0) {
            return ($this->numeros[$medio - 1] + $this->numeros[$medio]) / 2;
        } else {
            return $this->numeros[$medio];
        }
    }
    
    public function moda() {
        if (count($this->numeros) == 0) return 0;
        
        $frecuencias = array_count_values($this->numeros);
        $maxFrecuencia = max($frecuencias);
        
        $modas = array_keys($frecuencias, $maxFrecuencia);
        
        if (count($modas) == count($this->numeros)) {
            return "No hay moda (todos los números son únicos)";
        }
        
        return implode(', ', $modas);
    }
}
?>