<!DOCTYPE html>
<html lang="es">
    <head> 
        <title> Registro de usuario </title>
        <meta charset="utf-8"> 
        <link rel="icon" href="../img/iconoPagina.ico" >
        <link rel="stylesheet" href="EstiloP.css">
    </head>
    <body>
        <header>
            <h1 id="title">Alquiler Pádel</h1>
        </header>
        <nav>
                <div id="menu">
                    <ul>
                        <?php include_once '../../Back/sesion.php'; $ses = new Sesion();?>
                        <?php if(isset($_SESSION['usuario'])):?>
                            <li class="linea">
                            <a href="Instalaciones.php"><?php echo $ses->retornarSesion()?></a>
                            <ul class="dropdowngtx">
                                <li class="despegable"><a href="Cuenta.php">Cuenta</a></li>
                                <li class="despegable"><a href="MisReservas.php">Mis reservas</a></li>
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
                            <li class="despegable"><a href="">Voleibol</a></li>
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
        <main>
            <?php if($_SERVER["REQUEST_METHOD"] != "POST"):?>
                <section>
                    <form method="post" action="">
                        <h3>Alquilar Pista: </h3>
                        <br>
                        <label for="fecha">Selecciona fecha:</label>
                        <input type="date" name="fecha" id="fecha" required>
                        <br>
                        <input type="submit" value="Enviar">
                    </form>
                </section>
            <?php else: ?>
                <?php 
                    $fecha = $_POST['fecha'];
                    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");    
                    $consulta = "SELECT * FROM pista WHERE CAST(HoraDisponible AS date) = CAST('$fecha' AS date) AND disponible = 0 AND tipoPista = 5";
                    $resultado = $conexion->query($consulta);
                    $objeto = $resultado->fetch_all();
                ?>
                <section>
                    <form method="post" action="../../Back/regAlquiler.php">
                        <h3>Disponibles: </h3>
                        <?php foreach($objeto as $pista):?>
                            <br>
                            <label for="fecha">Pista: <?php print("$pista[0]");?></label>
                            <br>
                            <label for="fecha"><?php print("$pista[5]");?>:</label>
                            <input type="submit" value="Reservar" name="<?php $pista[0];?>">
                        <?php endforeach; ?>
                    </form>
                </section>
            <?php endif ?>
        </main>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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