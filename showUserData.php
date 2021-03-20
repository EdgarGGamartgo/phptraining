<?php
    session_start();

    if(isset($_SESSION["user"]) && isset($_COOKIE["inicio"]))
    {
        ?>
        <p>Han pasado <?=time() - $_COOKIE["inicio"]?> segundos desde que se inició sesión.</p>
        <p>Nombre:<?=$_SESSION["user"]["nombre"]?>, Email:<?=$_SESSION["user"]["email"]?>, Password:<?=$_SESSION["user"]["password"]?>,
        Fecha de nacimiento:<?=$_SESSION["user"]["fecha"]?>, la sesión sigue activa.</p>
        <button onclick="location.href='salir.php'" type="button">Cerrar sesión</button>
        <?php
    }