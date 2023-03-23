<!DOCTYPE html>
<html lang="es">
    <head> 
        <title> Registro de usuario </title>
        <meta charset="utf-8"> 
        <link rel="icon" href="../img/iconoPagina.ico" >
        <link rel="stylesheet" href="EstiloRegistro.css">
    </head>
    <body>
        <header>
            <h1 id="title">Registro</h1>
        </header>
        <nav>
                <div id="menu">
                    <ul>
                        <li class="linea"><a href="Login.html">Acceso</a></li>
                        <li class="linea">
                            <a href="Instalaciones.php">Instalaciones</a>
                            <ul class="dropdowngtx">
                                <li class="despegable"><a href="">Baloncesto</a></li>
                                <li class="despegable"><a href="">F&uacutetbol Sala</a></li>
                                <li class="despegable"><a href="">F&uacutetbol 7</a></li>
                                <li class="despegable"><a href="">F&uacutetbol 11</a></li>
                                <li class="despegable"><a href="">P&aacutedel</a></li>
                                <li class="despegable"><a href="">Tenis</a></li>
                            </ul>
                        </li>
                        <li class="linea"><a href="Evento.php">Eventos</a></li>
                        <li class="linea"><a href="Indice.php">Sobre Nosotros</a></li>
                    </ul>
                </div>
        </nav>
        <main>
            <section>
                <form method="post" action="../../Back/regAlquiler.php">
                    <h3>Alquilar: </h3>
                    <label for="nombre">Tipo Pista:</label>
                    <select name="tipoPista">
                        <option value="1">Fútbol</option>
                        <option value="2">Tenis</option>
                        <option value="3">Baloncesto</option>
                        <option value="4">Voleibol</option>
                        <option value="5">Pádel</option>
                    </select>
                    <br>
                    <br>
                    <label for="precioH">Precio Por Hora</label>
                    <input type="number" name="precioH" id="precioH" required>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                    <br>
                    <label for="telefono">Telefono:</label>
                    <input type="number" name="telefono" id="telefono" required>
                    <br>
                    <label for="contrasena">Contrase&ntildea:</label>
                    <input type="password" name="contrasena" id="contrasena" required>
                    <br>
                    <input type="submit" value="Enviar">
                </form>
            </section>
        </main>
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
