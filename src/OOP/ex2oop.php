<?php

$url = "https://gracia.sallenet.org/login/index.php";

$archivo = substr($url, 34);
echo $archivo;
echo "<br>";

$archivo2 = explode("/", $url);
echo $archivo2[4];
