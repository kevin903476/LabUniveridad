<?php
require_once './includes/conexion.php';
session_start();

if (!isset($_SESSION['persona']) || $_SESSION['persona']['rol'] != 3) {
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

        
        $sql_curso = "SELECT nombreCurso, CodigoCurso FROM curso WHERE IdCurso = '$idCurso'";
        $resultado_curso = $connect->query($sql_curso);

        if ($resultado_curso->num_rows > 0) {
            $fila_curso = $resultado_curso->fetch_assoc();
            $cursos[] = $fila_curso;
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
    <title>Ventana Estudiante</title>
</head>
<body>
    <div class="container">
        <h1>Bienvenido, <?php echo $nombre; ?></h1>
        <div class="caja-form">
            <?php if (!empty($cursos)) : ?>
                <h2>Cursos Asignados</h2>
                <table border='1'>
                    <tr>
                        <th>Código del Curso</th>
                        <th>Nombre del Curso</th>
                    </tr>
                    <?php foreach ($cursos as $curso) : ?>
                        <tr>
                            <td><?php echo $curso['CodigoCurso']; ?></td>
                            <td><?php echo $curso['nombreCurso']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <p>No tienes cursos asignados.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php $connect->close(); ?>
