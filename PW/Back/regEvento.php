<?php 
function registrarEvento($categoria, $descripcion,$fecha,$codpista){
    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
    $consulta = "INSERT INTO evento (FechaEvento,Descripcion,CodPista,categoria) VALUES ('$fecha','$descripcion','$codpista', '$categoria')";
    //Falta modificar la pista para ponerla ocupada
    if(mysqli_query($conexion,$consulta)){
        echo "Evento registrada.";
    }else{
        echo "No se pudo registrar la Pista.";
    }
    mysqli_close($conexion);
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $pista = $_POST['pista'];
    $codpista=1;

    registrarEvento($categoria, $descripcion, $fecha, $codpista);
}

?>