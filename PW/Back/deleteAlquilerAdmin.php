<?php
function borrarAlquiler($codigoPista){
    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
    $consulta = "DELETE FROM alquiler WHERE codPista = '$codigoPista'";
    $update = "UPDATE pista SET disponible = 0 WHERE codPista = '$codigoPista'";

    if($conexion->query($consulta) && $conexion->query($update)){
        header("Location:http://localhost/PWSFW/PW/resources/views/MisReservas.php");
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }

    mysqli_close($conexion);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $codigoPista = $_POST['Eliminar'];

    borrarAlquiler($codigoPista);
}
?>