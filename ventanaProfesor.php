<?php
require_once './includes/conexion.php';
session_start();

if (!isset($_SESSION['persona']) || $_SESSION['persona']['rol'] != 2) {
    header("Location: ../login.php");
    exit();
}

$idPersona = $_SESSION['persona']['idPersona'];
$nombre = $_SESSION['persona']['nombre'];

if ($connect->connect_error) {
    die("Error de conexión: " . $connect->connect_error);
}

$sql_cursopersona = "SELECT IdCurso FROM cursopersona WHERE idPersona = '$idPersona' AND estado = '1'";
$resultado_cursopersona = $connect->query($sql_cursopersona);

$cursos = [];

if ($resultado_cursopersona->num_rows > 0) {
    while ($fila_cursopersona = $resultado_cursopersona->fetch_assoc()) {
        $idCurso = $fila_cursopersona['IdCurso'];

        
        $sql_curso = "SELECT nombreCurso FROM curso WHERE idCurso = '$idCurso'";
        $resultado_curso = $connect->query($sql_curso);
        if ($resultado_curso->num_rows > 0) {
            $fila_curso = $resultado_curso->fetch_assoc();
            $nombreCurso = $fila_curso['nombreCurso'];

            $sql_estudiantes = "SELECT idPersona FROM cursopersona WHERE IdCurso = '$idCurso' AND estado = '1' AND idPersona != '$idPersona'";
            $resultado_estudiantes = $connect->query($sql_estudiantes);

            if ($resultado_estudiantes->num_rows > 0) {
                while ($fila_estudiantes = $resultado_estudiantes->fetch_assoc()) {
                    $idEstudiante = $fila_estudiantes['idPersona'];

                    $sql_persona = "SELECT cedula, nombre, telefono FROM persona WHERE idPersona = '$idEstudiante' AND rol = '3'";
                    $resultado_persona = $connect->query($sql_persona);

                    if ($resultado_persona->num_rows > 0) {
                        $fila_persona = $resultado_persona->fetch_assoc();
                        $cursos[$nombreCurso][] = $fila_persona;
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Ventana Profesor</title>
</head>
    <script>
        function cerrarSesion(){
            window.location.href = './includes/logout.php';
        }
    </script>
<body>
    <div class="cerrar">
            <button id="cerrar-sesion" onclick="cerrarSesion()">Cerrar Sesion</button>
    </div>
    <div class="container">
        <div class="caja-tabla">
            <h1>Bienvenido, <?php echo $nombre; ?></h1>
            <br>
            <?php if (!empty($cursos)) : ?>
                <?php foreach ($cursos as $nombreCurso => $estudiantes) : ?>
                    <h2>Estudiantes del Curso: <?php echo $nombreCurso; ?></h2>
                    <br>
                    <table border="2">
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                        </tr>
                        <?php foreach ($estudiantes as $estudiante) : ?>
                            <tr>
                                <td><?php echo $estudiante['cedula']; ?></td>
                                <td><?php echo $estudiante['nombre']; ?></td>
                                <td><?php echo $estudiante['telefono']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No tienes estudiantes asignados en tus cursos.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php $connect->close(); ?>