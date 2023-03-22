<!DOCTYPE html>
<html lang="es">
    <header>
        <link rel="stylesheet" href="EstiloInstalaciones.css">
        <link rel="stylesheet" href="EstiloGeneral.css">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

        <title>KMBsports.com</title>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" href="../img/iconoPagina.ico" >
    </header>

    <body class="Cuerpo">
        <h1 id="h1_cuerpo">Instalaciones</h1>
        <nav>
            <div id="menu">
                <ul>
                    <?php include_once '../../Back/sesion.php'; $ses = new Sesion();?>
                    <?php if(isset($_SESSION['usuario'])):?>
                        <li class="linea">
                        <a href="Instalaciones.php"><?php echo $ses->retornarSesion()?></a>
                        <ul class="dropdowngtx">
                            <li class="despegable"><a href="">Cuenta</a></li>
                            <li class="despegable"><a href="../../Back/logOut.php">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                    <?php else:?>
                        <li class="linea"><a href="Login.html">Acceso</a></li>
                    <?php endif ?>
                    <li class="linea">
                        <a href="Instalaciones.php">Instalaciones</a>
                        <ul class="dropdowngtx">
                            <li class="despegable"><a href="">Baloncesto</a></li>
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
        
        <div class="Objetos">
            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <img src="../img/balon.jpg" class="card-img-top" alt="Imagen" >
                    <div class="card-body">
                    <h5 class="card-title">Baloncesto</h5>
                    <p class="card-text">Pistas de Baloncesto al aire libre iluminadas y en Pabellón.</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>

            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <img src="../img/futsal.jpg" class="card-img-top" alt="Imagen" >
                    <div class="card-body">
                    <h5 class="card-title">Fútbol Sala</h5>
                    <p class="card-text">Pistas de Futsal al aire libre iluminadas y en Pabellón.</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>

            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <img src="../img/fut7.jpg" class="card-img-top" alt="Imagen" >
                    <div class="card-body">
                    <h5 class="card-title">Fútbol 7</h5>
                    <p class="card-text">Campos de cesped artificial al aire libre iluminados.</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>

            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <img src="../img/fut11.jpg" class="card-img-top" alt="Imagen" >
                    <div class="card-body">
                    <h5 class="card-title">Fútbol 11</h5>
                    <p class="card-text">Campos de cesped artificial al aire libre iluminados.</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>

            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <img src="../img/pad.jpg" class="card-img-top" alt="Imagen" >
                    <div class="card-body">
                    <h5 class="card-title">Pádel</h5>
                    <p class="card-text">Pistas de pádel al aire libre iluminadas.</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>

            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <img src="../img/ten.jpg" class="card-img-top" alt="Imagen" >
                    <div class="card-body">
                    <h5 class="card-title">Tenis</h5>
                    <p class="card-text">Pistas de tenis al aire libre iluminadas.</p>
                    <a href="#" class="btn btn-primary boton">Reservar</a>
                    </div>
                </div>
            </div>

            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <img src="../img/vol.jpeg" class="card-img-top" alt="Imagen" >
                    <div class="card-body">
                    <h5 class="card-title">Voleibol</h5>
                    <p class="card-text">Pistas de Voleibol al aire libre iluminadas y en Pabellón.</p>
                    <a href="#" class="btn btn-primary boton">Reservar</a>
                    </div>
                </div>
            </div>
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