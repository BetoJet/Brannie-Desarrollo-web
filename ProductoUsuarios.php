<?php
include "com.php"; // Incluye tu archivo de conexión a la base de datos

$sql = "SELECT Nombre, Descrpition, Price FROM producto";
$result = $com->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="EstiloProductoAdmin.css">
    <title>Productos</title>
</head>
<body>


    <h1>Lista de Productos</h1>

    <?php

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div style='border: 1px solid black; padding: 10px; margin-bottom: 10px;'>";
            echo "<h2>" . $row["Nombre"] . "</h2>";
            echo "<p>Descripción: " . $row["Descrpition"] . "</p>";
            echo "<p>Precio: $" . number_format($row["Price"], 2) . "</p>";
            
            echo "</div>";
        }
    } else {
        echo "No hay productos registrados.";
    }

    $com->close();
    ?>

</body>
</html>
