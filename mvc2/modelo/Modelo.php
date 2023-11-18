<?php
require_once("../basedatos.php");
require_once("../controlador/Controladoralumno.php");
require_once("../controlador/Controladorcurso.php");

class Modelo {
    private $Controladoralumno;
    private $Controladorcurso;

    public function __construct() {
        $this->Controladoralumno = new Controladoralumno();
        $this->Controladorcurso = new Controladorcurso();
    }

    public function insertarAlumno($nombre, $apellidos, $dni, $curso) {
        $this->Controladoralumno->insertarAlumno($nombre, $apellidos, $dni, $curso);
    }

    public function obtenerAlumnos() {
        return $this->Controladoralumno->obtenerAlumnos();
    }

    public function insertarCurso($nombre, $anio) {
        $this->Controladorcurso->insertarCurso($nombre, $anio);
    }

    public function obtenerCursos() {
        return $this->Controladorcurso->obtenerCursos();
    }

    public function eliminarCurso($idCurso) {
        $this->Controladorcurso->eliminarCurso($idCurso);
    }
}

?>