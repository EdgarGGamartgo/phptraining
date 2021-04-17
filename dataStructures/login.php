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
    session_start();

    if(isset($_POST["submit"]))  
    { 
        if(isset($_SESSION["users"]) && isset($_POST["nombre"]) && $_POST["password"] != '')  
        {
            $users = $_SESSION["users"];
            $msg = ''; 
           
            foreach($_SESSION["users"] as $user => $value) {

                if ($value["email"] == $_POST["nombre"] && $value["password"] == $_POST["password"]) {
                    $msg = $value["email"];
                    $user = array("email"=>$_POST["nombre"], "password"=>$_POST["password"]);
                    setcookie("inicio", time(), time() + (86400 * 30), "/");
                    $_SESSION["user"] = $user ;
                }
            
            }
           
            if($msg != '') {
                echo "Bienvenido " . $msg;
                echo "<br>";
            } else {
                echo "Credeciales incorrectas!!!";
            }
        } 
    else
        echo "Por favor llenar todos los campos !!"; 
    } 
?> 
