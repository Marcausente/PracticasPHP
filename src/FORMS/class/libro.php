<?php

class Libro {
  public $titulo;
  public $autor;
  public $fecha_publicacion;
  public $paginas;


public function __construct($titulo, $autor, $fecha_publicacion, $paginas){
  $this->titulo = $titulo;
  $this->autor = $autor;
  $this->paginas = $paginas;
  $this->fecha_publicacion = $fecha_publicacion;
}

// Getters
  public function getTitulo() {
    return $this->titulo;
  }

  public function getAutor() {
    return $this->autor;
  }

  public function getFechaPublicacion() {
    return $this->fecha_publicacion;
  }

  public function getPaginas() {
    return $this->paginas;
  }

  // Setters
  public function setTitulo($titulo) {
    $this->titulo = $titulo;
  }

  public function setAutor($autor) {
    $this->autor = $autor;
  }

  public function setFechaPublicacion($fecha_publicacion) {
    $this->fecha_publicacion = $fecha_publicacion;
  }

  public function setPaginas($paginas) {
    $this->paginas = $paginas;
  }

  public function datosLibro(){
    return "Título: {$this->titulo}<br>
            Autor: {$this->autor}<br>
            Fecha de Publicación: {$this->fecha_publicacion}<br>
            Páginas: {$this->paginas}";
}
}

?>
