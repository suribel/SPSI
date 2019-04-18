<?php

$bd =  mysqli_connect("localhost", "root", "", "festivales");

$seleccion = "SELECT * FROM prohibidas";
$resultado = mysqli_query ($bd, $seleccion);

while ($palabra = mysqli_fetch_assoc($resultado)) {
  $palabras[] = $palabra;
}

mysqli_close ($bd);

echo json_encode($palabras);


?>
