<?php 
function iniciar($email,$contrasena){
    if(strlen($contrasena) >= 8){
        $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
        $consulta = "SELECT * FROM usuario WHERE email =" . $email; 
        $resultado = mysqli_query($conexion,$consulta);
        if($resultado){
            if(password_verify($contrasena,$resultado["pass"])){
                header("Location:http://localhost/ProgramacionWebSinFrameWork/PW/resources/views/Instalaciones.html"); 
            }
        }else{
                header("Location:http://localhost/ProgramacionWebSinFrameWork/PW/resources/views/Login.html");
        }
        mysqli_close($conexion);
    }    
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    iniciar($email,$contrasena);
}

?>