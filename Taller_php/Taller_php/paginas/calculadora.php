<?php
session_start();
require_once("../clases/Calculadora.php");

if(!isset($_SESSION["historial"]))
$_SESSION["historial"]=[];

if(isset($_POST["borrar"]))
$_SESSION["historial"]=[];

$res="";

if(isset($_POST["calcular"])){

$obj=new Calculadora();

$a=$_POST["a"];
$b=$_POST["b"];
$op=$_POST["op"];

$res=$obj->operar($a,$b,$op);

$_SESSION["historial"][]="$a $op $b = $res";
}
?>

<form method="post">
<input name="a">
<select name="op">
<option>+</option>
<option>-</option>
<option>*</option>
<option>/</option>
<option>%</option>
</select>
<input name="b">

<button name="calcular">Calcular</button>
<button name="borrar">Borrar Historial</button>
</form>

<h2>Resultado: <?php echo $res; ?></h2>

<h3>Historial</h3>

<?php
foreach($_SESSION["historial"] as $h)
echo $h."<br>";
?>