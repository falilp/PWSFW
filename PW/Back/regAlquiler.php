<?php
function registrarAlquiler($codigoUsu, $fechaA, $fechaR, $precio, $descuento){
    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
    $consulta = "INSERT INTO alquiler (codUsuario,fecha_alquiler,fecha_reserva,precio,Descuento) VALUES ('$codigoUsu','$fechaA','$fechaR','$precio','$descuento')";
    
    if(mysqli_query($conexion,$consulta)){
        header("Location:http://localhost/PWSFW/PW/resources/views/Indice.php"); 
    }else{
        header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
    }
    
    mysqli_close($conexion);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $codigoUsu = $_POST['codUsuario'];
    $fechaA= $_POST['fechaA'];
    $fechaR = $_POST['fechaR'];
    $precio= $_POST['precio'];
    $descuento= $_POST['descuento'];

    registrarAlquiler($codigoUsu, $fechaA, $fechaR, $precio, $descuento);
}
?>