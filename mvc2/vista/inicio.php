<?php
require_once("../modelo/Modelo.php");

$modelo = new Modelo();

if (isset($_POST["submitAlumno"])) {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $curso = $_POST["curso"];

    $modelo->insertarAlumno($nombre, $apellidos, $dni, $curso);
}

if (isset($_POST["submitCurso"])) {
    $nombreCurso = $_POST["nombreCurso"];
    $anio = $_POST["anio"];

    $modelo->insertarCurso($nombreCurso, $anio);
}

if (isset($_GET["eliminarCurso"])) {
    $idCurso = $_GET["eliminarCurso"];
    $modelo->eliminarCurso($idCurso);
}

$alumnos = $modelo->obtenerAlumnos();
$cursos = $modelo->obtenerCursos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Colegio</title>
</head>
<body>
    <p>Nota: Primero se debe crear un curso antes de matricular a un alumno a ese curso,</p>
    <p>porque no tiene sentido crear un alumno y asignarle un curso que no existe en la base de datos (además dará error)</p>

    <h1>Matricular un alumno (formulario)</h1>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" required>

        <label for="dni">DNI:</label>
        <input type="text" name="dni" required>

        <label for="curso">Curso:</label>
        <input type="text" name="curso" required>

        <input type="submit" name="submitAlumno" value="Matricular Alumno">
    </form>

    <h1>Alumnos Matriculados</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Curso</th>
        </tr>
        <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td><?php echo $alumno['nombre']; ?></td>
                <td><?php echo $alumno['apellidos']; ?></td>
                <td><?php echo $alumno['dni']; ?></td>
                <td><?php echo $alumno['curso']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h1>Formulario para insertar cursos:</h1>
    <form method="post" action="">
        <label for="nombreCurso">Nombre del Curso:</label>
        <input type="text" name="nombreCurso" required>

        <label for="anio">Año:</label>
        <input type="text" name="anio" required>

        <input type="submit" name="submitCurso" value="Agregar Curso">
    </form>

    <h1>Cursos Disponibles</h1>
    <ul>
        <?php foreach ($cursos as $curso): ?>
            <li>
                <?php echo $curso['nombre']; ?> (<?php echo $curso['anio']; ?>)
                <a href="?eliminarCurso=<?php echo $curso['nombre']; ?>">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
