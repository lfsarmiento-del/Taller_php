<?php
require_once("../clases/Conjuntos.php");

$resultado="";

if($_POST){

$obj=new Conjuntos();

$A=explode(",",$_POST["A"]);
$B=explode(",",$_POST["B"]);

$resultado="
Union: ".implode(",",$obj->union($A,$B))."<br>
Intersección: ".implode(",",$obj->interseccion($A,$B))."<br>
A-B: ".implode(",",$obj->diferencia($A,$B))."<br>
B-A: ".implode(",",$obj->diferencia($B,$A));
}
?>

<form method="post">
<input name="A" placeholder="Conjunto A">
<input name="B" placeholder="Conjunto B">
<button>Calcular</button>
</form>

<h2><?php echo $resultado; ?></h2>