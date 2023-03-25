<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="../views/Main.css">
        <link rel="stylesheet" href="../views/EstiloGeneral.css">
        <link rel="icon" href="../img/iconoPagina.ico" >

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title>KMBsports.com</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <body class="Cuerpo">
        <h1 id="cuerpo_h1"> Principal
        <img class="logo" src="../img/logoKMB.png">
        </h1>
        <nav>
            <div id="menu">
                <ul>
                    <!--PARTE DE ACCESO QUE MUESTRA EL EMAIL-->
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
                        <!--PARTE DE ACCESO QUE MUESTRA EL EMAIL-->
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
        <div class="AcercaDe">
                <div class="Nosotros">
                    <h1>¡Bienvenidos a KMB, el mejor sitio para alquilar pistas deportivas!</h1>
                    <p>
                    Si eres un apasionado del deporte y buscas una forma fácil y accesible de practicar tus habilidades, 
                    estás en el lugar correcto. En KMB, ofrecemos un servicio de alquiler de pistas deportivas que te permitirá 
                    disfrutar de tus deportes favoritos sin tener que preocuparte por nada más.
                    </p>
                        </div>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/6-EqlQMPmDI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <div class="Nosotros">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/qnZ5hzzSi1c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    
                    <p>
                    Tenemos una amplia variedad de pistas deportivas disponibles para alquilar, desde pistas de tenis y paddle hasta pistas de 
                    fútbol, baloncesto y vóley. Todas nuestras pistas deportivas están en perfectas condiciones y están diseñadas para adaptarse a todo 
                    tipo de niveles, desde principiantes hasta expertos.<br>
                    
                    <br>Además, nuestro servicio de alquiler de pistas deportivas es muy fácil de usar. Simplemente selecciona la pista deportiva que más te guste y 
                    reserva tu horario a través de nuestra página web. También ofrecemos precios muy competitivos y descuentos.
                    </p>
            </div>
                    
            <div class="AcercaDe">
            <div class="Nosotros">
                <h1>También te puede interesar:</h1>
                <ul>
                    <li><a href="https://instagram.com/esileague?igshid=YmMyMTA2M2Y=">@esileague</a></li>
                    <li><a href="https://twitter.com/elchiringuitotv">@elchiringuitotv</a></li>
                    <li><a href="https://twitter.com/i/status/1623686348010934272">Origen del nombre de la página</a></li>
                    </ul>
                    </div>
                    <img src="https://okdiario.com/img/2021/11/20/sandra-sanchez.jpg" title="">
                    </div>
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