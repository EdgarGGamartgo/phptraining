<html> 
    <body> 
        <h1>Agregar archivo</h1>
        <form method = 'post' enctype="multipart/form-data">
            <label for="archivo">Selecciona un archivo</label>
            <input type="file" name="archivo">
            <button type="submit" name="upload">Subir</button>  
        </form>
        <hr> 
    </body> 
</html> 
<?php 
    session_start();
    $message = '';
    $error = '';
    $uploads_dir = './../files';

    if (isset($_COOKIE["inicio"])) {
        if (isset($_SESSION["files"])) {
            echo "<h1>Archivos subidos</h1>";
            foreach($_SESSION["files"] as $file => $value) {
                foreach($value as $key => $val) {
                    echo $key . ": " . $val . " " . "<br>";
                }
                $buttonName = $value["nombre"];
                echo "<form method = 'post' enctype='multipart/form-data'><input type='submit' name='$buttonName' value='Eliminar'></form>" . "<br>";
                echo "<br>";
            }
            echo "<hr>";
        }
        echo "Bienvenido al panel de archivos " .  $_SESSION["user"]["email"]. "<hr>";
    if (isset($_POST["upload"]))
    {
        $error = $_FILES["archivo"]["error"];

        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["archivo"]["tmp_name"];
            
            $name = basename($_FILES["archivo"]["name"]);

            if (move_uploaded_file($tmp_name, "$uploads_dir/$name"))
            {
                $buttonName = strtr($_FILES["archivo"]["name"],".","dot");
                $file = array("nombre"=>$buttonName, "location"=>"$uploads_dir/$name");
                $_SESSION["files"][$file['nombre']] = $file;
                $_SESSION["location"] = "$uploads_dir/$name";
                $message = basename($_FILES["archivo"]["name"]) . " cargado correctamente";
                echo $message;
            }
            else {
                $error = "Ocurrio un error al subir el archivo!";
                echo $error;
            }
        }
        else {
            $error = "Ocurrio un error al subir el archivo!!!";
            echo $error;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        foreach($_POST as $post => $value) {
            $TEMPFILES = $_SESSION['files'];
            unset($TEMPFILES[$post]);
            foreach($_SESSION["files"] as $file => $value) {
                foreach($value as $key => $val) {
                    if ($val == $post) {
                        $_SESSION["files"] = $TEMPFILES;
                        $deleteFile = unlink($_SESSION["location"]);
                        echo "Archivo eliminado correctamente!!" . "<br>";
                    }
                }
            }
        }

    }
    } else {
        echo "No ha iniciado sesión!!!";
    }
?> 
