<?php 
function registrarEvento($categoria, $descripcion,$fecha,$codpista){
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
    $consulta = "INSERT INTO evento (FechaEvento,Descripcion,CodPista,categoria,codUsuario) VALUES ('$fecha','$descripcion','$codpista', '$categoria', '$codUsuario')";
    if($conexion->query($consulta)){
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
    $codpista = $_POST['pista'];

    registrarEvento($categoria, $descripcion, $fecha, $codpista);
}

?>