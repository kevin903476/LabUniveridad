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
            <p>REGISTRO</p>
            <form action="./includes/insertarPersona.php" method="post">
                
                <section class="cajas-form">
                    <label for="">
                        Cédula
                    </label>
                    <input type="text" name="cedula" required>
                </section>
                <br>
                <section class="cajas-form">
                    <label for="">
                        Nombre
                    </label>
                    <input type="text" name="nombre" required>
                </section>
                <br>
                <section class="cajas-form">
                    <label for="">
                        Teléfono
                    </label>
                    <input type="text" name="telefono" required>
                </section>
                <br>
                <section class="cajas-form">
                    <label for="">
                        Rol
                    </label>
                    <select name="rol">
                        <option value="3">Estudiante</option>
                        <option value="2">Profesor</option>
                    </select>
                </section>
                <section class="cajas-form-button">
                    <button type="submit">Registrar</button>
                </section>
                
            </form>

        </div>
    
    </div>
</body>
</html>