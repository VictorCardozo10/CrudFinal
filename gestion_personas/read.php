<?php
$conn = new mysqli("localhost", "root", "", "gestion_personas"); // Crear conexión
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error); // Verificar conexión

$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Obtener el id de la URL y convertirlo a entero

$sql = $id > 0 ? "SELECT * FROM personas WHERE id = $id" : "SELECT * FROM personas"; // Definir la consulta SQL
$result = $conn->query($sql); // Ejecutar la consulta y lo guarda en result

$data = $id > 0 ? $result->fetch_assoc() : $result->fetch_all(MYSQLI_ASSOC); // Obtener los resultados
echo json_encode($data); // Convertir los resultados a JSON y mostrarlos

$conn->close(); // Cerrar conexión
?>
