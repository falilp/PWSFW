<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta title="Mi cuenta">
        <link rel="icon" href="../img/iconoPagina.ico" >
        <link rel="stylesheet" href="EstiloCuenta.css">
    </head>
    <body>
        <header>
            <h1>Mi Cuenta</h1>
        </header>
        <nav>
            <div id="menu">
                <ul>
                    <?php include_once '../../Back/sesion.php'; $ses = new Sesion();?>
                    <?php if(isset($_SESSION['usuario'])):?>
                    <li class="linea">
                        <a href="Instalaciones.php"><?php echo $ses->retornarSesion()?></a>
                        <ul class="dropdowngtx">
                            <li class="despegable"><a href="Cuenta.php">Cuenta</a></li>
                            <li class="despegable"><a href="MisReservas.php">Mis reservas</a></li>
                            <li class="despegable"><a href="../../Back/logOut.php">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                    <?php else:?>
                        <li class="linea"><a href="Login.html">Acceso</a></li>
                    <?php endif ?>
                    <li class="linea">
                        <a href="Instalaciones.php">Instalaciones</a>
                        <ul class="dropdowngtx">
                            <li class="despegable"><a href="">Baloncesto</a></li>
                            <li class="despegable"><a href="">Fútbol Sala</a></li>
                            <li class="despegable"><a href="">Fútbol 7</a></li>
                            <li class="despegable"><a href="">Fútbol 11</a></li>
                            <li class="despegable"><a href="">Pádel</a></li>
                            <li class="despegable"><a href="">Tenis</a></li>
                        </ul>
                    </li>
                    <li class="linea"><a href="Evento.php">Eventos</a></li>
                    <li class="linea"><a href="Indice.php">Sobre Nosotros</a></li>
                </ul>
            </div>
    </nav>
        <main>
            <!--Codigo PHP-->
            <div class="container_form">
            <?php
                function recuperar_datos($email)
                {
                    //Conexion a la base de datos y creacion de la consulta
                    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
                    $consulta = "SELECT * FROM usuario WHERE email = '$email'";
                    $resultado = $conexion->query($consulta);
                    $objeto = $resultado->fetch_array();
                    
                    //Mostramos los nombres en formularios para que el usuario pueda realizar los cambios que desee
                    print("<form action=\"../../Back/guardarcambiosusuario.php\" method=\"POST\">
                    <h2>Ajustes de usuario</h2>
                    <img src=\"../img/logoUSUARIOPERFIL.jpg\">
                            <p>
                                <label>Nombre:</label><br>
                                <input type=\"text\" name=\"nombre\" value=".$objeto['1'].">
                            </p>
                            <p>
                                <label>Apellidos:</label><br>
                                <input type=\"text\" name=\"primerapellido\" value=".$objeto['2'].">
                            </p>
                            <p>
                                <label>Teléfono:</label><br>
                                <input type=\"numer\" name=\"telefono\" value=".$objeto['5'].">
                            </p>
                            <button type=\"submit\" name=\"cambios\" value=".$objeto['0'].">Guardar cambios</button>
                        </form>
                    ");

                    //Restablecer la contraseña
                    print(
                        "
                        <form action=\"\" method=\"POST\">
                            <button type=\"submit\" name=\"cambios\" value=".$objeto['0'].">Restablecer contraseña</button>
                        </form>
                        "
                    );

                }
                //Obtener las credenciales del usuario actual
                include_once '../../Back/sesion.php'; 
                //$ses = new Sesion();
                if(isset($_SESSION['usuario'])){
                    recuperar_datos($ses->retornarSesion());
                }else{
                    header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
                }
            ?>
            </div>
        </main>
        <footer class="PiePagina">
        <div class="Columna">
            <a href="https://www.uca.es/" title="Logo Escuela Superior Ingenieria">
                <img src="../img/LogoUCA.png" alt="Logo Escuela Superior Ingenieria" class="UCA" >
            </a>
        </div>
        
        <div class="Columna">
            <p class="Parrafos">KMB Sports</p>
        </div>
        <div class="Columna">
            <ul class="Contacto">
                <li><p class="Parrafos">Email: kmbsports@hotmail.com</p></li>
                <li><p class="Parrafos">Telefono: 897430635</p></li>
            </ul>
        </div>
</footer>   
    </body>
</html>