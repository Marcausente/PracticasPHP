<?php

/* CONEXION CON LA BBDD */

$servername = "db";  // Nombre del servicio en docker-compose.yml
$username = "myuser";  // DB_USER del .env
$password = "mypassword";  // DB_PASSWORD del .env
$dbname = "mydatabase";  // DB_NAME del .env

$conn = new mysqli($servername, $username, $password, $dbname); //Lanzamos la conexion a mysql y en la variable conn pedimos que nos devuelva la conexion

if ($conn->connect_error) { //Si la conexion es error mostramos el error
    die("Connection failed: " . $conn->connect_error);
}else{
  echo "Conectado correctamente";
}

//Praparamos la consulta SQL en

$SqlConsulta = "CREATE TABLE IF NOT EXISTS Persona(
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    age INT(3) NOT NULL
    )";


$resultado = $conn->query($SqlConsulta); //Ejecutamos la consulta mediante querry a nuestra conexión (Recordamos que era la conexion a nuestra bbdd), pedimos que nos guarde lo que nos devuelve

if ($resultado === true) { //Si nos devuelve true, es decir, que se ha creado bien
    echo "Tabla Persona creada exitosamente.<br>";
} else {
    echo "Error al crear la tabla Persona: " . $conn->error . "<br>";
}




/* INSRERCCION DE DATOS EN LA BBDD */




if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Si POST tiene datos

$nombre = htmlspecialchars($_POST['nombre']); //Esto convierte los carateres especiales HTML en entidades seguras apra que los muestre como texto y no los interprete como codigo HTML o JS, esto se le llama un ataque XXS
$apellido = htmlspecialchars($_POST['apellido']);
$edad = htmlspecialchars($_POST['edad']);

//Ahora para evitar las SQLINJECTION, vamos primero a plantearle la estructura de los datos que vamos a insertar:
$sql = "INSERT INTO Persona (name, surname, age) VALUES (?, ?, ?)"; //Cada interrogante representa un valor que se va a entregar para enviar a la bbdd
//Preparamos la consulta para lanzarse con los parametros que le demos.
$stmt = $conn->prepare($sql); //Le pedios que nos guarde la preparacion en stmt

$stmt->bind_param("ssi", $nombre, $apellido, $edad); //Ligamos nuestros datos a los parametros que queriamos enviar, s significa string e i significa int

$resultadoexecute = $stmt->execute(); //Ejecutamos el stmt, mandandolo hacia la bbdd

if ($resultadoexecute === true){
  echo "Registro creado exitosamente";



/* RECOGIDA Y MUESTRA DE DATOS EN LA BBDD */

$sqlSelect = "SELECT id, name, surname, age FROM Persona"; //Indicamos cual es la sentencias de seleccion
$resultSelect = $conn->query($sqlSelect); //Ejecutamos la sentencia

 if ($resultSelect->num_rows > 0) { //Si hay mas de 0 datos insertados en la BBDD
        echo "<h3>Registros actuales en la tabla Persona:</h3>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Edad</th></tr>";

        // Recorrer los resultados y mostrarlos
        while ($row = $resultSelect->fetch_assoc()) { //Fetch_assoc esta convirtiendo todos los datos de cada fila en un array, mientras esto pase nos devolvera un valor el cual se esta guardando en row. Cuando fetch_assoc se quede sin datos que convertir devolvera null, en cuyo momento parara la ejecucion del while
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row['surname'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "</tr>";
        }

        echo "</table><br>";
    } else {
        echo "No hay registros en la tabla Persona.";
    }



}else{
   echo "Error: " . $stmt->error;
}
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Simple</title>
    <style>
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h2>Formulario de Datos</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

          <div class="form-group">
            <label for="email">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>
        </div>


        <button type="submit">Enviar</button>
    </form>
</body>
</html>
