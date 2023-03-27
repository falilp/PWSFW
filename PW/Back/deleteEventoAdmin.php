<?php
function borrarEvento($codigoEvento){
    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
    $consulta = "DELETE FROM evento WHERE codEvento = '$codigoEvento'";
    //$update = "UPDATE pista SET disponible = 0 WHERE codPista = '$codigoPista'";


    if($conexion->query($consulta)){
        header("Location:http://localhost/PWSFW/PW/resources/views/VistaEvento.php");
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }

    mysqli_close($conexion);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $codigoEvento = $_POST['eliminar'];

    borrarEvento($codigoPista);
}
?>