<?php

$result = 0;

for ($i = 1; $i < 11; $i++){
  for ($x = 0; $x < 11; $x++){
    $result = $i * $x;
    echo $i . " x " . $x . " = " . $result . "<br>";
  }
  echo "<br>";
}
