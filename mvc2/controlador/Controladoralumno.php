<?php
require_once("../basedatos.php");

class Controladoralumno {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function insertarAlumno($nombre, $apellidos, $dni, $curso) {
        $sql = "INSERT INTO alumnos (nombre, apellidos, dni, curso) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $nombre, $apellidos, $dni, $curso);

        if ($stmt->execute()) {
            echo "Alumno insertado correctamente.";
        } else {
            echo "Error al insertar alumno: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtenerAlumnos() {
        $sql = "SELECT * FROM alumnos";
        $result = $this->conn->query($sql);

        $alumnos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $alumnos[] = $row;
            }
        }

        return $alumnos;
    }
}
?>