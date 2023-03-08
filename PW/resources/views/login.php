<!DOCTYPE html>
<html>
    <head> <title> Inicio Sesion de usuario </title> </head>
    <body>
    <h1>Inicio Sesion</h1>

    <from method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br>
        <input type="submit" value="Enviar">
    </from>
    <?php   
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST["email"];
            $contrasena = $_POST["contrasena"];
        }
    ?>
    </body>
</html1>