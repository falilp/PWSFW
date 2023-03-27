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
            <?php if($_SERVER["REQUEST_METHOD"] != "POST"):?>
                <section>
                    <form method="post" action="">
                        <h3>Alquilar Pista: </h3>
                        <br>
                        <label for="fecha">Selecciona fecha:</label>
                        <select name="fecha" id="fecha">
                            <?php
                                $fechaActual = date('Y-m-d');

                                $diaActual = date('d', strtotime($fechaActual));
                                $mesActual = date('m', strtotime($fechaActual));
                                $anioActual = date('Y', strtotime($fechaActual));

                                $diaSemana = date('w', strtotime($fechaActual)); // Obtenemos el número correspondiente al día de la semana (0-6)
                                while($diaSemana != 0 && $diaActual <= cal_days_in_month(0, $mesActual, $anioActual)){
                                    echo "<option value=\"$fechaActual\">$fechaActual</option>";
                                    //Incrementamos el dia
                                    $diaActual++;
                                    if($diaSemana == 6)
                                    {
                                        $diaSemana = 0;
                                    }else{
                                        $diaSemana++;
                                    }

                                    $fechaActual= $anioActual."-".$mesActual."-".$diaActual;
                                }
                            ?>
                        </select>
                        <br>
                        <input type="submit" value="Enviar">
                    </form>
                </section>
            <?php else: ?>
                <?php 
                    $fecha = $_POST['fecha'];
                    $conexion = mysqli_connect("127.0.0.1","ADMIN","","kmb") or die("Conexion fallida");    
                    $consulta = "SELECT * FROM pista WHERE CAST(HoraDisponible AS date) = CAST('$fecha' AS date) AND disponible = 0 AND tipoPista = 7";
                    $resultado = $conexion->query($consulta);
                    $objeto = $resultado->fetch_all();
                ?>
                <section>
                    <form method="post" action="../../Back/regAlquiler.php">
                        <h3>Disponibles: </h3>
                        <!--<form method="post" action="../../Back/regAlquiler.php">-->
                        <?php foreach($objeto as $pista):?>
                            <form method="post" action="../../Back/regAlquiler.php">
                            <br>
                            <label for="codep">Pista: <?php print("$pista[0]");?></label>
                            <input type="hidden" id="codep" name="codep" value="<?php echo "$pista[0]";?>">
                            <br>
                            <label for="fecha"><?php print("$pista[5]");?></label>
                            <input type="hidden" id="fecha" name="fecha" value="<?php echo "$pista[5]";?>">
                            <?php if(isset($_SESSION['usuario'])):?>
                                <input type="submit" value="Reservar" id="Reservar">
                            <?php endif ?>
                            </form>
                        <?php endforeach; ?>
                    <!--</form>-->
                </section>
            <?php endif ?>
        </main>
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
