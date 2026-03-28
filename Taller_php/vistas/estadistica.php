<?php
require_once '../clases/Estadisticas.php';

$resultados = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numerosTexto = $_POST['numeros'] ?? '';
    $numerosArray = array_map('floatval', explode(',', $numerosTexto));
    
    $stats = new Estadisticas($numerosArray);
    $resultados = [
        'promedio' => $stats->promedio(),
        'mediana' => $stats->mediana(),
        'moda' => $stats->moda()
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="../css/styless.css">
</head>
<body>
    <div class="container">
        <h1>Promedio, Mediana y Moda</h1>
        <form method="POST">
            <input type="text" name="numeros" placeholder="Ej: 5, 8, 12, 7, 5" required>
            <button type="submit">Calcular</button>
        </form>
        
        <?php if ($resultados): ?>
            <div class="resultado">
                <h3>Promedio: <?php echo $resultados['promedio']; ?></h3>
                <h3>Mediana: <?php echo $resultados['mediana']; ?></h3>
                <h3>Moda: <?php echo $resultados['moda']; ?></h3>
            </div>
        <?php endif; ?>
        
        <a href="../index.php" class="btn-volver">Volver al menú</a>
    </div>
</body>
</html>
