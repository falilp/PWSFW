<?php
function registrarPista($tipo,$precio,$disponible,$mensaje,$hora){
    $dicc = array(1=>"Pista de fútbol 11",2=>"Pista de fútbol 7",3=>"Pista de fútbol sala",4=>"Pista de tenis",5=>"Pista de baloncesto",6=>"Pista de voleibol",7=>"Pista de pádel");
    if($tipo == $mensaje){
        $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
        $consulta = "INSERT INTO pista (tipoPista,precioHora,disponible,mensaje,HoraDisponible) VALUES ('$tipo','$precio','$disponible','$dicc[$mensaje]','$hora')";
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