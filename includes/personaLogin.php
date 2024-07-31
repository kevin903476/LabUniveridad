<?php
require_once 'conexion.php';
session_start();

if(isset($_POST['cedula']) && isset($_POST['contra'])) {
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
    $pass = isset($_POST['contra']) ? $_POST['contra'] : false;

    $sql = "SELECT * FROM persona WHERE cedula = '$cedula'";
    $login = mysqli_query($connect, $sql);

    if ($login && mysqli_num_rows($login) >= 1) {
        $usuario = mysqli_fetch_assoc($login);

        if ($pass == $usuario['contra']) {
            $_SESSION['persona'] = $usuario;

            if ($usuario['contra'] == 'password123') {
                header('Location: ../actualizarContra.php');
            } else {
                echo 'usuario logueado';
                if ($usuario['rol'] == 1) {
                    header('Location: ../ventanaAdmin.php');
                }else if ($usuario['rol'] == 2) {
                    header('Location: ../ventanaProfesor.php');
                } else if ($usuario['rol'] == 3) {
                    header('Location: ../ventanaEstudiante.php');
                }
                
                
            }
        } else {
            $_SESSION['error-login'] = "DATOS INCORRECTOS";
            header('Location: curso.php');
        }
    } else {
        $_SESSION['error-login'] = "USUARIO NO ENCONTRADO";
        header('Location: registro.php');
    }
}
?>
