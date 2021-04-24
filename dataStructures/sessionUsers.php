<?php
    session_start();
    if(isset($_SESSION["users"]) && isset($_COOKIE["inicio"]))
    {
        foreach($_SESSION["users"] as $user => $value) {
            foreach($value as $key => $val) {
                echo $key . ": " . $val . "<br>";
            }
            echo "<br>";
        }
    }
    ?>