<?php
require_once("../clases/Acronimo.php");

$resultado="";

if($_POST){
$obj=new Acronimo ();
$resultado=$obj->generar($_POST["frase"]);
}
?>

<form method="post">
<input name="frase" placeholder="Ingrese frase">
<button>Convertir</button>
</form>

<h2><?php echo $resultado; ?></h2>