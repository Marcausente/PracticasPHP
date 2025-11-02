<?php
require_once "class/libro.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $titulo = $_POST["titulo"];
  $autor = $_POST["autor"];
  $paginas = $_POST["paginas"];
  $fecha = $_POST["fecha"];
  $errores = [];

  $errores = verificacion($titulo, $autor, $paginas, $fecha, $errores);

  if (empty($errores)){
    $libro = new Libro($titulo, $autor, $paginas, $fecha);

    echo $libro->getTitulo();
    echo $libro->getAutor();
    echo $libro->getNum_Paginas();
    echo $libro->getAno_Publicacion();
  }else{
    for($i = 0; $i < count($errores); $i++){
      echo $errores[$i];
    }
  }

}else{
  echo "Error al verificar los datos";
}

function verificacion($titulo, $autor, $paginas, $fecha, $errores){

  if(empty($titulo) || empty($autor) || empty($paginas) || empty($fecha)){
    $errores [] = "Debes rellenar los campos" . "<br><br>";
  }

  if (!is_numeric($paginas)){
    $errores[] = "Paginas debe ser un numero" . "<br><br>";
  }

  if (!is_numeric($fecha)){
    $errores[] = "Fecha debe ser un numero" . "<br><br>";
  }

  return $errores;

}

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
        <label for="titulo">Titulo</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo" autocomplete="given-name" required />
      </div>

      <div class="field">
        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" placeholder="Autor" autocomplete="family-name" required />
      </div>

      <div class="field">
        <label for="paginas">Paginas</label>
        <input type="num" id="paginas" name="paginas" placeholder="Paginas" autocomplete="family-name" required />
      </div>

      <div class="field">
        <label for="fecha">Fecha Publicación</label>
        <input type="num" id="fecha" name="fecha" placeholder="Fecha Publicación" autocomplete="family-name" required />
      </div>

      <button type="submit">Enviar</button>
    </form>
  </body>
</html>
