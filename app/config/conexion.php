<?php

class Conexion {
    private $user = "root";
    private $pass = "";
    private $server = "localhost";
    private $nameDB = "tiendita";
    private $conexion;

    private function crear_conexion() {
        if (!$this->conexion) {
            try {
                $this->conexion = new PDO("mysql:host={$this->server};dbname={$this->nameDB}", $this->user, $this->pass);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Opcional: Manejo de errores
            } catch (PDOException $e) {
                echo 'Error de conexión: ' . $e->getMessage();
                return null; // Asegúrate de devolver null en caso de error
            }
        }
        return $this->conexion; // Devuelve la conexión
    }

    public function obtener_conexion() {
        return $this->crear_conexion(); // Devuelve la conexión
    }

    public function cerrar_conexion() {
        $this->conexion = null; // Cierra la conexión
    }
}

// Crear una instancia de la clase
$conexion = new Conexion();
$pdo = $conexion->obtener_conexion(); // Asignar la conexión a la variable $pdo

// Asegúrate de no cerrar la conexión aquí. Manténla abierta para su uso posterior.
//$conexion->cerrar_conexion(); // No lo hagas aquí
