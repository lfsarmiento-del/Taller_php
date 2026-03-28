<?php
require_once '../clases/Conjuntos.php';

$resultados = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conjuntoA = array_map('intval', explode(',', $_POST['conjuntoA'] ?? ''));
    $conjuntoB = array_map('intval', explode(',', $_POST['conjuntoB'] ?? ''));
    
    $conjuntos = new Conjuntos($conjuntoA, $conjuntoB);
    $resultados = [
        'union' => implode(', ', $conjuntos->union()),
        'interseccion' => implode(', ', $conjuntos->interseccion()),
        'diferenciaAB' => implode(', ', $conjuntos->diferenciaAB()),
        'diferenciaBA' => implode(', ', $conjuntos->diferenciaBA())
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones con Conjuntos</title>
    <link rel="stylesheet" href="../css/styless.css">
</head>
<body>
    <div class="container">
        <h1>Operaciones con Conjuntos</h1>
        <form method="POST">
            <input type="text" name="conjuntoA" placeholder="Conjunto A: 1,2,3,4,5" required>
            <input type="text" name="conjuntoB" placeholder="Conjunto B: 4,5,6,7,8" required>
            <button type="submit">Calcular</button>
        </form>
        
        <?php if ($resultados): ?>
            <div class="resultado">
                <h3>Unión: <?php echo $resultados['union']; ?></h3>
                <h3>Intersección: <?php echo $resultados['interseccion']; ?></h3>
                <h3>A - B: <?php echo $resultados['diferenciaAB']; ?></h3>
                <h3>B - A: <?php echo $resultados['diferenciaBA']; ?></h3>
            </div>
        <?php endif; ?>
        
        <a href="../index.php" class="btn-volver">Volver al menú</a>
    </div>
</body>
</html>
