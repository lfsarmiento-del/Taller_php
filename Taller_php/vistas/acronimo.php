<?php
require_once '../clases/Acronimo.php';

$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $frase = $_POST['frase'] ?? '';
    $acronimo = new Acronimo($frase);
    $resultado = $acronimo->convertirAcronimo();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Acrónimos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Convertir frase en Acrónimo</h1>
        <form method="POST">
            <input type="text" name="frase" placeholder="Ingrese una frase" required>
            <button type="submit">Convertir</button>
        </form>
        
        <?php if ($resultado): ?>
            <div class="resultado">
                <h3>Acrónimo: <?php echo $resultado; ?></h3>
            </div>
        <?php endif; ?>
        
        <a href="../index.php" class="btn-volver">Volver al menú</a>
    </div>
</body>
</html>