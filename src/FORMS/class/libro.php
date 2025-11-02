<?php

class Libro{
public $titulo;
public $autor;
public $ano_publicacion;
public $num_paginas;

public function __construct($titulo, $autor, $ano_publicacion, $num_paginas)
{
  $this->titulo = $titulo;
  $this->autor = $autor;
  $this->ano_publicacion = $ano_publicacion;
  $this->num_paginas = $num_paginas;
}

  public function getTitulo()
  {
    return $this->titulo;
  }

  public function setTitulo($titulo)
  {
    $this->titulo = $titulo;
  }

  public function setAutor($autor){
    $this->autor = $autor;
  }

  public function getAutor(){
    return $this->autor;
  }

  public function setAno_Publicacion($ano_publicacion){
    $this->ano_publicacion = $ano_publicacion;
  }

  public function getAno_Publicacion(){
    return $this->ano_publicacion;
  }

  public function setNum_Paginas($num_paginas){
    $this->num_paginas = $num_paginas;
  }

  public function getNum_Paginas(){
    return $this->num_paginas;
  }







}

?>
