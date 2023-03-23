<?php
//Recibimos los datos
$nombre = $_POST['nombre'];
$apellidos = $_POST['primerapellido'];
$telefono = $_POST['telefono'];
$codUsuario = $_POST['cambios'];

//Conectamos la base de datos
    $conexion = mysqli_connect('127.0.0.1', 'ADMIN', '', 'kmb') or die("Conexion fallida");
//Generamos la consulta
    $consulta = "UPDATE usuario SET nombre='$nombre', apellidos='$apellidos' ,telefono='$telefono' WHERE codUsuario='$codUsuario'";
    $result = mysqli_query($conexion,$consulta);
    if($result){
        header("Location:http://localhost/PWSFW/PW/Back/Indice.php");
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }
?>