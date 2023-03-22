<?php
function registrar($nombre,$apellidos,$email,$telefono,$contrasena){
    $pass = password_hash($contrasena,PASSWORD_BCRYPT,['cost' => 10]);

    if(strlen($telefono) == 9 && strlen($contrasena) >= 8){

        $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
        $consulta = "INSERT INTO usuario (nombre,apellidos,email,telefono,pass) VALUES ('$nombre','$apellidos','$email','$telefono','$pass')";

        if(mysqli_query($conexion,$consulta)){
            header("Location:http://localhost/PWSFW/PW/resources/views/Login.html");
        }else{
            header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
        }
        
        mysqli_close($conexion);
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'];
    $apellidos= $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono= $_POST['telefono'];
    $contrasenna= $_POST['contrasena'];

    registrar($nombre, $apellidos, $email, $telefono, $contrasenna);
}
?>