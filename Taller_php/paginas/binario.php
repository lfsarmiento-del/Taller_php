<?php
require_once("../clases/Convertidor.php");

$res="";

if($_POST){
$obj=new Convertidor();
$res=$obj->binario($_POST["num"]);
}
?>

<form method="post">
<input type="number" name="num">
<button>Convertir</button>
</form>

<h2><?php echo $res; ?></h2>