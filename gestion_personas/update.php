<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_personas";

//conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//recibe los datos enviados desde el cliente (en formato JSON)
$data = json_decode(file_get_contents("php://input"), true);

//verifica si se recibieron datos válidos
if (!empty($data['id'])) {
    //prepara la consulta SQL para actualizar los datos
    $id = intval($data['id']);
    $doce_nombre = $conn->real_escape_string($data['doce_nombre']);
    $doce_apellido = $conn->real_escape_string($data['doce_apellido']);
    $per_cumple = $conn->real_escape_string($data['per_cumple']);
    $per_mail = $conn->real_escape_string($data['per_mail']);
    $doce_cel = $conn->real_escape_string($data['doce_cel']);

    $sql = "UPDATE personas SET doce_nombre='$doce_nombre', doce_apellido='$doce_apellido', per_cumple='$per_cumple', per_mail='$per_mail', doce_cel='$doce_cel' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        //si la actualización fue exitosa, devuelve un mensaje JSON de éxito
        $response = array("mensaje" => "Datos actualizados correctamente.");
        echo json_encode($response);
    } else {
        //si hubo un error en la consulta SQL, devuelve un mensaje de error
        $response = array("error" => "Error al actualizar los datos: " . $conn->error);
        echo json_encode($response);
    }
} else {
    //si no se recibieron datos válidos, devuelve un mensaje de error
    $response = array("error" => "Datos recibidos no válidos para actualizar.");
    echo json_encode($response);
}

$conn->close();
?>
