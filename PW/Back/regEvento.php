<?php 
function mostrar_eventos_sistema($fecha)
{
     //Conexion con la base de datos
        $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");

    //Obtenemos la fecha actual
        $fechaActual = date('Y-m-d');
        $diaActual = date('d', strtotime($fechaActual));
        $mesActual = date('m', strtotime($fechaActual));
        $anioActual = date('Y', strtotime($fechaActual));

    //Consultamos con eventos
        $consultaEvento = "SELECT FechaEvento FROM evento WHERE MONTH(FechaEvento) = '$mesActual' AND YEAR(FechaEvento) = $anioActual AND DAY(FechaEvnto) >= $diaActual";
        $resultadoEvento = mysqli_query($conexion, $consultaEvento);

        $consultaPistas = "SELECT fecha_alquiler FROM alquiler WHERE MONTH(fecha_alquiler) = '$mesActual' AND YEAR(fecha_alquiler) = $anioActual AND DAY(fecha_alquiler) >= $diaActual";
        $resultadoPistas = mysqli_query($conexion, $consultaPistas);

        if($resultadoEvento || $resultadoPistas)
        {
            $fechasOcupadasEventos = $resultadoEvento->fetch_all();
            //$fechasOcupadasPistas = $resultadoPistas->fetch_all();

            echo "<label>Selecciona Fecha</label>";
            echo "<select id=\"select\" name=\"fecha\">";
            while($diaActual <= cal_days_in_month(0, $mesActual, $anioActual)){

                echo "<option value=\"$fechaActual\">$fechaActual</option>";
            }
            echo "</select>";
            
        }
}

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
    if(mysqli_query($conexion,$consulta)){
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