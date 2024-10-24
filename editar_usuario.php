
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f3e5f5, #e1bee7);
            font-family: 'Arial', sans-serif;
        }
        .container {
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background: white;
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
        }
        h2 {
            color: #d81b60;
        }
        .btn-primary {
            background-color: #d81b60;
            border-color: #d81b60;
        }
        .btn-primary:hover {
            background-color: #c2185b;
            border-color: #c2185b;
        }
        .btn-secondary {
            color: white;
            background-color: #9e9e9e;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #757575;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Usuario</h2>
        <form id="editarUsuarioForm">
            <div class="form-group">
                <label for="usuario">Nuevo Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuario_actual['usuario']); ?>">
            </div>
            <div class="form-group">
                <label for="password">Nueva Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        <button class="btn btn-secondary mt-3" onclick="window.location.href='index.php'">Volver</button>
    </div>

    <script src="./public/js/editar.js"></script>
</body>
</html>
