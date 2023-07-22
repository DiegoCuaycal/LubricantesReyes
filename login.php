<?php
$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];

$conexion = mysqli_connect('localhost', 'root', 'root', 'lubricante');

if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

$query = "SELECT * FROM persona WHERE nombre = '$nombre'";
$resultado = mysqli_query($conexion, $query);
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
if (mysqli_num_rows($resultado) == 1) {
    $query1 = "SELECT * FROM usuario WHERE contraseña = $contraseña";
    $resultado1 = mysqli_query($conexion, $query1);
    $fila = mysqli_fetch_assoc($resultado1);
    $contrasenaHash = $fila['contraseña'];

    if (mysqli_num_rows($resultado1) == 1 && $resultado==$resultado1) {
        echo "Los datos coinciden.";
        session_start();
        $_SESSION['nombre'] = $nombre;
        header('Location: lubricante.html');
    } else {
        echo "La contraseña es incorrecta.";
    }
} else {
    echo "El nombre no existe.";
}
mysqli_close($conexion);
?>