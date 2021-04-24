<html> 
    <body> 
        <form method = 'post'>  
            <h1>LOGIN</h1>
            <br/>
            <label>E-MAIL</label>
            <input type="email" name="nombre" /><br/><br/>
            <label>PASSWORD</label>
            <input type="password" name="password" /><br/><br/>
            <input type = 'submit' name = 'submit' value = Login> 
        </form> 
    </body> 
</html> 
<?php 

    if(isset($_POST["submit"]))  
    { 
        if(isset($_POST["nombre"]) && $_POST["password"] != '')  
        {
            $file = './../files/users.json';
            $json = file_get_contents($file);
            $users = json_decode($json, true);
            $msg = ''; 
           
            foreach($users["users"] as $user => $value) {

                if ($value["email"] == $_POST["nombre"] && $value["password"] == $_POST["password"]) {
                    $msg = $value["email"];
                    $user = array("email"=>$_POST["nombre"], "password"=>$_POST["password"]);
                    setcookie("inicio", time(), time() + (86400 * 30), "/");
                    $users["users"]["user"] = $user ;
                    $json = json_encode($users);
                    file_put_contents($file, $json);
                }
            
            }
           
            if($msg != '') {
                echo "Bienvenido " . $msg;
                echo "<br>";
                $goFiles = "<a href='files.php'>Ir a panel de archivos</a>";
                echo $goFiles;
            } else {
                echo "Credeciales incorrectas!!!";
            }
        } 
    else
        echo "Por favor llenar todos los campos !!"; 
    } 
?> 
