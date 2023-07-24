
<?php 
$con=mysqli_connect("localhost","root","","lubricante"); 
if(!$con) { die(" Connection Error "); } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
  
<div class="container">
      <div class="row mt-5">
        <div class="col"><h4><a href="productocrear.php"><button>Añadir Producto</></button></a></h4>
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">Datos</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <td> Id </td>
                  <td> nombre Producto </td>
                  <td> precio </td>
                  <td> stock </td>
                  <td> Descripcion </td>
                  <td> Edit </td>
                  <td> Delete </td>
                </tr>
                <tr>
                <?php 
                  $query = " select * from producto ";
                  $result = mysqli_query($con,$query);
                  if($result){
                  while($row = mysqli_fetch_assoc($result)){
                    $id=$row['idproducto']; 
                    $nombre=$row['nombreproducto']; 
                    $precio=$row['precio']; 
                    $stock=$row['stock']; 
                    $descripcion=$row['descripcion'];
                    echo '<tr><td>'.$id.'</td>
                    <td>'.$nombre.'</td>
                    <td>'.$precio.'</td>
                    <td>'.$stock.'</td>
                    <td>'.$descripcion.'</td>
                    <td><a href="editarproducto.php?id='.$id.'" class="btn btn-primary">Edit</a></td>  
                    <td><a href="delete.php?deleteid='.$id.'" class="btn btn-danger">Delete</a></td>';}
                  }
                ?>
                </tr>       
              </table>
            </div>
            <div class="card-header">
              <h2 class="display-6 text-center">Ventas</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <td> Id </td>
                  <td> Idcliente </td>
                  <td> idproducto </td>
                  <td> cantidad </td>
                  <td> preciototal </td>
                  <td> Delete </td>
                </tr>
                <tr>
                <?php 
                  $query = " select * from ventas ";
                  $result = mysqli_query($con,$query);
                  if($result){
                  while($row = mysqli_fetch_assoc($result)){
                    $id=$row['id']; 
                    $idcliente=$row['idcliente']; 
                    $idproducto=$row['idproducto']; 
                    $cantidad=$row['cantidad']; 
                    $preciototal=$row['preciototal'];
                    echo '<tr><td>'.$id.'</td>
                    <td>'.$idcliente.'</td>
                    <td>'.$idproducto.'</td>
                    <td>'.$cantidad.'</td>
                    <td>'.$preciototal.'</td>
                    <td><a href="delete.php?deleteventaid='.$id.'" class="btn btn-danger">Delete</a></td>';}
                  }
                ?>
                </tr>
                </table>
                <div class="card-header">
              <h2 class="display-6 text-center">Usuarios</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <td> cedula </td>
                  <td> nombre </td>
                  <td> apellido </td>
                  <td> email </td>
                  <td> contraseña </td>
                </tr>
                <tr>
                <?php 
                  $query = " select * from usuario ";
                  $result = mysqli_query($con,$query);
                  if($result){
                  while($row = mysqli_fetch_assoc($result)){
                    $cedula=$row['cedula']; 
                    $email=$row['email']; 
                    $contraseña=$row['contraseña']; 

                    $query2 = " select `nombre`, `apellido` from persona where cedula=$cedula";
                    $result2 = mysqli_query($con,$query2);
                    if($result2){
                      while($row = mysqli_fetch_assoc($result2)){
                        $nombre=$row['nombre']; 
                        $apellido=$row['apellido'];
                    }
                    }

                    echo '<tr><td>'.$cedula.'</td>
                    <td>'.$email.'</td>
                    <td>'.$contraseña.'</td>
                    <td>'.$nombre.'</td>
                    <td>'.$apellido.'</td>
                    <td><a href="delete.php?deleteusuarioid='.$cedula.'" class="btn btn-danger">Delete</a></td>';}
                  }
                ?>
                </tr> 
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>
</html>