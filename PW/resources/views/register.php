<!DOCTYPE html>
<html>
    <head> 
        <title> Registro de usuario </title>
        <link rel="icon" href="/img/iconoo.png" >
    </head>
    <body>
    <h1>Registro</h1>

    <form method="post" action="">
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
            $contrasenaHash = password_hash($contrasena,PASSWORD_BCRYPT,['cost' => 10]);
            if(strlen($telefono) == 9 && strlen($contrasena) >= 8){
                $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
                $consulta = "INSERT INTO usuarios (nombre,apellidos,email,telefono,contrasena) VALUES ('$nombre','$apellidos','$email','$telefono','$contrasenaHash')";
                if(mysqli_query($conexion,$consulta)){
                    echo "Usuario registrado.";
                }else{
                    echo "No se pudo registrar al Usuario.";
                }
                mysqli_close($conexion);
            }
        }
    ?>
    </body>
</html>
