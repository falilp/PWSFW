<?php 
function iniciar($email,$contrasena){
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
                    echo "No se pudo iniciar al Usuario.";
            }
            mysqli_close($conexion);
        }
    }
}
?>
