<?php

$user = $_POST['user'] ?? ''; //El ?? hace que si no hay contenido se aplica ese valor;
$password = $_POST['password'] ?? '';

$correctpass = "abc1234";
$correctname = "usuario";

if ($user == $correctname && $password == $correctpass){
  echo "Bienvenido, el usuario y la contraseña coinciden";
}else if ($user = "" ){
  echo "El usuario y la contraeña no coinciden";
};

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
