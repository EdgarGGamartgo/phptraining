<?php
    require 'vendor/autoload.php';
    $file = './../files/users.json';
    $json = file_get_contents($file);
    $users = json_decode($json, true);
    $pdf = new TCPDF();
    $pdf->AddPage();
    $content = 'Usuario: ' . 'Email: ' . $users["user"]["email"] . 'Password ' . $users["user"]["password"];
    $pdf->Write(1, $content , '', false, 'C');
    $pdf->Output('users.pdf');
?>