<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_personas";
//Conectamos con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
//Aca lee los datos enviados desde el cliente en formato JSON
$data = json_decode(file_get_contents("php://input"));
//Aca comprobamos si se reciben todos los datos necesarios y si es asi se hace una consulta SQL
if (isset($data->doce_nombre) && isset($data->doce_apellido) && isset($data->per_cumple) && isset($data->per_mail) && isset($data->doce_cel)) {
    $doce_nombre = $data->doce_nombre;
    $doce_apellido = $data->doce_apellido;
    $per_cumple = $data->per_cumple;
    $per_mail = $data->per_mail;
    $doce_cel = $data->doce_cel;

    $sql = "INSERT INTO personas (doce_nombre, doce_apellido, per_cumple, per_mail, doce_cel) VALUES ('$doce_nombre', '$doce_apellido', '$per_cumple', '$per_mail', '$doce_cel')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id; // Obtener el ID generado automaticamente 
        echo json_encode(array("mensaje" => "Nueva persona creada exitosamente", "id" => $last_id));
    } else {
        echo json_encode(array("mensaje" => "Error: " . $sql . "<br>" . $conn->error));
    }
//Validacion de los datos a enviar 
} else {
    echo json_encode(array("mensaje" => "Datos incompletos"));
}

$conn->close();
?>
