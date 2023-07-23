<?php
$con=mysqli_connect("localhost","root","","lubricante"); 
if(!$con) { die(" Connection Error "); } 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Crear Producto</title>
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Añadir Producto
                            <a href="admin.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="delete.php" method="POST">

                            <div class="mb-3">
                                <label>Nombre Producto</label>
                                <input type="text" name="nombreproducto" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Precio</label>
                                <input type="number" name="precio" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Stock</label>
                                <input type="number" name="stock" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="crear_producto" class="btn btn-primary">Crear Producto</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>