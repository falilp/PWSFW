<!DOCTYPE html>
<html>
    <Head>
        <title> Registro de Evento </title>
        <link rel="icon" href="/img/iconoo.png" >
    </Head>
    <body>
        <!-- Vista Encargada de registrar Evento--->
        <header>
            <h1>¡Bienvenido a la sección de reserva de pistas deportivas de KMB!</h1>
        </header>
        <main>
            <article>
                <!-- Articulo que se encarga de mostrar la información necesaria al Usuario para registrar el Evento-->
                <section>
                    <!-- Conjunto de parrafos de Bienvenida a la pagina de registrar Eventos-->
                    <p>
                    Aquí podrás reservar fácilmente la pista que necesitas para organizar cualquier tipo de evento deportivo, 
                    ya sea para jugar con amigos o para competir en un torneo. 
                    </p>

                    <p>
                    En esta página encontrarás información detallada sobre cada una de las pistas disponibles, así como fotos y reseñas de otros usuarios 
                    que han utilizado nuestras instalaciones anteriormente. 
                    </p>

                    <p>
                    Todo lo que tienes que hacer es seleccionar el deporte que deseas practicar, la fecha y hora que te convengan, y realizar el pago en línea de manera segura y fácil. 
                    </p>

                    <p>
                    En KMB nos aseguramos de que todas nuestras pistas estén en excelentes condiciones para su uso, para que puedas disfrutar de una experiencia de juego 
                    de alta calidad. 
                    </p>    

                    <p>
                    Si necesitas ayuda para organizar un evento deportivo más grande, nuestro equipo de expertos estará encantado de ayudarte a coordinar todos los detalles necesarios. 
                    </p>

                    <p>
                    Así que no esperes más y reserva tu pista deportiva en KMB hoy mismo.
                    </p>   
                </section>

                <section>
                    <!-- Eventos predeterminados -->
                    <h2>Eventos disponibles:</h2>
                    <nav>
                        <ul>
                            <li><p><a href="" title="Cumpleaños"> Cumpleaños</a></p></li>
                            <li><p><a href="" title="Torneo">Torneo</a></p></li>
                            <li><p><a href="" title="Personalizado"> Crea tu propio evento!</a></li></p>
                        </ul>
                    </nav>
                </section>
            </article>   

            <section>
                <!-- Sección para llamar al codigoPHP para registrar el evento en la BD-->
                <form method="post" action="..\..\Back\regEvento.php">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" required>
                    <br>
                        <label for="fecha">Fecha</label>
                        <input type="datetime-local" name="fecha" id="fecha" required>
                    <br>
                        <!-- La vista mostrara la consulta de todos los campos y se seleccionara el indicado con checkbox-->
                        <!-- <input type="checkbox" name="codPista" id="codPista" value="codPista de la pista" required>-->
                    <input type="submit" values="enviar">
                </form>
            </section>

        </main>
    </body>
</html>