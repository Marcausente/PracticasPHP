<?php

$array = ["Marc", "Alfredo", "Juanito", "Antonio"];
$eliminar = "Marc";

for($i = 0; $i < count($array); $i++){
  if ($array[$i] == $eliminar){ //Si el valor que esta recorriendo es el que queremso eliminar
    unset($array[$i]); //Quita el valor del array
    $array = array_values($array); //Reindexa el array

    for($y = 0; $y < count($array); $y++){ //Vuelve a imprimir todo el aray cuando se borra un valor
      echo $array[$y];
    }
    break;
  }else{
    echo "No se ha encontrado el valor que se quiere borrar";
    break;
  }
};


