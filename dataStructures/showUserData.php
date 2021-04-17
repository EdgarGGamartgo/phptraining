<?php
    session_start();

    if(isset($_SESSION["user"]) && isset($_COOKIE["inicio"]))
    {
        ?>
        <p>Han pasado <?=time() - $_COOKIE["inicio"]?> segundos desde que se inició sesión.</p>
        <p>Email:<?=$_SESSION["user"]["email"]?>, Password:<?=$_SESSION["user"]["password"]?>,
        . La sesión sigue activa.</p>
        <button onclick="location.href='salir.php'" type="button">Cerrar sesión</button>
        <?php
    }