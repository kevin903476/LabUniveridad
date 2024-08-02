<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Curso</title>
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
            <p class="etiqueta">Curso</p>
            <form action="./includes/insertarCurso.php" method="POST">
                
                <section class="cajas-form">
                    <label for="">
                        Codigo Curso
                    </label>
                    <input type="text" name="codigo_curso" required>
                </section>
                <br>
                <section class="cajas-form">
                    <label for="">
                        Nombre Curso
                    </label>
                    <input type="text" name="nombre_curso" required>
                </section>
                <section class="cajas-form-button">
                    <button type="submit">Ingresar</button>
                </section>
                
            </form>
        </div>
    </div>
    
</body>
</html>
