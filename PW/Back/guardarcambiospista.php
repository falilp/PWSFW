<?php
//Recibimos los datos
$tipo = $_POST['tipo'];
$precio = $_POST['precio'];
$disponible = $_POST['disponible'];
$mensaje = $_POST['mensaje'];
$codPista = $_POST['cambios'];
echo $codUsuario;

//Conectamos la base de datos
    $conexion = mysqli_connect('127.0.0.1', 'ADMIN', '', 'kmb') or die("Conexion fallida");
//Generamos la consulta
    $consulta = "UPDATE pista SET tipoPista='$tipo', disponible='$disponible' , precioHora='$precio' WHERE codPista='$codPista'";
    $result = mysqli_query($conexion,$consulta);
    if($result){
        header("Location:http://localhost/PWSFW/PW/resources/views/Main.php");
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }
?>