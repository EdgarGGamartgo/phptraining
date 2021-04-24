
<html> 
    <body> 
        <form method = 'post' enctype="multipart/form-data">
            <label for="archivo">Selecciona un archivo</label>
            <input type="file" name="archivo">
            <button type="submit" name="upload">Subir</button>  
            
        </form> 
    </body> 
</html> 
<?php 
    $message = '';
    $error = '';
    $uploads_dir = 'files';


    if (isset($_POST["upload"]))
    {
        $error = $_FILES["archivo"]["error"];

        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["archivo"]["tmp_name"];
            
            $name = basename($_FILES["archivo"]["name"]);

            if (move_uploaded_file($tmp_name, "$uploads_dir/$name"))
            {
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
?> 
