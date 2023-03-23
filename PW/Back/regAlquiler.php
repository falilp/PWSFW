<?php
include_once 'sesion.php';
function registrarAlquiler($codigoPista,$fecha,$sesion){
    $email = $sesion->retornarSesion();

    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
    $consultaU = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conexion->query($consultaU);
    $usuario = $resultado->fetch_array();

    $consultaP = "SELECT * FROM pista WHERE codPista = '$codigoPista'";
    $resultado = $conexion->query($consultaP);
    $pista = $resultado->fetch_array();

    $insert = "INSERT INTO alquiler (codPista,codUsuario,fecha_alquiler,precio,Descuento) VALUES ('$codigoPista','$usuario[0]','$fecha','$pista[2]','0')";
    $update = "UPDATE pista SET disponible = 1 WHERE codPista = '$codigoPista'";

    if($conexion->query($insert) && $conexion->query($update)){
        header("Location:http://localhost/PWSFW/PW/resources/views/Indice.php"); 
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }
    
    mysqli_close($conexion);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $codigoPista = $_POST["codep"];
    $fecha = $_POST["fecha"];
    $sesion = new Sesion();

    registrarAlquiler($codigoPista,$fecha,$sesion);
}
?>