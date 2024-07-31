<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=”shortcut icon” href=”favicon.ico” mce_href=”favicon.ico” type=”image/x-icon” />
    <link rel="stylesheet" href="./style/style.css">
    <title>login</title>
</head>
<body>

    <div class="container">
        <div class="caja-form">
            <p>LOGIN</p>
            <form action="./includes/personaLogin.php" method="POST">
                
                <section class="cajas-form">
                    <label for="">
                        Cédula
                    </label>
                    <input type="text" name="cedula" required>
                </section>
                <br>
                <section class="cajas-form">
                    <label for="">
                        Contraseña
                    </label>
                    <input type="password" name="contra" required>
                </section>
                <section class="cajas-form-button">
                    <button type="submit">Ingresar</button>
                </section>
            </form>

        </div>
    
    </div>
</body>
</html>