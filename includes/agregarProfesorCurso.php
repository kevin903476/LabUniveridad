<?php 
    require_once "conexion.php";
    session_start(); // Iniciar sesión
    if (isset($_POST)) {
        $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : false;
        $errores = array();
        
        
        $val_cod = false; 
        $val_ced = false; 
        if (!empty($cedula) && is_numeric($cedula) ) {
            $val_ced = true;
        }else{
            $errores['cedula'] = "Cédula incorrecta";
        }
        if (!empty($codigo) ) {
            $val_cod = true;
        }else{
            $errores['codigo'] = "Código incorrecto";
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
                $sqlCursoPersona = "SELECT * FROM cursopersona WHERE idPersona = '$profeId'";
                $resultado = mysqli_query($connect, $sqlCursoPersona);
                if (mysqli_num_rows($resultado) > 0) {
                    $errores['profesor'] = "El profesor ya fue asignado a este curso.";
                    $_SESSION['errores'] = $errores;
                    header('Location: ../asignarCursoProfesor.php');
                    exit();
                }else{
                    $sql="INSERT INTO `cursopersona` (`IdCursoPersona`, `idPersona`, `IdCurso`, `estado`) VALUES (NULL, $profeId, $cursoId, '1');" ;
                    $insertar=mysqli_query($connect,$sql);
                    echo 'profe registrado';
                    header('Location:../ventanaAdmin.php');
                }
                
            }else{
                $errores['credenciales'] = "Código o Cédula incorrecto";
                $_SESSION['errores'] = $errores;
                header('Location: ../asignarCursoProfesor.php');
            }

            
        }else{
            $_SESSION['errores'] = $errores; // Guardamos los errores en la sesión
            header('Location: ../asignarCursoProfesor.php');
            exit();
        }
       
    }else{
        echo 'error';
    }
   
?>