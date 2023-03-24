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
                                    <li class="despegable"><a href="Login.html">Login</a></li>
                                    <li class="despegable"><a href="Registro.html">Registro</a></li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <!--PARTE DE ACCESO QUE MUESTRA EL EMAIL-->
                    <li class="linea"><a href="Principal.php">Principal</a></li>
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
                    <h1>Ven a nuestras pistas y llevate una experiencia inolvidable</h1>
                </div>
            </div>
        </body>

        <div class="Imagen">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/fbqHK8i-HdA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

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