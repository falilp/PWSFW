<?php
function restablecer_contrasenna($pass, $codUsuario)
{
    //Conexion a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "ADMIN", '', "kmb") or die("Conexion fallida");

    //Generamos la consulta
    $consulta = "UPDATE usuario SET pass='$pass' WHERE codUsuario='$codUsuario'";
    //La mandamos
    $resultado = mysqli_query($conexion, $consulta);

    if($resultado)
    {
        header("Location:Location:http://localhost/PWSFW/PW/resources/views/Indice.php");
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }
}

$npass=$_POST['pass'];
$codUsuario=$_POST['cambios'];

restablecer_contrasenna($npass, $codUsuario);
?>