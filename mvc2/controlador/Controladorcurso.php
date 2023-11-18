<?php
require_once("../basedatos.php");

class Controladorcurso {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function insertarCurso($nombre, $anio) {
        $sql = "INSERT INTO curso (nombre, anio) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nombre, $anio);

        if ($stmt->execute()) {
            echo "Curso insertado correctamente.";
        } else {
            echo "Error al insertar curso: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtenerCursos() {
        $sql = "SELECT * FROM curso";
        $result = $this->conn->query($sql);

        $cursos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cursos[] = $row;
            }
        }

        return $cursos;
    }

    public function eliminarCurso($idCurso) {

        $sqlDeleteCurso = "DELETE FROM curso WHERE nombre = ?";
        $stmtDeleteCurso = $this->conn->prepare($sqlDeleteCurso);
        $stmtDeleteCurso->bind_param("s", $idCurso);

        if ($stmtDeleteCurso->execute()) {
            echo "Curso eliminado correctamente.";
        } else {
            echo "Error al eliminar curso: " . $stmtDeleteCurso->error;
        }

        $stmtDeleteCurso->close();
    }
}
?>