<?php 
    require_once "conexion.php";
    if (isset($_POST)) {
        $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
        $rol = isset($_POST['rol']) ? $_POST['rol'] : false;
        
        $errores = array();
        if (!empty($cedula) && is_numeric($cedula) ) {
            $val_ced = true;
        } else {
            $errores['cedula'] = "Cedula incorrecta";
        }
        if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            $val_nom = true;
        } else {
            $errores['nombre'] = "Nombre incorrecto";
        }
        if (!empty($telefono) && is_numeric($telefono) ) {
            $val_tel = true;
        } else {
            $errores['telefono'] = "Telefono incorrecto ";
        }
        

        if( $val_ced == true && $val_nom == true && $val_tel == true && $val_contra == true ){
            $rolNum = intval($rol);
            $sql="INSERT INTO persona VALUES(null,'$cedula','$nombre', '$telefono',DEFAULT, '$rolNum');" ;
            $insertar=mysqli_query($connect,$sql);
            echo 'usuario registrado';
            header('Location:../login.php');
        }else{
            echo 'campo erroneo';
            echo '<br>';
            var_dump($errores);
        }
       
    }else{
        echo 'error';
    }
   
?>