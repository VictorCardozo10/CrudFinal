<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "gestion_personas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
//Lee los datos enviados desde el cliente
$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$doce_nombre = $data->doce_nombre;
$doce_apellido = $data->doce_apellido;
$per_cumple = $data->per_cumple;
$per_mail = $data->per_mail;
$doce_cel = $data->doce_cel;

$sql = "UPDATE personas SET doce_nombre='$doce_nombre', doce_apellido='$doce_apellido', per_cumple='$per_cumple', per_mail='$per_mail', doce_cel='$doce_cel' WHERE id=$id";
//ejecuta la consulta SQL y verifica si se realizo correctamente
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("mensaje" => "Registro actualizado exitosamente"));
} else {
    echo json_encode(array("mensaje" => "Error: " . $sql . "<br>" . $conn->error));
}

$conn->close();
?>
