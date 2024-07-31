<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Cambiar Contraseña</title>
</head>
<body>

    <div class="container">
        <div class="caja-form">
            <p class="etiqueta">Cambiar Contraseña</p>
            <form action="./includes/updatpass.php" method="POST">
                
                <section class="cajas-form">
                    <label for="">
                        Nueva Contraseña
                    </label>
                    <input type="password" name="nueva_contra" required>
                </section>
                <br>
                <section class="cajas-form">
                    <label for="">
                        Confirmar Nueva Contraseña
                    </label>
                    <input type="password" name="confirmar_contra" required>
                </section>
                <section class="cajas-form-button">
                    <button type="submit">Actualizar</button>
                </section>
            </form>

        </div>
    
    </div>
</body>
</html>