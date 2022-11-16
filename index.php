<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link rel="stylesheet" href="./CSS/estilo.css">
</head>
<body>

    <div class="titulo">
        <h1>Bienvenido</h1>
    </div>

    <div class="login">
        <form name="forma01" method="POST">
            
            <div class="espacio">
                <p class="titulo"> Log in</p>
                <img src="./img/user.png" width="100" height="100">
                <br>
            </div>
            <div class="espacio">
                <input class="campo" type="text" name="nombre" required placeholder="Código">
                <br>
            </div>
            <div class="espacio">
                <input class="campo" type="password" name="correo" required placeholder="Contraseña">
                <br>
            </div>
            <div class="espacio">
                <input class="boton"onClick="recibe(); return false;" type="submit" value="Ingresar">
            </div>
        </form>
    </div>
</body>
</html>