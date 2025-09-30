<?php

echo "Ejercicio 4:";
echo "<br><br>";

$potencia = 1;
$result = 0;

echo "Utilizando While:";


while($potencia < 11){
  $result = pow(2, $potencia);
  $potencia = $potencia + 1;
  echo $result;
  echo "<br>";
}
echo "<br><br>";


echo "Utilizando For:";

echo "<br>";

for($i = 1; $i < 11; $i++){
  $result = pow(2, $i);
  echo $result;
  echo "<br>";
}
