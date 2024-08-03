<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=”shortcut icon” href=”favicon.ico” mce_href=”favicon.ico” type=”image/x-icon” />
    <link rel="stylesheet" href="./style/style.css">
    <title>Registro</title>
    <style>
        .alert {
            display: none;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            color: #fff;
            font-family: Arial, sans-serif;
            width: 200px;
            text-align: center;
            margin-left: 570px;
            display: flex;
        }
        .alert.error {
            background-color: #f44336;
            align-items: center;
        }
        .alert.success {
            background-color: #4CAF50;
        }
    </style>
    <script>
        function mostrarMensaje(tipo, mensaje) {
            var alertElement = document.getElementById('alerta');
            alertElement.className = 'alert ' + tipo;
            alertElement.innerHTML = mensaje;
            alertElement.style.display = 'block';
        }

        window.onload = function() {
            <?php
            session_start(); 
            if (isset($_SESSION['errores'])) {
                $errores = $_SESSION['errores'];
                foreach ($errores as $error) {
                    echo "mostrarMensaje('error', '". addslashes($error) ."');";
                }
                unset($_SESSION['errores']); 
            }
            ?>
        };
    </script>
</head>
<body>
    <div id="alerta"></div>
    <div class="container">
        <div class="caja-form">
            <p class="etiqueta">Profesor</p>
            <form action="./includes/agregarProfesorCurso.php" method="post">
                
                <section class="cajas-form">
                    <label for="">
                        Cédula del Profesor
                    </label>
                    <input type="text" name="cedula" required>
                </section>
                <br>
                <section class="cajas-form">
                    <label for="">
                        Código del Curso
                    </label>
                    <input type="text" name="codigo" required>
                </section>
                <br>
                
                
                <section class="cajas-form-button">
                    <button type="submit">Registrar</button>
                </section>
                
            </form>

        </div>
    
    </div>
</body>
</html>