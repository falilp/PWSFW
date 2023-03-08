<!DOCTYPE html>
<html>
    <head> <title> Registro de usuario </title> </head>
    <body>
    <h1>Registro</h1>

    <from method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="number" name="telefono" id="telefono" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br>
        <input type="submit" value="Enviar">
    </from>
    <?php   
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];
            $contrasena = $_POST["contrasena"];

            $conexion = mysqli_connect();//Se debe crear la base de datos.
            $consulta = "INSERT INTO usuarios (id,nombre,apellidos,email,telefono,contrasena) VALUES ('0','$nombre','$apellidos','$email','$telefono','$contrasena')";
            if(mysql_query($consulta)){
                echo "Usuario registrado.";
            }else{
                echo "No se pudo registrar al Usuario.";
            }
        }else{
            echo "Ha ocurrido un error.";
        }
    ?>
    </body>
</html>
