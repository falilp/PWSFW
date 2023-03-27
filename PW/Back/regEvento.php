<?php 
function registrarEvento($categoria, $descripcion, $fecha, $tipopista, $codpista){
    //Conexion con la base de datos
    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");

    //Obtenemos el codigo del usuario
    include_once './sesion.php'; 
    $ses = new Sesion();
    $email = $ses->retornarSesion();

    $consulta1 = "SELECT codUsuario FROM usuario WHERE email='$email'";
    $result = mysqli_query($conexion, $consulta1);
    
    $data = $result->fetch_array();

    $codUsuario = $data['0'];
    //Generacion de la consulta
    $consulta = "INSERT INTO evento (FechaEvento,Descripcion,codPista,categoria,codUsuario, tipoPista) VALUES ('$fecha','$descripcion','$codpista', '$categoria', '$codUsuario', '$tipopista)";
    if(mysqli_query($conexion,$consulta)){
        //Actualizamos la tabla de alquiler
        $consulta2 = "UPDATE pista SET disponible='1' WHERE tipoPista='$tipopista' AND  Convert(DATE, HoraDisponible)='$fecha'";
        mysqli_query($conexion, $consulta2);
        header("Location:http://localhost/PWSFW/PW/resources/views/MisReservas.php");
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }
    mysqli_close($conexion);
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $tipopista = $_POST['pista'];
    $codpista = $_POST['codpista'];
    registrarEvento($categoria, $descripcion, $fecha, $tipopista, $codpista);
}

?>