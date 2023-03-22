<?php 
class Sesion{
    public function __construct(){
        session_start();
    }

    public function usuarioActual($email){
        $_SESSION['usuario'] = $email;
    }

    public function retornarSesion(){
        return $_SESSION['usuario'];
    }

    public function cerrarSesion(){
        session_unset();
        session_destroy();
        header("Location:http://localhost/ProgramacionWebSinFrameWork/PW/resources/views/Indice.php");
    }
}
?>