<?php 
include_once 'sesion.php';
function iniciar($email,$contrasena,$sesion){
    if(strlen($contrasena) >= 8){
        $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
        $consulta = "SELECT * FROM usuario WHERE email = '$email'"; 
        $resultado = $conexion->query($consulta);
        $objeto = $resultado->fetch_array();
        if(password_verify($contrasena,$objeto[4])){
            $sesion->usuarioActual($email);
            $variableSesion = $sesion->retornarSesion();
            if($variableSesion == null || $variableSesion = ''){
                die();
            } 
            header("Location:http://localhost/ProgramacionWebSinFrameWork/PW/resources/views/Indice.php"); 
        }else{
                header("Location:http://localhost/ProgramacionWebSinFrameWork/PW/resources/views/Login.html");
        }
        mysqli_close($conexion);
    }    
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $sesion = new Sesion();
    iniciar($email,$contrasena,$sesion);
}
?>