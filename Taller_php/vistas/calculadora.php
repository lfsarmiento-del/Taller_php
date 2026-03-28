<?php
session_start();
require_once '../clases/Calculadora.php';

$calculadora = new Calculadora();
$resultado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['borrar'])) {
        $calculadora->borrarHistorial();
        $resultado = "Historial borrado";
    } else {
        $num1 = floatval($_POST['num1'] ?? 0);
        $num2 = floatval($_POST['num2'] ?? 0);
        $operacion = $_POST['operacion'] ?? '';
        
        switch ($operacion) {
            case 'suma':
                $resultado = $calculadora->sumar($num1, $num2);
                break;
            case 'resta':
                $resultado = $calculadora->restar($num1, $num2);
                break;
            case 'multiplicacion':
                $resultado = $calculadora->multiplicar($num1, $num2);
                break;
            case 'division':
                $resultado = $calculadora->dividir($num1, $num2);
                break;
            case 'porcentaje':
                $resultado = $calculadora->porcentaje($num1, $num2);
                break;
        }
    }
}

$historial = $calculadora->getHistorial();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" href="../css/styless.css">
</head>
<body>
    <div class="container">
        <h1>Calculadora</h1>
        
        <div class="calculadora">
            <form method="POST">
                <input type="number" name="num1" step="any" placeholder="Número 1" required>
                <select name="operacion" required>
                    <option value="suma">+</option>
                    <option value="resta">-</option>
                    <option value="multiplicacion">×</option>
                    <option value="division">÷</option>
                    <option value="porcentaje">%</option>
                </select>
                <input type="number" name="num2" step="any" placeholder="Número 2" required>
                <button type="submit">Calcular</button>
            </form>
            
            <?php if ($resultado): ?>
                <div class="resultado">
                    <h3>Resultado: <?php echo $resultado; ?></h3>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <button type="submit" name="borrar" class="btn-borrar">Borrar Historial</button>
            </form>
        </div>
        
        <div class="historial">
            <h2>Historial de Operaciones</h2>
            <?php if (empty($historial)): ?>
                <p>No hay operaciones registradas</p>
            <?php else: ?>
                <ul>
                    <?php foreach (array_reverse($historial) as $item): ?>
                        <li><?php echo $item['operacion']; ?> - <?php echo $item['fecha']; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        
        <a href="../index.php" class="btn-volver">Volver al menú</a>
    </div>
</body>
</html>
