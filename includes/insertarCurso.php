<?php
require_once 'conexion.php';

if(isset($_POST)){
    $codigo_curso = isset($_POST['codigo_curso']) ? $_POST['codigo_curso'] : false;
    $nombre = isset($_POST['nombre_curso']) ? $_POST['nombre_curso'] : false;

    $errores = array();

    if (!empty($codigo_curso)) {
        $val_cod = true;
    }else{
        $errores['codigo_curso'] = "CODIGO CURSO INCORRECTO";
    }
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $val_nom = true;
    } else {
        $errores['nombre_curso'] = "Nombre incorrecto";
    }
    if( $val_cod == true && $val_nom == true){
        $sql="INSERT INTO curso VALUES(null,'$codigo_curso','$nombre');" ;
        $insertar=mysqli_query($connect,$sql);
        echo 'curso registrado';
        header('Location:../ventanaAdmin.php');
    }else{
        echo 'campo erroneo';
        echo '<br>';
        var_dump($errores);
    }
}
?>