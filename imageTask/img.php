<?php 
            session_start();
            if(isset($_SESSION["user"])) {
                $imagen = imagecreatetruecolor(400, 300);
                $color_texto = imagecolorallocate($imagen, 143, 224, 60);
                imagestring($imagen, 5, 160, 135, $_SESSION["user"]["nombre"], $color_texto);
                header('Content-Type: image/png');
                imagepng($imagen);
                imagedestroy($imagen);
            }
?> 