<?php
include "com.php"; // Incluye tu archivo de conexión a la base de datos

if (isset($_POST["id"])) { // Verifica si se recibió el ID
    $id = $_POST["id"]; // ID del producto a eliminar

    // Elimina el producto basado en el ID
    $sql = "DELETE FROM producto WHERE id = '$id'";

    if ($com->query($sql) === TRUE) {
        echo "Producto eliminado exitosamente.";
        header("Location: mostrar_productos.php"); // Redirige a la página de visualización de productos
    } else {
        echo "Error al eliminar el producto: " . $com->error;
    }
} else {
    echo "No se proporcionó el ID del producto.";
}

$com->close();
?>
