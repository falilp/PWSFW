<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="../views/EstiloIndice.css">
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
        <h1 id="cuerpo_h1">¡Bienvenido a KMB!
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
                <h1>Nosotros</h1>
                <p>Con el pretexto de fomentar el deporte en la bahia de Cádiz, se creo KMB Sports, unas instalaciones deportivas multivariadas que pretende ser accesible para todo el publico gaditano.</p>
                <p>Ponemos a la disposicion del publico campos de futbol sala, futbol 7 y 11, pistas de padel y tenis.</p>
                <h5><strong>Nos encontramos en:</strong></h5>
            </div>

            <div class="Localizacion">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51291.11754814997!2d-6.214796951440422!3d36.537355689097694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152f79854b8f0de1%3A0x8d075bd9e5895558!2sEscuela%20Superior%20de%20Ingenier%C3%ADa!5e0!3m2!1ses!2ses!4v1678301567545!5m2!1ses!2ses" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
            </div>
        </div>

        <div class="Imagen">
            <img src="../img/Centro.jpg" class="img-fluid" alt="Centro">
        </div>
        <div class="Frase">
            <p><em>“El movimiento es una medicina para crear el cambio físico, emocional y mental.”</em></p>
            <p><strong>Carol Welch</strong></p>
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