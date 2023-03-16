<?php

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

?>