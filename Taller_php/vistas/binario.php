<?php
require_once '../clases/Binario.php';

$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = intval($_POST['numero'] ?? 0);
    $binario = new Binario($numero);
    $resultado = $binario->convertir();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor a Binario</title>
    <link rel="stylesheet" href="../css/styless.css">
</head>
<body>
    <div class="container">
        <h1>Convertir número a Binario</h1>
        <form method="POST">
            <input type="number" name="numero" placeholder="Ingrese un número entero" required>
            <button type="submit">Convertir</button>
        </form>
        
        <?php if ($resultado): ?>
            <div class="resultado">
                <h3>Binario: <?php echo $resultado; ?></h3>
            </div>
        <?php endif; ?>
        
        <a href="../index.php" class="btn-volver">Volver al menú</a>
    </div>
</body>
</html>
