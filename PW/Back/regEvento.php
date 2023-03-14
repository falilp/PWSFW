<?php 
function registrarEvento($descripcion,$fecha,$codpista){
    $conexion = @mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
    $consulta = "INSERT INTO evento (FechaEvento,Descripcion,CodPista) VALUES ('$fecha','$descripcion','$codpista')";
    //Falta modificar la pista para ponerla ocupada
    if(mysqli_query($conexion,$consulta)){
        echo "Evento registrada.";
    }else{
        echo "No se pudo registrar la Pista.";
    }
    mysqli_close($conexion);
} 
?>