<!DOCTYPE html>
<html>
    <Head>
        <title> Registro de pista </title>
        <link rel="icon" href="/img/iconoo.png" >
    </Head>
    <body>
        <form method="post" action="">
            <label for="tipoPista">Tipo de la pista</label>
            <select name="tipoPista">
                <option value="1">Fútbol</option>
                <option value="2">Tenis</option>
                <option value="3">Baloncesto</option>
                <option value="4">Voleibol</option>
                <option value="5">Pádel</option>
            </select>
            <br>
            <label for="precioH">Precio Por Hora</label>
            <input type="number" name="precioH" id="precioH" required>
            <br>
            <label for="disponible">Disponible</label>
            <select name="disponible">
                <option value="0">Si</option>
                <option value="1">No</option>
            </select>
            <br>
            <label for="mensaje">Mensaje</label>
            <select name="mensaje">
                <option value="1">Pista de fútbol</option>
                <option value="2">Pista de tenis</option>
                <option value="3">Pista de baloncesto</option>
                <option value="4">Pista de voleibol</option>
                <option value="5">Pista de pádel</option>
            </select>
            <br>
            <input type="submit" values="enviar">
        </form>
        <?php
            include 'regPista.php';
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $tipo = $_POST['tipoPista'];
                $precio = $_POST['precioH'];
                $disponible = $_POST['disponible'];
                $mensaje = $_POST['mensaje'];
                registrarPista($tipo,$precio,$disponible,$mensaje);
            }
        ?>
    </body>
</html>