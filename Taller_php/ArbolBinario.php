<?php
class Nodo {
    public $valor;
    public $izquierdo;
    public $derecho;
    
    public function __construct($valor) {
        $this->valor = $valor;
        $this->izquierdo = null;
        $this->derecho = null;
    }
}

class ArbolBinario {
    private $raiz;
    
    public function construirDesdePreordenInorden($preorden, $inorden) {
        if (empty($preorden) || empty($inorden)) {
            return null;
        }
        
        $this->raiz = $this->construirArbol($preorden, $inorden);
        return $this->raiz;
    }
    
    private function construirArbol($preorden, $inorden) {
        if (empty($preorden) || empty($inorden)) {
            return null;
        }
        
        $raizValor = $preorden[0];
        $raiz = new Nodo($raizValor);
        
        $indiceRaiz = array_search($raizValor, $inorden);
        
        $inordenIzquierdo = array_slice($inorden, 0, $indiceRaiz);
        $inordenDerecho = array_slice($inorden, $indiceRaiz + 1);
        
        $preordenIzquierdo = array_slice($preorden, 1, count($inordenIzquierdo));
        $preordenDerecho = array_slice($preorden, 1 + count($inordenIzquierdo));
        
        $raiz->izquierdo = $this->construirArbol($preordenIzquierdo, $inordenIzquierdo);
        $raiz->derecho = $this->construirArbol($preordenDerecho, $inordenDerecho);
        
        return $raiz;
    }
    
    public function generarHTMLArbol($nodo = null) {
        if ($nodo === null) {
            $nodo = $this->raiz;
        }
        
        if ($nodo === null) {
            return '';
        }
        
        $html = '<div class="nodo">';
        $html .= '<div class="valor">' . $nodo->valor . '</div>';
        
        if ($nodo->izquierdo !== null || $nodo->derecho !== null) {
            $html .= '<div class="hijos">';
            $html .= '<div class="hijo izquierdo">' . $this->generarHTMLArbol($nodo->izquierdo) . '</div>';
            $html .= '<div class="hijo derecho">' . $this->generarHTMLArbol($nodo->derecho) . '</div>';
            $html .= '</div>';
        }
        
        $html .= '</div>';
        return $html;
    }
}
?>