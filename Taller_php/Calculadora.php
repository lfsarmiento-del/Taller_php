<?php
class Calculadora {
    private $historial = [];
    private $archivoHistorial = 'historial.json';
    
    public function __construct() {
        $this->cargarHistorial();
    }
    
    public function sumar($a, $b) {
        $resultado = $a + $b;
        $this->guardarOperacion("$a + $b = $resultado");
        return $resultado;
    }
    
    public function restar($a, $b) {
        $resultado = $a - $b;
        $this->guardarOperacion("$a - $b = $resultado");
        return $resultado;
    }
    
    public function multiplicar($a, $b) {
        $resultado = $a * $b;
        $this->guardarOperacion("$a × $b = $resultado");
        return $resultado;
    }
    
    public function dividir($a, $b) {
        if ($b == 0) {
            return "Error: División entre cero";
        }
        $resultado = $a / $b;
        $this->guardarOperacion("$a ÷ $b = $resultado");
        return $resultado;
    }
    
    public function porcentaje($a, $b) {
        $resultado = ($a * $b) / 100;
        $this->guardarOperacion("$b% de $a = $resultado");
        return $resultado;
    }
    
    private function guardarOperacion($operacion) {
        $this->historial[] = [
            'operacion' => $operacion,
            'fecha' => date('Y-m-d H:i:s')
        ];
        file_put_contents($this->archivoHistorial, json_encode($this->historial));
    }
    
    private function cargarHistorial() {
        if (file_exists($this->archivoHistorial)) {
            $this->historial = json_decode(file_get_contents($this->archivoHistorial), true);
            if (!is_array($this->historial)) {
                $this->historial = [];
            }
        }
    }
    
    public function getHistorial() {
        return $this->historial;
    }
    
    public function borrarHistorial() {
        $this->historial = [];
        file_put_contents($this->archivoHistorial, json_encode([]));
    }
}
?>