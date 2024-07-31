<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=”shortcut icon” href=”favicon.ico” mce_href=”favicon.ico” type=”image/x-icon” />
    <link rel="stylesheet" href="./style/style.css">
    <title>Registro</title>
</head>
<body>
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