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
            if(strlen($contrasena) >= 8){
                $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
                $consulta = "SELECT email,contrasena FROM usuarios WHERE email = $email";
                $resultado = mysqli_query($conexion,$consulta);
                if($resultado){
                    if(password_verify($contrasena,$resultado["contrasena"])){
                        header("Location:http://localhost/Main.php"); 
                    }
                }else{
                    echo "No se pudo registrar al Usuario.";
                }
                mysqli_close($conexion);
            }
        }
    ?>
    </body>
</html>
