<?php

$array = ["Antonio", "Juan", "Alfredo", "Juan", "Manolo"];
$nuevoArray = [];

foreach($array as $valor) {
    if(!in_array($valor, $nuevoArray)) { //in_array comprueba si un valor existe en el array, en este caso como es !, los valores que NO existan los añadira al nuevoArray
        $nuevoArray[] = $valor;
    }
}

print_r($nuevoArray);
