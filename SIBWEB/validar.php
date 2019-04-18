<?php


if(($_POST)){ // Evitar acceder sin pasar por el formulario
    $url = getallheaders()['Referer'];
    $titulo = $_POST['titulo_evento'];
    $nombre = $_POST['nombre-form'];
    $email = $_POST['email-form'];
    $comentario = $_POST['coment-form'];
    $date = date("Y-m-d H:i:s");
    $ip = getRealIP();

    require 'db_connect.php';

    if (!$bd) {
      die ('no abrido jaja');
    }
    if(!$query = mysqli_prepare($bd, "INSERT INTO comentarios (titulo_com, ip, nombre, correo, fechahora, texto) values(?,?,?,?,?,?)")){ // Si hay fallo al preparar la sentencia
      mysqli_error($bd);
      die ('fallo sentencia');
    }
    else { // Si no hay fallo
      mysqli_stmt_bind_param($query, 'ssssss', $titulo, $ip, $nombre, $email, $date, $comentario);
      if(!mysqli_stmt_execute($query)){ // Fallo al ejecutar la inserción
        mysqli_error($bd);
        die ('fallo ejecucion');
      }
      else { // Si no hay fallo
        // Redirigir a la página
        header("Location: ".$url);
        die();
      }
    }
  }
  else { // No se recibe la variable post
    echo file_get_contents('templates/accessdenied.html', true, null);
  }

//FUNCION SACADA DE http://blog.unijimpe.net/obtener-direccion-ip-con-php/
function getRealIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
    return $_SERVER['HTTP_CLIENT_IP'];

  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    return $_SERVER['HTTP_X_FORWARDED_FOR'];

  return $_SERVER['REMOTE_ADDR'];
}

  ?>
