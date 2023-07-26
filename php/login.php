<?php
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

$conexion = mysqli_connect('localhost', 'root', '', 'lubricante');

if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

$query = "SELECT * FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($conexion, $query);
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $contrasenaHash = $fila['contraseña'];

    if ($contrasenaHash == $contraseña) {
        // La contraseña es correcta, ahora buscamos el nombre asociado a la cédula
        $cedulaUsuario = $fila['cedula'];
        $queryNombre = "SELECT nombre FROM persona WHERE cedula = '$cedulaUsuario'";
        $resultadoNombre = mysqli_query($conexion, $queryNombre);
        
        if ($resultadoNombre && mysqli_num_rows($resultadoNombre) == 1) {
            $filaNombre = mysqli_fetch_assoc($resultadoNombre);
            $nombreUsuario = $filaNombre['nombre'];
            echo $nombreUsuario;
            echo "Los datos coinciden.";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['cedula'] = $cedulaUsuario; // Guardamos el nombre en la sesión
            header('Location: ../html/lubricante.php');
        } else {
            echo "No se pudo obtener el nombre asociado a la cédula.";
        }
    } else {
        echo "La contraseña es incorrecta.";
    }
} else {
    $query2 = "SELECT * FROM administrador WHERE email = '$email'";
    $resultado2 = mysqli_query($conexion, $query2);
    if (!$resultado2) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
    
    if (mysqli_num_rows($resultado2) == 1) {
        $fila = mysqli_fetch_assoc($resultado2);
        $contrasenaHash = $fila['contraseña'];
    
        if ($contrasenaHash == $contraseña) {
            // La contraseña es correcta, ahora buscamos el nombre asociado a la cédula
            $cedulaUsuario = $fila['cedula'];
            $queryNombre = "SELECT nombre FROM persona WHERE cedula = '$cedulaUsuario'";
            $resultadoNombre = mysqli_query($conexion, $queryNombre);
            
            if ($resultadoNombre && mysqli_num_rows($resultadoNombre) == 1) {
                $filaNombre = mysqli_fetch_assoc($resultadoNombre);
                $nombreUsuario = $filaNombre['nombre'];
                echo $nombreUsuario;
                echo "Los datos coinciden.";
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['nombre'] = $nombreUsuario; // Guardamos el nombre en la sesión
                header('Location: ../php/admin.php');
            } else {
                echo "No se pudo obtener el nombre asociado a la cédula.";
            }
        } else {
            echo "La contraseña es incorrecta.";
        }
    } else {
        echo "El email no existe.";
    }
}

mysqli_close($conexion);
?>