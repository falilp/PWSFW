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
            <h1>Mi Cuenta
            <img class="logo" src="../img/logoKMB.png">
            </h1>
        </header>
        <nav>
            <div id="menu">
                <ul>
                <?php include_once '../../Back/sesion.php'; $ses = new Sesion();?>
                    <?php if(isset($_SESSION['usuario'])):?>
                        <li class="linea">
                        <a href="Cuenta.php"><?php echo $ses->retornarSesion()?></a>
                        <?php   $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
                                $email=$ses->retornarSesion();
                                $consulta = "SELECT * FROM usuario WHERE email = '$email'";
                                $resultado = $conexion->query($consulta);
                                $objeto = $resultado->fetch_array(); ?>
                        <?php if($objeto[6] == 1):?>
                            <ul class="dropdowngtx">
                                <li class="despegable"><a href="vistaAdmin.php">Gestión</a></li>
                                <li class="despegable"><a href="../../Back/logOut.php">Cerrar Sesion</a></li>
                            </ul>
                        <?php else: ?>    
                            <ul class="dropdowngtx">
                                <li class="despegable"><a href="MisReservas.php">Mis reservas</a></li>
                                <li class="despegable"><a href="../../Back/logOut.php">Cerrar Sesion</a></li>
                            </ul>
                        <?php endif ?>
                    </li>
                    <?php else: ?> 
                        <li class="linea">
                                <a href="Login.html">Acceso</a>
                                <ul class="dropdowngtx">
                                    <li class="despegableA"><a href="Login.html">Login</a></li>
                                    <li class="despegableA"><a href="Registro.html">Registro</a></li>
                                </ul>
                            </li>                        
                    <?php endif ?>
                    <li class="linea">
                        <a href="Instalaciones.php">Instalaciones</a>
                        <ul class="dropdowngtx">
                            <li class="despegable"><a href="AlquilarBaloncesto.php">Baloncesto</a></li>
                            <li class="despegable"><a href="AlquilarVoleibol.php">Voleibol</a></li>
                            <li class="despegable"><a href="AlquilarFs.php">Fútbol Sala</a></li>
                            <li class="despegable"><a href="AlquilarF7.php">Fútbol 7</a></li>
                            <li class="despegable"><a href="AlquilarF11.php">Fútbol 11</a></li>
                            <li class="despegable"><a href="AlquilarPadel.php">Pádel</a></li>
                            <li class="despegable"><a href="AlquilarTenis.php">Tenis</a></li>
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
                                            <th>Cancelar Evento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ");
                                            foreach($eventos as $fila)
                                            {
                                                $consulta_mensaje= "SELECT mensaje FROM pista WHERE tipoPista=".$fila['0']."";
                                                $result = mysqli_query($conexion, $consulta_mensaje);
                                                $mensaje = $result->fetch_array();
                                                
                                                echo "<tr>";
                                                    echo "<td>".$mensaje['0']."</td>";
                                                    echo "<td>".$fila['1']."</td>";
                                                    echo "<td>".$fila['2']."</td>";
                                                    echo "<td>".$fila['4']."</td>";
                                                    print("<form method=\"POST\" action=\"../../Back/deleteEvento.php\">           
                                                            <input type=\"hidden\" name=\"cancelar\" id=\"cancelar\" value=".$fila[3].">
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
        <footer class="PiePagina" id="Contacto">
            <div class="Columna">
                <a href="https://www.uca.es/" title="Logo Escuela Superior Ingenieria">                     <!--Enlace a la pagina de la UCA-->
                    <img src="../img/LogoUCA.png" alt="Logo Escuela Superior Ingenieria" class="UCA" >    <!--Logo UCA-->
                </a>
            </div>

            <div class="Columna">
                <!--Area de Contacto-->
                <ul class="Contacto">
                    <li><h5>KMBsports© 2023</h5></li>                           <!--Nombre de la Empresa-->
                    <li><a class ="Parrafos" href=mailto:atencionCliente@kmbsports.com>Email: atencionCliente@kmbsports.com</a></li>    <!--Correo-->
                    <li><p class="Parrafos">Telefono: +34 945678332 </p></li>                      <!--Telefono-->
                </ul>
            </div>

            <div class="Columna">
                <!--Area de Contacto-->
                <ul class="Contacto">
                    <li><a class ="Parrafos" href=mailto:direccion.esi@uca.es>Email: direccion.esi@uca.es</a></li>          <!--Correo-->
                    <li><p class="Parrafos">Telefono: +34 956483200  </p></li>                         <!--Telefono-->
                    <li><p class="Parrafos">Dirección: Avda. Universidad de Cádiz, nº 10</p></li>      <!--Direccion UCA-->
                    <li><p class="Parrafos">CP 11519 Puerto Real, Cádiz</p></li>                       <!---->
                </ul>
            </div>
        </footer>  
    </body>
</html>