<?php
function registrar($nombre,$apellidos,$email,$telefono,$contrasena){
    $pass = password_hash($contrasena,PASSWORD_BCRYPT,['cost' => 10]);
    if(strlen($telefono) == 9 && strlen($contrasena) >= 8){
        $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
        $consulta = "INSERT INTO usuario (nombre,apellidos,email,telefono,pass) VALUES ('$nombre','$apellidos','$email','$telefono','$pass')";
        if(mysqli_query($conexion,$consulta)){
            echo "Usuario registrado.";
        }else{
            echo "No se pudo registrar al Usuario.";
        }
        mysqli_close($conexion);
    }
}
?>
