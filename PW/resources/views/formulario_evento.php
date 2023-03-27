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
            $fecha = $_POST['fecha'];
            $dia = date('d', strtotime($fecha));
            $mes = date('m', strtotime($fecha));
            $anio = date('Y', strtotime($fecha));

                //Conexion con la base de datos
                $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");
                $consulta = "SELECT codPista FROM pista WHERE disponible='0' AND YEAR(HoraDisponible) = '$anio' AND MONTH(HoraDisponible) = '$mes' AND DAY(HoraDisponible) = '$dia' AND HOUR(HoraDisponible)='10'";
                $resultado = mysqli_query($conexion, $consulta);
                    //Selecciona la pista
                        //Mostrar pistas para elegir
                    print("<div class=\"form_container\">
                    <div class=\"form_container\">
                    <form action=\"../../Back/regEvento.php\" method=\"POST\">
                    ");
                        if($resultado){
                            print("
                            <label>Selecciona la pista: </label>
                            <select id=\"select\" name=\"codpista\">
                        ");
                            $pistas_disponibles = $resultado->fetch_all();
                            $contador = 1;
                            foreach($pistas_disponibles as $pista){
                                $codpista = $pista['0'];
                                echo "<option value=\"".$codpista."\">Pista $contador</option>";
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
                    echo "<input type=\"hidden\" name=\"pista\" value=\"$tipoPista\">";
                    echo "<input type=\"hidden\" name=\"fecha\" value=\"$fecha\">";
                    echo "<button type=\"submit\" name=\"pista\" value=\"Mirar Pistas disponibles\">Reservar</button>";
                    echo "</div>";
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

