<?php

session_start(); // Si vamos a utilizar sesiones siempre la iniciamos antes
$correctuser = "Milena";
$correctpassword = "frutisha";
$acceso = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $user = $_POST["user"];
  $password = $_POST["password"];

$acceso = coincidencia($correctuser, $correctpassword, $user, $password, $acceso);


  if(!empty($user) && !empty($password)){ //El isset define si no es null o si esta definida, para ver si esta vacia usamos empty
    if ($acceso == true){
       $_SESSION["user_id"] = 1;
      echo "La contraseña y el usuario coinciden, bienvenido/a " . $user . "<br> <br>";
      echo "Tu ID de sesion es: " . session_id();
    }else{
      echo "La contraseña y el usuario no coinciden";
    }
  }else{
    echo "Debes introducir todos los valores";
  }
}else{
  echo "Error al verificar el formulario";
}

function coincidencia($correctuser, $correctpassword, $user, $password, $acceso){
  if($user == $correctuser && $password == $correctpassword){
    $acceso = true;
  }else{
    $acceso = false;
  }
  return $acceso;
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
        <label for="nombre">Username</label>
        <input type="text" id="user" name="user" placeholder="Username" autocomplete="given-name" required />
      </div>

      <div class="field">
        <label for="apellido">Password</label>
        <input type="password" id="password" name="password" placeholder="password" autocomplete="family-name" required />
      </div>

      <button type="submit">Enviar</button>
    </form>
  </body>
</html>
