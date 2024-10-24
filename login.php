<?php
require_once './app/config/conexion.php';
$query = "SELECT * FROM t_producto";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome -->
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
    <div class="login-container text-center">
        <h3><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</h3>
        <form id="loginForm" action="" method="POST">
        <input type="hidden" name="action" value="login">


            <div class="mb-3">
                <input type="text" class="form-control rounded-pill" id="usuario" name="usuario" required placeholder="Usuario">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control rounded-pill" id="password" name="password" required placeholder="Contraseña">
            </div>

            <div class="d-grid">
                <button type="submit" id="btn_iniciar" class="btn login-btn">Iniciar Sesión</button>
            </div>
            <button type="button" class="btn btn-secondary w-100 mt-3" onclick="window.location.href='registro.php';">
                <i class="fas fa-user-plus"></i>Registrar
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
    <script src="./public/js/main2.js"></script>
</body>
</html>
