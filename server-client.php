<!DOCTYPE html>
<html>
<head>
<title>Configuración de un servidor con PHP</title>
</head>
<body>
<h1><?php

    $name = $_GET["nombre"];
    $age = $_GET["edad"];
    
    if(isset($name) && isset($age)) {

        if ($age < 30) {
            $ageGroup = 'joven';
        }
    
        if ($age > 30 && $age < 75) {
            $ageGroup = 'adulto';
        }
    
        if ($age > 75) {
            $ageGroup = 'adulto mayor';
        }
    
    
        echo '¡Hola ' . $ageGroup . ' ' . $name . '!';
    } else {
        echo 'Por favor especifica un nombre y edad.';
    }
    

?></h1>
</body>
</html>
