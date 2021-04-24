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
    $message = '';
    $error = '';
    $uploads_dir = './../files';
    $file = './../files/users.json';

    // Read
    $json = file_get_contents($file);
    $files = json_decode($json, true);

    if (isset($_COOKIE["inicio"])) {
        if (isset($files["files"])) {
            echo "<h1>Archivos subidos</h1>";
            foreach($files["files"] as $file => $value) {
                foreach($value as $key => $val) {
                    echo $key . ": " . $val . " " . "<br>";
                }
                $buttonName = $value["nombre"];
                echo "<form method = 'post' enctype='multipart/form-data'><input type='submit' name='$buttonName' value='Eliminar'></form>" . "<br>";
                echo "<br>";
            }
            echo "<hr>";
        }
        echo "Bienvenido al panel de archivos " .  $files["user"]["email"]. "<hr>";
    if (isset($_POST["upload"]))
    {
        $error = $files["files"]["archivo"]["error"];

        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $files["files"]["archivo"]["tmp_name"];
            
            $name = basename($files["files"]["archivo"]["name"]);

            if (move_uploaded_file($tmp_name, "$uploads_dir/$name"))
            {
                $buttonName = strtr($files["files"]["archivo"]["name"],".","dot");
                $file = array("nombre"=>$buttonName, "location"=>"$uploads_dir/$name");
                $files["files"][$file['nombre']] = $file;
                $files["files"]["location"] = "$uploads_dir/$name";
                $message = basename($files["files"]["archivo"]["name"]) . " cargado correctamente";
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
            $TEMPFILES = $files['files'];
            unset($TEMPFILES[$post]);
            foreach($files["files"] as $file => $value) {
                foreach($value as $key => $val) {
                    if ($val == $post) {
                        $files["files"] = $TEMPFILES;
                        $deleteFile = unlink($files["files"]["location"]);
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
