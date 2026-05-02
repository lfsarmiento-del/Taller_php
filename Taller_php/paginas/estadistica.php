<?php

$resultado="";

if($_POST){

$nums = array_map(
    'floatval',
    explode(",", $_POST["numeros"])
);

$prom = array_sum($nums) / count($nums);

sort($nums);
$media = $nums[(int)floor(count($nums)/2)];

$valores = array_count_values($nums);
$moda = array_search(max($valores), $valores);

$resultado="
Promedio: $prom <br>
Media: $media <br>
Moda: $moda
";
}
?>

<form method="post">
<input name="numeros" placeholder="1,2,3,4,5">
<button>Calcular</button>
</form>

<h2><?php echo $resultado; ?></h2> 
