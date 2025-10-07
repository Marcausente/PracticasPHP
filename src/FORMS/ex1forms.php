<?php

$nombre = $_POST['nombre'] ?? ''; //El ?? hace que si no hay contenido se aplica ese valor
$apellido = $_POST['apellido'] ?? '';
$correo = $_POST['email'] ?? '';
$fecha = $_POST['fecha_nacimiento'] ?? '';


$edad = veredad($fecha);
$errores = validarcampos($nombre, $apellido, $correo, $edad, $fecha);
printresults($errores, $nombre, $apellido, $correo, $edad, $fecha);

function printresults($errores, $nombre, $apellido, $correo, $edad, $fecha){
  if(empty($errores)){ //Si no hay errores mostramos los datos
    echo "Nombre: " . $nombre . '<br><br>'. "Apellido: " . $apellido . '<br><br>' . "Correo: " . $correo . '<br><br>' . "Edad: " . $edad . '<br><br>' . "Fecha Nacimiento: " . $fecha;
  }else{
    for($i = 0; $i < count($errores); $i++){ //Continua mientras $i sea menor a la cantidad de errores que tiene el array
      echo $errores[$i];
    }
  }
}

function veredad($fecha){
  $fechaNacimiento = new DateTime($fecha); // Convertir string a DateTime
  $hoy = new DateTime();
  $edad = $hoy->diff($fechaNacimiento)->y;
  return $edad;
}

function validarcampos($nombre, $apellido, $correo, $edad, $fecha){

$errores = [];

if (empty($nombre) || empty($apellido) || empty($correo) || empty($fecha)){
  $errores[] = "Debes rellenar los campos" . "<br><br>";
}

if (!str_contains($correo, '@')){
  $errores[] = "El correo no es valido" . "<br><br>";
}

if ($edad < 18){
  $errores[] = "Debes ser mayor de edad" . "<br><br>";
} //USAMOS IF INDEPENDIENTES, CON ELSE IF SOLO SE PUEDE EJECUTAR UNA CONDICION

return $errores;

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
