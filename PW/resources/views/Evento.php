<!DOCTYPE html>
<html lang="es">
    <Head>
        <title> Registro de Evento </title>
        <meta charset="utf-8">
        <link rel="icon" href="../img/iconoPagina.ico" >
        <link rel="stylesheet" href="EstiloEventoCSS.css">
    </Head>
    <body>
        <!-- Vista Encargada de registrar Evento--->
        <header>
            <h1 id="title_body_1">¡Bienvenido a la sección de reserva de Eventos de KMB!
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
                        <ul class="dropdowngtx">
                            <li class="despegable"><a href="MisReservas.php">Mis reservas</a></li>
                            <li class="despegable"><a href="../../Back/logOut.php">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                    <?php else:?>
                        <li class="linea">
                                <a href="Login.html">Acceso</a>
                                <ul class="dropdowngtx">
                                    <li class="despegableA"><a href="Login.html">Login</a></li>
                                    <li class="despegableA"><a href="Registro.html">Registro</a></li>
                                </ul>
                            </li>
                    <?php endif ?>
                    <li class="linea"><a href="Main.php">Principal</a></li>
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
            <article>
                <div class="slide">
                    <div class="slide-inner">
                        <input class="slide-open" type="radio" id="slide-1" 
                                name="slide" aria-hidden="true" hidden="" checked="checked">
                        <div class="slide-item">
                            <img src="../img/niñosCumpleaños.jpg">
                            <label class="slide-text">¡Celebra tu cumpleaños con nosotros!
                            </label>
                        </div>
                        <input class="slide-open" type="radio" id="slide-2" 
                                name="slide" aria-hidden="true" hidden="">
                        <div class="slide-item">
                            <img src="https://www.xtrafondos.com/wallpapers/seleccion-argentina-con-trofeo-copa-mundial-fifa-11268.jpg">
                            <label class="slide-text">Crea un torneo y compite para ser el mejor
                            </label>
                        </div>
                        <input class="slide-open" type="radio" id="slide-3" 
                                name="slide" aria-hidden="true" hidden="">
                        <div class="slide-item">
                            <img src="https://fondosmil.com/fondo/5803.jpg">
                            <label class="slide-text">Crea tu propio evento y pásatelo en grande con tus amigos
                            </label>
                        </div>
                        <label for="slide-3" class="slide-control prev control-1">‹</label>
                        <label for="slide-2" class="slide-control next control-1">›</label>
                        <label for="slide-1" class="slide-control prev control-2">‹</label>
                        <label for="slide-3" class="slide-control next control-2">›</label>
                        <label for="slide-2" class="slide-control prev control-3">‹</label>
                        <label for="slide-1" class="slide-control next control-3">›</label>
                        <ol class="slide-indicador">
                            <li>
                                <label for="slide-1" class="slide-circulo">•</label>
                            </li>
                            <li>
                                <label for="slide-2" class="slide-circulo">•</label>
                            </li>
                            <li>
                                <label for="slide-3" class="slide-circulo">•</label>
                            </li>
                        </ol>
                
            </article>   
        </main> 
    <?php if(isset($_SESSION['usuario'])):?>
        <section class="form_1_subtitle">
            <h2>Haz tu Reserva</h2>
            <p id="p_form">
                ¡Disfruta en familia o con amigos de los eventos personalizados de KMB!
            </p>   
        </section> 
        <!--SELECCIONA TIPO DE PISTA-->
        <?php 
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            print("<div class=\"form_container\">
                <form method=\"post\" action=\"\">
                        <label>Selecciona Pista: </label>
                        <select id=\"select\" name=\"pista\">
                            <option value=\"3\">Futbol Sala</option>
                            <option value=\"4\">Tenis</option>
                            <option value=\"5\">Baloncesto</option>
                            <option value=\"6\">Voleibol</option>
                            <option value=\"7\">Padel</option>
                            <option value=\"2\">Futbol 7</option>
                            <option value=\"1\">Futbol 11</option>
                        </select>
                    <input type=\"submit\" value=\"Mirar dias Disponibles\">
                </form>
            </div>");
        }else{
            //SELECCIONA LA FECHA DE ALQUILER
            //Rescatar codigo de pista
            $tipoPista = $_POST['pista'];
            if($_SERVER["REQUEST_METHOD"] != "POST"){ 
                //Conexion con la base de datos
                $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");

                //De codPista a mensaje
                $consulta_mensaje= "SELECT mensaje FROM pista WHERE tipoPista=".$tipoPista."";
                $result = mysqli_query($conexion, $consulta_mensaje);
                $mensaje = $result->fetch_array();
                $mensaje = $mensaje['0'];
                print("<label>Pista Seleccionada: $mensaje</label>");
                
                    //Obtenemos la fecha actual
                    $fechaActual = date('Y-m-d');
                    $diaActual = date('d', strtotime($fechaActual));
                    $mesActual = date('m', strtotime($fechaActual));
                    $anioActual = date('Y', strtotime($fechaActual));
            
                //Consultamos con eventos
                    $consultaEvento = "SELECT DAY(FechaEvento),codPista FROM evento WHERE MONTH(FechaEvento) = '$mesActual' AND YEAR(FechaEvento) = '$anioActual' AND DAY(FechaEvento) >= $diaActual";
                    $resultadoEvento = mysqli_query($conexion, $consultaEvento);
            
                    $consultaPistas = "SELECT DAY(HoraDisponible), tipoPista FROM pista WHERE MONTH(HoraDisponible) = '$mesActual' AND YEAR(HoraDisponible) = '$anioActual' AND DAY(HoraDisponible) >= $diaActual";
                    $resultadoPistas = mysqli_query($conexion, $consultaPistas);
            
                    if($resultadoEvento && $resultadoPistas)
                    {
                        $fechasOcupadasEventos = $resultadoEvento->fetch_all();
                        $fechasOcupadasPistas = $resultadoPistas->fetch_all();
                        echo "<div class=\"form_container\">";
                        echo "<form action=\"\" method=\"post\">";
                        echo "<label>Selecciona Fecha</label>";
                        echo "<select id=\"select\" name=\"fecha\" action=\"\">";
                        while($diaActual <= cal_days_in_month(0, $mesActual, $anioActual)){
                            $disp = true;
                            //No hay ningun evento el mismo dia
                            foreach($fechasOcupadasEventos as $diaEvento)
                            {
                                if($diaActual == $diaEvento['0'] && $disp && $tipoPista == $diaEvento['1'])
                                {
                                    $disp = false;
                                }
                            }
                            //La pista esta disponible durante todo el dia
                            if($disp)
                            {
                                foreach($fechasOcupadasPistas as $diaPista)
                                {
                                    if($diaActual == $diaPista['0'] && $disp && $tipoPista == $diaPista['1'])
                                    {
                                        $disp = false;
                                    }
                                }
                            }
                            if($disp)
                            {
                                echo "<option value=\"$fechaActual\">$fechaActual</option>";
                            }
                            $diaActual++;
                            $fechaActual= $anioActual."-".$mesActual."-".$diaActual;
                        }
                        echo "</select>";
                        echo "<input type=\"submit\" value=\"Mirar pistas disponibles\">";
                    }
                    echo "</form>";
                    echo "</div>";
                }else{
                    //SELECCIONA LA PISTA QUE QUIERE Y CATEGORIA Y DESCRIPCION
                    //Rescatamos el valor de fecha
                    $fecha = $_POST['fecha'];
                    print $fecha;

                    //Selecciona la pista
                        //Mostrar pistas para elegir
                    print("<div class=\"form_container\">
                    <div class=\"form_container\">
                    <form action=\"../../Back/regEvento.php\" method=\"POST\">
                    ");
                        $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
                        $consulta4 = "SELECT codPista FROM pista WHERE disponible='0' AND CONVERT(DATE, HoraDisponible) = '$fecha'";
                        $result = mysqli_query($conexion, $consulta4);
                        if($result){
                            print("
                            <label> Selecciona la pista: </label>
                            <select id=\"select\" name=\"codpista\">
                        ");
                            $pistas_disponibles = $result->fetch_all();
                            $contador = 1;
                            foreach($pistas_disponibles as $pista){
                                $codpista = $pista['0'];
                                echo "<option value=\"".$pista['0']."\">Pista $contador</option>";
                                $contador++;
                            }
                            echo "</select>";
                        }

                        print("
                        <p>
                        <label>Categoría: </label>
                        <select id=\"select\" name=\"categoria\">
                            <option>Cumpleaños</option>
                            <option>Torneo</option>
                        </select>
                        <br>"
                    );
                    print("
                    <label>Introduce descripción: </label>
                    <input type=\"text\" id=\"descrip\" name=\"descripcion\"> 
                    ");
                    echo "<button type=\"submit\" name=\"pista\" value=\"$tipoPista\">Reservar</button>";
                    echo "</div>";
                }
            }
            ?>   
            </div>
        </form>
        </section>
    <?php else:?>
        <p id="p_form">
            Es necesario estar registrado para poder realizar un evento.
        </p>
            <p id="p_form"><a class="linea"><a href="Login.html">Iniciar Sesión</a></p>
    <?php endif ?>
        <section>
            <!--Eventos creados por el administrador del sistema-->
                <!--<h2>Nuestros eventos: </h2>-->
        </section>
    </body>

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
</html>

