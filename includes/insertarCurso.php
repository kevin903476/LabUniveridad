<?php
require_once 'conexion.php';
session_start(); // Iniciar sesión

if (isset($_POST)) {
    $codigo_curso = isset($_POST['codigo_curso']) ? $_POST['codigo_curso'] : false;
    $nombre = isset($_POST['nombre_curso']) ? $_POST['nombre_curso'] : false;

    $errores = array();

    $val_cod = false; // Inicializamos la variable
    $val_nom = false; // Inicializamos la variable

    if (!empty($codigo_curso)) {
        // Verificar si el código de curso ya existe
        $sql_check_codigo = "SELECT * FROM curso WHERE CodigoCurso = '$codigo_curso';";
        $resultado_codigo = mysqli_query($connect, $sql_check_codigo);
        if (mysqli_num_rows($resultado_codigo) > 0) {
            $errores['codigo_curso'] = "El código de curso ya existe.";
        } else {
            $val_cod = true;
        }
    } else {
        $errores['codigo_curso'] = "CODIGO CURSO INCORRECTO";
    }

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        // Verificar si el nombre del curso ya existe
        $sql_check_nombre = "SELECT * FROM curso WHERE nombreCurso = '$nombre';";
        $resultado_nombre = mysqli_query($connect, $sql_check_nombre);
        if (mysqli_num_rows($resultado_nombre) > 0) {
            $errores['nombre_curso'] = "El nombre del curso ya existe.";
        } else {
            $val_nom = true;
        }
    } else {
        $errores['nombre_curso'] = "Nombre incorrecto";
    }

    if ($val_cod == true && $val_nom == true) {
        $sql = "INSERT INTO curso VALUES(null, '$codigo_curso', '$nombre');";
        $insertar = mysqli_query($connect, $sql);
        if ($insertar) {
            header('Location: ../ventanaAdmin.php');
        } else {
            echo 'Error al registrar el curso';
        }
    } else {
        $_SESSION['errores'] = $errores; // Guardamos los errores en la sesión
        header('Location: ../curso.php');
        exit();
    }
}
?>
