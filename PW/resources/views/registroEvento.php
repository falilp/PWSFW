<!DOCTYPE html>
<html>
    <Head>
        <title> Registro de Evento </title>
        <link rel="icon" href="/img/iconoo.png" >
    </Head>
    <body>
        <form method="post" action="">
            <label for="descripcion">Descripcion</label>
            <input type="number" name="descripcion" id="descripcion" required>
            <br>
            <label for="fecha">Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" required>
            <br>
            <!-- La vista mostrara la consulta de todos los campos y se seleccionara el indicado con checkbox-->
            <!-- <input type="checkbox" name="codPista" id="codPista" value="codPista de la pista" required>-->
            <input type="submit" values="enviar">
        </form>
        <?php
            include '../../Back/regEvento.php';
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $descripcion = $_POST['descripcion'];
                $fecha = $_POST['fecha'];
                registrarEvento($descripcion,$fecha);
            }
        ?>
    </body>
</html>