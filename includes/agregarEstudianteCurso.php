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
            $sqlEst = "SELECT * FROM persona WHERE cedula = '$cedula' AND rol = 3";
            $sqlCurso = "SELECT * FROM curso WHERE CodigoCurso = '$codigo'";
            $estudiante = mysqli_query($connect, $sqlEst);
            $curso = mysqli_query($connect, $sqlCurso);
            if ($estudiante && mysqli_num_rows($estudiante) >= 1 && $curso && mysqli_num_rows($curso) >= 1) {
                $estE = mysqli_fetch_assoc($estudiante);
                $cursoE = mysqli_fetch_assoc($curso);
                $profeId = $estE['idPersona'];
                $cursoId = $cursoE['IdCurso'];
                $sql="INSERT INTO `cursopersona` (`IdCursoPersona`, `idPersona`, `IdCurso`, `estado`) VALUES (NULL, $profeId, $cursoId, '1');" ;
                $insertar=mysqli_query($connect,$sql);
                echo 'estudiante registrado';
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