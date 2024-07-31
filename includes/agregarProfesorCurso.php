<?php 
    require_once "conexion.php";
    if (isset($_POST)) {
        $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : false;

        
        $errores = array();
        if (!empty($cedula) && is_numeric($cedula) ) {
            $val_ced = true;
        } else {
            $errores['cedula'] = "Cedula incorrecta";
        }
        if (!empty($codigo) ) {
            $val_cod = true;
        } else {
            $errores['codigo'] = "Codigo incorrecto";
        }
        

        if( $val_ced == true && $val_cod == true){
            $sqlProfe = "SELECT * FROM persona WHERE cedula = '$cedula' AND rol = 2";
            $sqlCurso = "SELECT * FROM curso WHERE CodigoCurso = '$codigo'";
            $profe = mysqli_query($connect, $sqlProfe);
            $curso = mysqli_query($connect, $sqlCurso);
            if ($profe && mysqli_num_rows($profe) >= 1 && $curso && mysqli_num_rows($curso) >= 1) {
                $profeE = mysqli_fetch_assoc($profe);
                $cursoE = mysqli_fetch_assoc($curso);
                $profeId = $profeE['idPersona'];
                $cursoId = $cursoE['IdCurso'];
                $sql="INSERT INTO `cursopersona` (`IdCursoPersona`, `idPersona`, `IdCurso`, `estado`) VALUES (NULL, $profeId, $cursoId, '1');" ;
                $insertar=mysqli_query($connect,$sql);
                echo 'profe registrado';
                header('Location:../ventanaAdmin.php');
            }else{
                echo '<h2>Cédula o Código incorrectos</h2>';
            }

            
        }else{
            echo 'campo erroneo';
            echo '<br>';
            var_dump($errores);
        }
       
    }else{
        echo 'error';
    }
   
?>