<?php

$paises = array ( //Pimer array, dentro de estos ponemos arrays, es un array de arrays
  array("Tokyo", "Japan", "Asia"),
  array("Mexico City", "Mexico", "America"),
  array("Buenos Aires", "Argentina", "America"),
  array("Barcelona", "Spain", "Europe")
);

for ($i = 0; $i < 4; $i++){ //La i recorrera los arrays
  for($y = 0; $y < 3; $y++){ //La y recorrera los contenidos de cada array
    echo $paises [$i] [$y]; //Imprime del array i todo el conteido, en cuanto se acaba pasa al siguiente array que es el for grande.
    echo "<br>";
  }
  echo "<br>";
  echo "<br>";
}

$paises = [["Francia", "Paris"], ["Italia", "roma"], ["Madrid", "España"]];
