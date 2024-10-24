<?php
// Incluir el archivo de conexión
require_once './app/config/conexion.php';

// Comprobar si la conexión se estableció correctamente
if (!isset($pdo)) {
    die('Error: No se pudo establecer la conexión a la base de datos.');
}

// Ejecutar la consulta
$query = "SELECT * FROM t_producto";
$result = $pdo->query($query); // Ejecutar la consulta

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suits</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/dt.css">
    <link rel="stylesheet" href="./public/css/style.css"> 
</head>
<body>
    <div class="login-container">
        <h3><i class="fas fa-shopping-cart"></i></h3>
        <h5 class="text-center">Bienvenida, usuario</h5>
        <div class="d-flex justify-content-center mb-3">
            <button class="btn btn-light mx-2" onclick="window.location.href='editar_usuario.php'">
                <i class="fas fa-user-edit"></i> Editar Usuario
            </button>
            <button class="btn btn-danger mx-2" id="cerrarSesionBtn">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </div>
        
        <h2 class="text-center">Agregar productos</h2>
        <form id="formAgregarProducto">
            <div class="form-group">
                <label for="nombre_producto">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
            </div>
            <div class="form-group">
                <label for="precio_producto">Precio:</label>
                <input type="number" class="form-control" id="precio_producto" name="precio_producto" required step="0.01">
            </div>
            <div class="form-group">
                <label for="cantidad_producto">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad_producto" name="cantidad_producto" required>
            </div>
            <button type="submit" class="btn login-btn">Agregar <i class="fas fa-plus"></i></button>
        </form>

        <h3 class="mt-4">Lista de Productos</h3>
        <table id="myTable" class="table table-light table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['id_producto']; ?></td>
                        <td><?php echo $row['producto']; ?></td>
                        <td><?php echo $row['precio']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td>
                            <button class="btn btn-warning btn-icon" onclick="abrirModalActualizar(<?php echo $row['id_producto']; ?>, '<?php echo $row['producto']; ?>', <?php echo $row['precio']; ?>, <?php echo $row['cantidad']; ?>)">
                                <i class="fas fa-edit"></i> Actualizar
                            </button>
                            <button class="btn btn-danger btn-icon" onclick="eliminarProducto(<?php echo $row['id_producto']; ?>)">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de Actualización -->
    <div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="modalActualizarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalActualizarLabel">Actualizar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formActualizarProducto">
                        <input type="hidden" id="id_producto" name="id_producto">
                        <div class="form-group">
                            <label for="nombre_producto_modal">Nombre del Producto:</label>
                            <input type="text" class="form-control" id="nombre_producto_modal" name="nombre_producto_modal" required>
                        </div>
                        <div class="form-group">
                            <label for="precio_producto_modal">Precio:</label>
                            <input type="number" class="form-control" id="precio_producto_modal" name="precio_producto_modal" required step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="cantidad_producto_modal">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad_producto_modal" name="cantidad_producto_modal" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Producto <i class="fas fa-save"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./public/js/main.js"></script>
</body>
</html>
