<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){ //Importante ponerlo verifica si se ha utilizado post para recibir los datos
  if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["fecha_nacimiento"])){ //Comprobamos que se hayan llenado los campos

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $edad = 0;
    $errores = [];


    $edad = veredad($fecha_nacimiento);
    $errores = detectarerrores($nombre, $apellido, $email, $edad);
    printresults($errores);


  }else{
  echo "Debes rellenar todos los campos";
  }
}

    function printresults($errores){
      if (empty($errores)){
        echo "Formulario rellenado completamente";
      }else{
        for($i = 0; $i < count($errores); $i++){
          echo $errores[$i];
        }
      }
    }

    function veredad($fecha_nacimiento){
      $hoy = new DateTime();
      $edad = $hoy->diff($fecha_nacimiento);

      return $edad;
    }

  function detectarerrores($nombre, $apellido, $email, $edad){
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores [] = "El email no es valido"  . "<br><br>";
    }

    if (empty($nombre) || empty($apellido) || empty($correo) || empty($fecha)){
  $errores[] = "Debes rellenar los campos" . "<br><br>";
  }

    if($edad < 18){
    $errores [] = "Tienes que ser mayor de edad" . "<br><br>";
    }

}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario - Datos personales</title>
  </head>
  <body>
    <h1>Formulario de datos personales</h1>
    <form method="post" action="#" novalidate>
      <div class="field">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" autocomplete="given-name" required />
      </div>

      <div class="field">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" autocomplete="family-name" required />
      </div>

      <div class="field">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com" autocomplete="email" inputmode="email" required />
      </div>

      <div class="field">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required />
      </div>

      <button type="submit">Enviar</button>
    </form>
  </body>
</html>
