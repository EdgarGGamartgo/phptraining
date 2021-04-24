<?php
    $file = './../files/users.json';
    $json = file_get_contents($file);
    $users = json_decode($json, true);

    if($users["user"] && isset($_COOKIE["inicio"]))
    {
        ?>
        <p>Han pasado <?=time() - $_COOKIE["inicio"]?> segundos desde que se inició sesión.</p>
        <p>Email:<?=$users["user"]["email"]?>, Password:<?=$users["user"]["password"]?>,
        . La sesión sigue activa.</p>
        <button onclick="location.href='salir.php'" type="button">Cerrar sesión</button>
        <?php
    }