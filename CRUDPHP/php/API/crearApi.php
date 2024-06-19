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

// Configurar los encabezados para permitir solicitudes desde otros orígenes (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Obtener datos enviados en la solicitud
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['doce_nombre']) && !empty($data['doce_apellido']) && !empty($data['per_cumple']) && !empty($data['per_mail']) && !empty($data['doce_cel'])) {
    $doce_nombre = $data['doce_nombre'];
    $doce_apellido = $data['doce_apellido'];
    $per_cumple = $data['per_cumple'];
    $per_mail = $data['per_mail'];
    $doce_cel = $data['doce_cel'];

    // Insertar datos en la tabla personas
    $sql = "INSERT INTO personas (doce_nombre, doce_apellido, per_cumple, per_mail, doce_cel) 
            VALUES ('$doce_nombre', '$doce_apellido', '$per_cumple', '$per_mail', '$doce_cel')";

    if ($conn->query($sql) === TRUE) {
        http_response_code(201); // Código de respuesta HTTP 201: Creado
        echo json_encode(array("message" => "Nuevo registro creado exitosamente"));
    } else {
        http_response_code(503); // Código de respuesta HTTP 503: Servicio no disponible
        echo json_encode(array("message" => "Error al crear el registro"));
    }
} else {
    http_response_code(400); // Código de respuesta HTTP 400: Solicitud incorrecta
    echo json_encode(array("message" => "Datos incompletos"));
}

$conn->close();
?>
