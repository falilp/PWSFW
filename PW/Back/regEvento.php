<?php 
function registrarEvento($categoria, $descripcion,$fecha,$codpista){
    //Conexion con la base de datos
    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");

    //Generacion de la consulta
    $consulta = "INSERT INTO evento (FechaEvento,Descripcion,CodPista,categoria) VALUES ('$fecha','$descripcion','$codpista', '$categoria')";
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
    $codpista = $_POST['pista'];

    registrarEvento($categoria, $descripcion, $fecha, $codpista);
}

?>