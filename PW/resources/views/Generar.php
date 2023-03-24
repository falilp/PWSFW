<!DOCTYPE html>
<html lang="es">
    <Head>
        <title> Generar Pistas </title>
        <meta charset="utf-8">
        <link rel="icon" href="../img/iconoPagina.ico" >
        <link rel="stylesheet" href="EstiloEventoCSS.css">
    </Head>
    <body>
        <!-- Vista Encargada de registrar Evento--->
        <header>
            <h1 id="title_body_1">¡Bienvenido a la sección de reserva de Eventos de KMB!</h1>
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
                                    <li class="despegable"><a href="Login.html">Login</a></li>
                                    <li class="despegable"><a href="Registro.html">Registro</a></li>
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
        <div class="form_container">
            <form method="post" action="../../Back/generarPistas.php">
                    <label>generar Pistas: </label>
                <input type="submit" value="Generar">
            </form>
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

