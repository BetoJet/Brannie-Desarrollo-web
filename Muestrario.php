<?php
include "com.php"; // Incluye tu archivo de conexión a la base de datos

$sql = "SELECT Nombre, Descrpition, Price FROM producto";
$result = $com->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <!-- Estilos para mejorar el diseño -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .producto {
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .producto h2 {
            margin-top: 0;
        }

        .producto p {
            color: #666;
            line-height: 1.5;
        }

        /* Estilos para el botón de regresar */
        .boton-regresar {
            background-color: #333; /* Color de fondo */
            color: #fff; /* Color de texto */
            padding: 10px 20px; /* Espaciado */
            border: none; /* Sin borde */
            border-radius: 5px; /* Borde redondeado */
            cursor: pointer; /* Cursor de mano */
            text-align: center; /* Centrar el texto */
            margin: 20px;
            margin-left: 10px;
            margin-top: 1px;
        }

        .boton-regresar:hover {
            background-color: #555; /* Color de fondo al pasar el cursor */
        }
    </style>
</head>
<body>
    <h1>Lista de Productos</h1>

    <!-- Botón para regresar -->
    <button class="boton-regresar" onclick="history.back();">Regresar</button> <!-- Uso de JavaScript para regresar -->

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='producto'>"; // Aplicamos clases para estilos
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
