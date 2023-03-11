<?php
function registrarPista($tipo,$precio,$disponible,$mensaje){
    $dicc = array(1=>"Pista de fútbol",2=>"Pista de tenis",3=>"Pista de baloncesto",4=>"Pista de voleibol",5=>"Pista de pádel");
    if($tipo == $mensaje){
        $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
        $consulta = "INSERT INTO pista (tipoPista,precioHora,disponible,mensaje,valoracion) VALUES ('$tipo','$precio','$disponible','$dicc[$mensaje]','0')";
        if(mysqli_query($conexion,$consulta)){
            echo "Pista registrada.";
        }else{
            echo "No se pudo registrar la Pista.";
        }
        mysqli_close($conexion);
    }else{
        echo "El tipo de pista y el mensaje no tienen correlación";
    }    
}
?>