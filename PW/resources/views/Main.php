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