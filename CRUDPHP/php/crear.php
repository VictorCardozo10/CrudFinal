<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crudpersonas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$doce_nombre = $_POST['doce_nombre'];
$doce_apellido = $_POST['doce_apellido'];
$per_cumple = $_POST['per_cumple'];
$per_mail = $_POST['per_mail'];
$doce_cel = $_POST['doce_cel'];

// Insertar datos en la tabla personas
$sql = "INSERT INTO personas (doce_nombre, doce_apellido, per_cumple, per_mail, doce_cel) 
        VALUES ('$doce_nombre', '$doce_apellido', '$per_cumple', '$per_mail', '$doce_cel')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
