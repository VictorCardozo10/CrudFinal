<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_personas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));
//verifica si se proporcionó un id valido en los datos recibidos
if (isset($data->id)) {
    $id = $data->id;
//si si, borra
    $sql = "DELETE FROM personas WHERE id = $id";
//verifica si se realizó correctamente
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("mensaje" => "Registro eliminado exitosamente"));
    } else {
        echo json_encode(array("mensaje" => "Error al eliminar el registro: " . $conn->error));
    }
//si el id no es valido, error
} else {
    echo json_encode(array("mensaje" => "ID no proporcionado"));
}

$conn->close();
?>
