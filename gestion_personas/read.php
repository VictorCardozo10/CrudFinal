<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_personas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
//Esto lee el parametro "id" desde la URL "($_GET['id'])" y lo convierte a un entero usando "intval()"
//para evitar inyecciones SQL (insano)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
//realiza una consulta SQL para seleccionar la persona con ese id si es mayor a 0
    $sql = "SELECT * FROM personas WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
//si no se proporciona un id realiza una consulta SQL para seleccionar todas las personas de una
    $sql = "SELECT * FROM personas";
    $result = $conn->query($sql);
    $personas = array();
    while ($row = $result->fetch_assoc()) {
        $personas[] = $row;
    }
    echo json_encode($personas);
}

$conn->close();
?>
