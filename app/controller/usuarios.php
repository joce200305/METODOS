<?php

require_once '../config/conexion.php';

class UsuarioController extends Conexion {

    public function login() {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
    
        $query = "SELECT * FROM t_usuario WHERE usuario = :usuario";
        $stmt = $this->obtener_conexion()->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
    
        $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($datosUsuario) {  
            if ($password === $datosUsuario['password']) {
                $_SESSION['usuario'] = $usuario; 
                echo json_encode(['success' => true, 'message' => 'Inicio de sesión correctamente.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas.']);
        }
    }
    

    public function registrarUsuario() {
        $usuario = $_POST['usuario'];
        $password = $_POST['password']; 
    
        $checkQuery = "SELECT * FROM t_usuario WHERE usuario = :usuario";
        $stmt = $this->obtener_conexion()->prepare($checkQuery);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => false, 'message' => 'El usuario ya existe.']);
        } else {
            $insertQuery = "INSERT INTO t_usuario (usuario, password) VALUES (:usuario, :password)";
            $stmt = $this->obtener_conexion()->prepare($insertQuery);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':password', $password);
    
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Registrado correctamente.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al registrar.']);
            }
        }
    }
    

    public function actualizarDatos() {
        if (!isset($_SESSION['usuario'])) {
            echo json_encode(['success' => false, 'message' => 'Acceso no autorizado.']);
            return;
        }
    
        $usuarioActual = $_SESSION['usuario'];
        $nuevoUsuario = $_POST['usuario'];
        $password = $_POST['password']; 
    
        $query = "UPDATE t_usuario SET usuario = :nuevo_usuario, password = :password WHERE usuario = :usuario_actual";
        $stmt = $this->obtener_conexion()->prepare($query);
        $stmt->bindParam(':nuevo_usuario', $nuevoUsuario);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':usuario_actual', $usuarioActual);
    
        if ($stmt->execute()) {
            $_SESSION['usuario'] = $nuevoUsuario; 
            echo json_encode(['success' => true, 'message' => 'Datos actualizados correctamente', 'nuevoUsuario' => $nuevoUsuario]);
        } else {
            $error = $stmt->errorInfo();
            echo json_encode(['success' => false, 'message' => 'Hubo un error al actualizar los datos: ' . $error[2]]);
        }
    }
    
}

$consulta = new UsuarioController();
$metodo = $_POST['metodo'];
$consulta->$metodo();
?>