<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="caja-form">
            <p>Curso</p>
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