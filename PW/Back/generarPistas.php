<?php
function Generar(){
    $date = new DateTime();
    $date->modify('+1 day');

    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");

    $dicc = array(1=>"Pista de fútbol 11",2=>"Pista de fútbol 7",3=>"Pista de fútbol sala",4=>"Pista de tenis",5=>"Pista de baloncesto",6=>"Pista de voleibol",7=>"Pista de pádel");
    $horas = array(1=>"10" , 2=>"11" ,3=>"12" , 4=>"13" , 5=>"15" , 6=>"16" , 7=>"17" , 8=>"18" , 9=>"19" , 10=>"20" , 11=>"21");
    $precio = array(1=>"22",2=>"17",3=>"15",4=>"12",5=>"20",6=>"20",7=>"12");

    for($dia=1;$dia<=7;$dia++){
        $date2 = clone $date;
        for($index = 1; $index <= 7; $index++){
            for($index2 = 1; $index2 <= 11; $index2++){

                $date2->setTime($horas[$index2],0,0);
                $date_formatted = $date2->format('Y-m-d H:i:s');
                $insert = "INSERT INTO pista (tipoPista,precioHora,disponible,mensaje,HoraDisponible) VALUES ('$index','$precio[$index]','0','$dicc[$index]','$date_formatted')";
                $conexion->query($insert);
    
            }
        }
        $date2->modify('+1 day');
        $date = $date2;
    }
}
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    Generar();
}
?>