<?php
function borrarUsuario($codigoUsuario){
    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
    $consulta = "DELETE FROM alquiler WHERE codUsuario = '$codigoUsuario'";
    $consulta2 = "DELETE FROM evento WHERE codUsuario = '$codigoUsuario'";
    $consulta3 = "DELETE FROM usuario WHERE codUsuario = '$codigoUsuario'";
    //$update = "UPDATE pista SET disponible = 0 WHERE codPista = '$codigoPista'";
    
    if($conexion->query($consulta) && $conexion->query($consulta2) && $conexion->query($consulta3)){
        header("Location:http://localhost/PWSFW/PW/resources/views/main.php"); 
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }

    mysqli_close($conexion);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $codigoUsuario = $_POST['eliminar']; 

    borrarUsuario($codigoUsuario);
}
?>