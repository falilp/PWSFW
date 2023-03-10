<?php 
function iniciar($email,$contrasena){
    if(strlen($contrasena) >= 8){
        $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
        $consulta = "SELECT email,pass FROM usuario WHERE email = $email";
        $resultado = mysqli_query($conexion,$consulta);
        if($resultado){
            if(password_verify($contrasena,$resultado["pass"])){
                header("Location:http://localhost/Main.php"); 
            }
        }else{
                echo "No se pudo iniciar al Usuario.";
        }
        mysqli_close($conexion);
    }    
}
?>
