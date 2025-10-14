<?php
require_once "class/libro.php";

  $titulo = $_POST['titulo'] ?? '';
  $autor = $_POST['autor'] ?? '';
  $paginas = $_POST['paginas'] ?? '';
  $fecha_publicacion = $_POST['fecha'] ?? '';

  $libro = new Libro($titulo, $autor, $fecha_publicacion, $paginas);

  echo ($libro->datosLibro());


?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario - Libro</title>
  </head>
  <body>
    <h1>Formulario de libros</h1>
    <form method="post" action="#" novalidate>
      <div class="field">
        <label for="nombre">Titulo</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo" autocomplete="given-name" required />
      </div>

      <div class="field">
        <label for="apellido">Autor</label>
        <input type="text" id="autor" name="autor" placeholder="Autor" autocomplete="family-name" required />
      </div>

      <div class="field">
        <label for="apellido">Paginas</label>
        <input type="num" id="paginas" name="paginas" placeholder="Paginas" autocomplete="family-name" required />
      </div>

      <div class="field">
        <label for="apellido">Fecha Publicación</label>
        <input type="date" id="fecha" name="fecha" placeholder="Fecha Publicación" autocomplete="family-name" required />
      </div>

      <button type="submit">Enviar</button>
    </form>
  </body>
</html>
