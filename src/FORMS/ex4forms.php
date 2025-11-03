<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Imagen</title>
</head>
<body>
    <h2>Subir Imagen</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="imagen">Selecciona una imagen (jpg, png, gif):</label>
        <input type="file" name="imagen" id="imagen" required>
        <br><br>
        <input type="submit" value="Subir Imagen">
    </form>
</body>
</html>
