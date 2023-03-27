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
            //SELECCIONA LA FECHA DE ALQUILER
            //Rescatar codigo de pista
            $tipoPista = $_POST['pista'];
                //Conexion con la base de datos
                $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");

                //De codPista a mensaje
                $consulta_mensaje= "SELECT mensaje FROM pista WHERE tipoPista=".$tipoPista."";
                $result = mysqli_query($conexion, $consulta_mensaje);
                $mensaje = $result->fetch_array();
                $mensaje = $mensaje['0'];
                
                    //Obtenemos la fecha actual
                    $fechaActual = date('Y-m-d');
                    $diaActual = date('d', strtotime($fechaActual));
                    $mesActual = date('m', strtotime($fechaActual));
                    $anioActual = date('Y', strtotime($fechaActual));
            
                //Consultamos con eventos
                    $consultaEvento = "SELECT DAY(FechaEvento),codPista FROM evento WHERE MONTH(FechaEvento) = '$mesActual' AND YEAR(FechaEvento) = '$anioActual' AND DAY(FechaEvento) >= $diaActual";
                    $resultadoEvento = mysqli_query($conexion, $consultaEvento);
            
                    $consultaPistas = "SELECT DAY(HoraDisponible), tipoPista, disponible FROM pista WHERE MONTH(HoraDisponible) = '$mesActual' AND YEAR(HoraDisponible) = '$anioActual' AND DAY(HoraDisponible) >= $diaActual";
                    $resultadoPistas = mysqli_query($conexion, $consultaPistas);
            
                    if($resultadoEvento && $resultadoPistas)
                    {
                        $fechasOcupadasEventos = $resultadoEvento->fetch_all();
                        $fechasOcupadasPistas = $resultadoPistas->fetch_all();
                        echo "<div class=\"form_container\">";
                            echo "<form action=\"./formulario_evento.php\" method=\"post\">";
                            print("<label>Pista Seleccionada: $mensaje</label><br>");
                                echo "<label>Selecciona Fecha</label>";
                                echo "<select id=\"select\" name=\"fecha\" action=\"./formulario_evento.php\">";
                                        while($diaActual <= cal_days_in_month(0, $mesActual, $anioActual)){
                                            $disp = true;
                                            //No hay ningun evento el mismo dia
                                            if(!empty($fechasOcupadasEventos))
                                            {
                                                foreach($fechasOcupadasEventos as $diaEvento)
                                                {
                                                    if($diaActual == $diaEvento['0'] && $disp && $tipoPista == $diaEvento['1'])
                                                    {
                                                        $disp = false;
                                                    }
                                                }
                                            }
                                            //La pista esta disponible durante todo el dia
                                            if($disp)
                                            {
                                                if(!empty($fechasOcupadasPistas))
                                                {
                                                    foreach($fechasOcupadasPistas as $diaPista)
                                                {
                                                    if($diaActual == $diaPista['0'] && $disp && $tipoPista == $diaPista['1'] && $diaPista['2'] == 1)
                                                    {
                                                        $disp = false;
                                                    }
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
                            echo "<input type=\"hidden\" name=\"pista\" value=\"$tipoPista\">";
                            echo "<button type=\"submit\">Mirar pistas disponibles</button>";
                        echo "</form>";
                        echo "</div>";
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
</html>

