<?php
    if(isset($_COOKIE["inicio"]))
    {
        $file = './../files/users.json';
        $json = file_get_contents($file);
        $users = json_decode($json, true);
        foreach($users as $user => $value) {
            foreach($value as $key => $val) {
                echo $key . ": " . $val . "<br>";
            }
            echo "<br>";
        }
    }
    ?>