<?php

echo "Ejercicio 5: ";
echo "<br><br>";
$num = 1;
$menu = 0;

if($num > 0){
  $menu = 1;
}else if($num == 0){
  $menu = 2;
}else{
  $menu = 3;
}

switch($menu){
  case 1:
    echo "El numero es positivo";
    break;
  case 2:
    echo "El numero es 0";
    break;
  case 3:
    echo "El numero es negativo";
    break;
  default:
   echo "ERROR";
   break;
}
