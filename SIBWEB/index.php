<?php
require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader,[ ]);

require 'db_connect.php';

if (!$bd) {
  die ('no abrido jaja');
}

$seleccion = "SELECT * FROM eventos";
$resultado = mysqli_query ($bd, $seleccion);

$eventos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);




echo  $twig ->render('Principal/portada.html',
          ['eventos' => $eventos]);

mysqli_close ($bd);

?>
