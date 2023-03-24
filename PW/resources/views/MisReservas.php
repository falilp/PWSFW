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
                            <li class="despegable"><a href="">Mis reservas</a></li>
                            <li class="despegable"><a href="../../Back/logOut.php">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                    <?php else:?>
                        <li class="linea">
                                <a href="Login.html">Acceso</a>
                                <ul class="dropdowngtx">
                                    <li class="despegable"><a href="Login.html">Login</a></li>
                                    <li class="despegable"><a href="Registro.html">Registro</a></li>
                                </ul>
                            </li>
                    <?php endif ?>
                    <li class="linea">
                        <a href="Instalaciones.php">Instalaciones</a>
                        <ul class="dropdowngtx">
                            <li class="despegable"><a href="">Baloncesto</a></li>
                            <li class="despegable"><a href="">Voleibol</a></li>
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

                    //Consulta para obtener el codUsuario
                    $consulta1 = "SELECT * FROM usuario WHERE email = '$email'";
                    $resultado1 = $conexion->query($consulta1);
                    $objeto = $resultado1->fetch_array();
                    $codUsuario=$objeto['0'];
                    

                    //Consulta para obtener los datos de las reservas
                    $consulta2 = "SELECT codPista,fecha_alquiler,precio FROM alquiler WHERE codUsuario='$codUsuario'";
                    //Realizamos la nueva consulta
                    $resultado2 = mysqli_query($conexion, $consulta2);
                    if($resultado2)
                    {
                        $reservas = $resultado2->fetch_all();
                            //Mostramos en una tabla las reservas de PISTAS
                            print("<h2>Reserva de pistas</h2>");
                            print("
                            <table>
                                <thead>
                                    <tr>
                                    <th>Pista</th>
                                    <th>Fecha</th>
                                    <th>Precio</th>
                                    <th>Cancelar Alquiler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ");
                                    foreach($reservas as $fila)
                                    {
                                        //Realizamos la busqueda para devolver el tipo de pista que es
                                        $consulta_mensaje= "SELECT mensaje FROM pista WHERE codPista=".$fila['0']."";
                                        $result = mysqli_query($conexion, $consulta_mensaje);
                                        $mensaje = $result->fetch_array();
                                        echo "<tr>";
                                        echo "<td>".$mensaje['0']."</td>";
                                        echo "<td>".$fila['1']."</td>";
                                        echo "<td>".$fila['2']."</td>";
                                        print("<form method=\"POST\" action=\"../../Back/deleteAlquiler.php\">           
                                                    <input type=\"hidden\" name=\"cancelar\" id=\"cancelar\" value=".$fila[0].">
                                                    <td>
                                                        <input type=\"submit\" value=\"cancelar\">
                                                    </td>
                                                </form>");
                                        echo "</tr>";
                                    }
                            print("
                                </tbody>
                            </table>
                            ");
                        }else{
                            header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
                        }

                        //Otra tabla para la reservas de eventos
                        $consulta3 = "SELECT * FROM evento WHERE codUsuario='$codUsuario'";
                        $resultado3 = mysqli_query($conexion,$consulta3);
                        if($resultado3){
                            $eventos=$resultado3->fetch_all();
                                //Mostramos los eventos
                                //de codigo de pista a mensaje
                                    print("<h2>Eventos</h2>");
                                    print("
                                    <table>
                                        <thead>
                                            <tr>
                                            <th>Pista</th>
                                            <th>Fecha del Evento</th>
                                            <th>Descripcion</th>
                                    
                                            <th>categoria</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ");
                                            foreach($eventos as $fila)
                                            {
                                                $consulta_mensaje= "SELECT mensaje FROM pista WHERE codPista=".$fila['0']."";
                                                $result = mysqli_query($conexion, $consulta_mensaje);
                                                $mensaje = $result->fetch_array();
                                                echo "<tr>";
                                                    echo "<td>".$mensaje['0']."</td>";
                                                    echo "<td>".$fila['1']."</td>";
                                                    echo "<td>".$fila['2']."</td>";
                                                    echo "<td>".$fila['4']."</td>";
                                                echo "</tr>";
                                            }
                                    print("
                                        </tbody>
                                    </table>
                                    ");
                    }else{
                    header("Location:http://localhost/PWSFW/PW/resources/views/paginaERROR.html");
                }
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