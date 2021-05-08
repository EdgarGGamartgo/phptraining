<?php
    $file = './../files/users.json';

    // Read
    $json = file_get_contents($file);
    $users = json_decode($json, true);
    $users["users"] = [];
    $users["user"] = [];

    // Write
    $json = json_encode($users);
    file_put_contents($file, $json);
?>

<p></p><a href="sessionForm.php">entrar</a>