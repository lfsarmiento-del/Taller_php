<?php
require_once '../clases/FibonacciFactorial.php';

$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = intval($_POST['numero'] ?? 0);
    $operacion = $_POST['operacion'] ?? '';
    $calc = new FibonacciFactorial();
    
    if ($operacion === 'fibonacci') {
        $serie = $calc->fibonacci($numero);
        $resultado = "Serie Fibonacci: " . implode(', ', $serie);
    } elseif ($operacion === 'factorial') {
        $fact = $calc->factorial($numero);
        $resultado = "Factorial: $fact";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fibonacci o Factorial</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Fibonacci o Factorial</h1>
        <form method="POST">
            <input type="number" name="numero" placeholder="Ingrese un número" required>
            <select name="operacion" required>
                <option value="">Seleccione una operación</option>
                <option value="fibonacci">Fibonacci</option>
                <option value="factorial">Factorial</option>
            </select>
            <button type="submit">Calcular</button>
        </form>
        
        <?php if ($resultado): ?>
            <div class="resultado">
                <h3><?php echo $resultado; ?></h3>
            </div>
        <?php endif; ?>
        
        <a href="../index.php" class="btn-volver">Volver al menú</a>
    </div>
</body>
</html>