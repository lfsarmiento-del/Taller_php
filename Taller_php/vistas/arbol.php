<?php
require_once '../clases/ArbolBinario.php';

$htmlArbol = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $preorden = array_map('trim', explode(',', $_POST['preorden'] ?? ''));
    $inorden = array_map('trim', explode(',', $_POST['inorden'] ?? ''));
    
    $arbol = new ArbolBinario();
    $arbol->construirDesdePreordenInorden($preorden, $inorden);
    $htmlArbol = $arbol->generarHTMLArbol();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario</title>
    <link rel="stylesheet" href="../css/styless.css">
    <style>
        .nodo {
            display: inline-block;
            text-align: center;
        }
        .valor {
            border: 2px solid #333;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            line-height: 36px;
            margin: 5px;
            background: #4CAF50;
            color: white;
            font-weight: bold;
        }
        .hijos {
            display: flex;
            justify-content: center;
        }
        .hijo {
            margin: 0 10px;
        }
        .arbol-container {
            overflow-x: auto;
            padding: 20px;
            background: #f4f4f4;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Construir Árbol Binario</h1>
        <form method="POST">
            <input type="text" name="preorden" placeholder="Preorden: A,B,D,E,C" required>
            <input type="text" name="inorden" placeholder="Inorden: D,B,E,A,C" required>
            <button type="submit">Construir Árbol</button>
        </form>
        
        <?php if ($htmlArbol): ?>
            <div class="resultado">
                <h3>Árbol Binario:</h3>
                <div class="arbol-container">
                    <?php echo $htmlArbol; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <a href="../index.php" class="btn-volver">Volver al menú</a>
    </div>
</body>
</html>
