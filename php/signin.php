<?php

$mensaje = "";
$error = false;

$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$cedula = $_POST['cedula'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $mensaje = "Correo electrónico inválido";
} elseif (strlen($contraseña) < 5) {
    $error = true;
    $mensaje = "La contraseña debe tener al menos 8 caracteres";
} else {
    
    $conn = new mysqli('localhost', 'root', 'root', 'lubricante', '3306');
    if ($conn->connect_error) {
        $error = true;
        $mensaje = "Error de conexión a la base de datos: " . $conn->connect_error;
    } else {
        
        $stmt = $conn->prepare("INSERT INTO persona (`cedula`, `nombre`, `apellido`) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $cedula, $nombre, $apellido);

        
        
        $stmt1 = $conn->prepare("INSERT INTO usuario (`cedula`, `email`, `contraseña`) VALUES (?, ?, ?)");
        $stmt1->bind_param("iss", $cedula, $email, $contraseña);

        
        if ($stmt->execute() && $stmt1->execute()) {
            $mensaje = "Registro exitoso";
            
            header('Location: ../html/lubricante.php');
            exit(); 
        } else {
            $error = true;
            $mensaje = "Error al ejecutar la consulta: " . $stmt->error . " " . $stmt1->error;
        }

        
        $stmt->close();
        $stmt1->close();
        $conn->close();
    }
}

echo $mensaje;

?>
