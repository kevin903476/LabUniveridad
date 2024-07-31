<?php
session_start();
require_once 'conexion.php';

if(isset($_POST['nueva_contra']) && isset($_POST['confirmar_contra'])) {
    $nueva_contra = $_POST['nueva_contra'];
    $confirmar_contra = $_POST['confirmar_contra'];

    if ($nueva_contra === $confirmar_contra) {
        $cedula = $_SESSION['persona']['cedula'];

        $sql = "UPDATE persona SET contra = '$nueva_contra' WHERE cedula = '$cedula'";
        $update = mysqli_query($connect, $sql);

        if ($update) {
            echo 'Contraseña actualizada';
            header('Location: ../login.php');
        } else {
            echo 'Error al actualizar la contraseña';
        }
    } else {
        echo 'Las contraseñas no coinciden';
    }
}
?>