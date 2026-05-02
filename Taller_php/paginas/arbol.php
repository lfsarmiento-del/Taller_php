<?php
require_once("../clases/Arbol.php");

$res="";

if($_POST){

$obj=new Arbol();

$pre=explode(",",$_POST["pre"]);
$in=explode(",",$_POST["in"]);

$res=print_r($obj->construir($pre,$in),true);
}
?>

<form method="post">
<input name="pre" placeholder="Preorden">
<input name="in" placeholder="Inorden">
<button>Construir</button>
</form>

<pre><?php echo $res; ?></pre>