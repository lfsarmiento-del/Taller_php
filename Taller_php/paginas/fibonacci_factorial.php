<?php
require_once("../clases/Matematicas.php");

$resultado="";

if($_POST){

$obj=new Matematicas();
$n=$_POST["numero"];

if($_POST["opcion"]=="fib")
$resultado=$obj->fibonacci($n);
else
$resultado=$obj->factorial($n);
}
?>

<form method="post">
<input type="number" name="numero">
<select name="opcion">
<option value="fib">Fibonacci</option>
<option value="fac">Factorial</option>
</select>
<button>Calcular</button>
</form>

<h2><?php echo $resultado; ?></h2>