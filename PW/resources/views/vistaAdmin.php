<!DOCTYPE html>
<html lang="es">
    <header>
        <link rel="stylesheet" href="EstiloAdmin.css">
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
        <h1 id="h1_cuerpo">Instalaciones
        <img class="logo" src="../img/logoKMB.png">
        </h1>
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
        <div class="Objetos">
            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Generar y Eliminar pistas</h5>
                        <p class="card-text">Podras eliminar y generar pistas automáticamente.</p>
                        <a href="Generar.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Modificar Usuaurio</h5>
                        <p class="card-text">Podras eliminar y generar pistas automáticamente.</p>
                        <a href="ModificarUsuario.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Modificar Pistas</h5>
                        <p class="card-text">Podras eliminar y generar pistas automáticamente.</p>
                        <a href="ModificarPista.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Modificar Alquileres</h5>
                        <p class="card-text">Podras eliminar y generar pistas automáticamente.</p>
                        <a href="ModificarAlquiler.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Modificar Eventos</h5>
                        <p class="card-text">Podras eliminar y generar pistas automáticamente.</p>
                        <a href="ModificarEvento.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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