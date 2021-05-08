<?php
    require 'vendor/autoload.php';

    $file = './../files/users.json';
    $json = file_get_contents($file);
    $phpWord = new \PhpOffice\PhpWord\PhpWord();

    $users = json_decode($json, true);
    $content = 'Usuario: ' . 'Email: ' . $users["user"]["email"] . 'Password ' . $users["user"]["password"];

    header('Content-Type: application/vnd,openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment;filename="users.docx"');

    $section = $phpWord->addSection();
    $section->addText($content);
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('php://output');
?>