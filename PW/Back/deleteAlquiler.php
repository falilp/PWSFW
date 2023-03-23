<?php
function borrarAlquiler($codigoPista){
    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
    $consulta = "DELETE * FROM alquiler WHERE codPista = '$codigoPista'";
    $conexion->query($consulta);

    mysqli_close($conexion);

    header("Location:http://localhost/PWSFW/PW/resources/views/Indice.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $codigoPista = $_POST['codigoPista'];
    
    borrarAlquiler($codigoPista);
}
?>