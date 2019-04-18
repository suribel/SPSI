<?php

require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader,[ ]);

require 'db_connect.php';

if (!$bd) {
  die ('no abrido jaja');
}

$url = $_GET['event'];

if(!$query = mysqli_prepare($bd, "SELECT * FROM eventos WHERE titulo=?")){ // Si hay fallo al preparar la sentencia
  mysqli_error($bd);
  die ('fallo sentencia');
}
else { // Si no hay fallo
  mysqli_stmt_bind_param($query, 's', $url);
  if(!mysqli_stmt_execute($query)){ // Fallo al ejecutar la inserción
    mysqli_error($bd);
    die ('fallo ejecucion');
  }
  else { // Si no hay fallo
    $resultado = mysqli_stmt_get_result($query);
    $fila = mysqli_fetch_array ($resultado);
    $titulo = $fila[0];
    $organizador = $fila[1];
    $fecha = $fila[2];

    $seleccion2 = "SELECT * FROM comentarios WHERE titulo_com= '{$titulo}' " ;
    $resultado2 = mysqli_query ($bd, $seleccion2);

    $comentarios = mysqli_fetch_all($resultado2, MYSQLI_ASSOC);

    mysqli_close ($bd);

    echo  $twig ->render('Evento/eventos.html',
              ['titulo' => $titulo, 'organizador' => $organizador, 'fecha' => $fecha, 'comentarios' => $comentarios]);


  }
}






?>
