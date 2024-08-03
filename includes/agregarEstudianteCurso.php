<?php 
    require_once "conexion.php";
    session_start(); 
    if (isset($_POST)) {
        $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : false;

        
        $errores = array();

        $val_cod = false; 
        $val_ced = false; 
        if (!empty($cedula) && is_numeric($cedula) ) {
            $val_ced = true;
        } else {
            $errores['cedula'] = "Cédula incorrecta";
        }
        if (!empty($codigo) ) {
            $val_cod = true;
        } else {
            $errores['codigo'] = "Código incorrecto";
        }
        

        if( $val_ced == true && $val_cod == true){
            $sqlEst = "SELECT * FROM persona WHERE cedula = '$cedula' AND rol = 3";
            $sqlCurso = "SELECT * FROM curso WHERE CodigoCurso = '$codigo'";
            $estudiante = mysqli_query($connect, $sqlEst);
            $curso = mysqli_query($connect, $sqlCurso);
            if ($estudiante && mysqli_num_rows($estudiante) >= 1 && $curso && mysqli_num_rows($curso) >= 1) {
                $estE = mysqli_fetch_assoc($estudiante);
                $cursoE = mysqli_fetch_assoc($curso);
                $estId = $estE['idPersona'];
                $cursoId = $cursoE['IdCurso'];

                $sqlCursoPersona = "SELECT * FROM cursopersona WHERE idPersona = '$estId'";
                $resultado = mysqli_query($connect, $sqlCursoPersona);
                if (mysqli_num_rows($resultado) > 0) {
                    $errores['estudiante'] = "El estudiante ya fue asignado a este curso.";
                    $_SESSION['errores'] = $errores;
                    header('Location: ../asignarCursoEstudiante.php');
                    exit();
                }else{
                    $sql="INSERT INTO `cursopersona` (`IdCursoPersona`, `idPersona`, `IdCurso`, `estado`) VALUES (NULL, $estId, $cursoId, '1');" ;
                    $insertar=mysqli_query($connect,$sql);
                    echo 'estudiante registrado';
                    header('Location:../ventanaAdmin.php');
                }



            }else{
                $errores['credenciales'] = "Código o Cédula incorrecto";
                $_SESSION['errores'] = $errores;
                header('Location: ../asignarCursoEstudiante.php');
            }

            
        }else{
            $_SESSION['errores'] = $errores; // Guardamos los errores en la sesión
            header('Location: ../asignarCursoEstudiante.php');
            exit();
        }
       
    }else{
        echo 'error';
    }
   
?>