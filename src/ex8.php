<?php

$numero = 3;
$dia = "N/A";

switch($numero){
  case 1:
    $dia = "lunes";
    printdia($dia);
    break;
  case 2:
    $dia = "martes";
    printdia($dia);
    break;
  case 3:
    $dia = "miercoles";
    printdia($dia);
    break;
  case 4:
    $dia = "jueves";
    printdia($dia);
    break;
  case 5:
    $dia = "viernes";
    printdia($dia);
    break;
  case 6:
    $dia = "sabado";
    printdia($dia);
    break;
  case 7:
    $dia = "domingo";
    printdia($dia);
    break;
  default:
    echo "ERROR";
    break;

}

function printdia($dia){
  echo ("Hoy es " . $dia);
}
