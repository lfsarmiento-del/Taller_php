<?php
class Acronimo {
    private $frase;
    
    public function __construct($frase) {
        $this->frase = $frase;
    }
    
    public function convertirAcronimo() {
        $texto = str_replace('-', ' ', $this->frase);
        

        $texto = preg_replace('/[^a-zA-Z\s]/', '', $texto);
        $palabras = explode(' ', $texto);
        $acronimo = '';
        foreach ($palabras as $palabra) {
            if (!empty($palabra)) {
                $acronimo .= strtoupper($palabra[0]);
            }
        }
        
        return $acronimo;
    }
}
?>