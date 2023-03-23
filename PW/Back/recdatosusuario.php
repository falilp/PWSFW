<?php
function recuperar_datos($email)
{
    //Conexion a la base de datos y creacion de la consulta
    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
    $consulta = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conexion->query($consulta);
    $objeto = $resultado->fetch_array();

    //Mostramos los nombres en formularios para que el usuario pueda realizar los cambios que desee
    print("<h1>Mi cuenta</h1>");
    print("<h2>Ajustes</h2>");
    print("<form action=\"guardarcambiosusuario.php\" method=\"POST\">
            <p>
                <label>Nombre:<strong>".$objeto['1']."</strong></label><br>
                <input type=\"text\" name=\"nombre\">
            </p>
            <p>
                <label>Apellidos:<strong>".$objeto['2']."</strong></label><br>
                <input type=\"text\" name=\"primerapellido\">
            </p>
            <p>
                <label>Teléfono:<strong>".$objeto['5']."</strong></label><br>
                <input type=\"numer\" name=\"telefono\">
            </p>
            <button type=\"submit\" name=\"cambios\" value=".$objeto['0'].">Guardar cambios</button>
        </form>
    ");
}

//Obtener las credenciales del usuario actual
include_once './sesion.php'; 
$ses = new Sesion();
if(isset($_SESSION['usuario'])){
    recuperar_datos($ses->retornarSesion());
}else{
    header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
}

?>