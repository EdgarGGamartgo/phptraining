
<html> 
    <body> 
        <form method = 'post'>  
            <h1>LOGIN</h1>
            <br/>
            <label>NOMBRE</label>
            <input type="text" name="nombre" /><br/><br/>
            <label>E-MAIL</label>
            <input type="email" name="email" /><br/><br/>
            <label>PASSWORD</label>
            <input type="password" name="password" /><br/><br/>
            <label>FECHA DE NACIMIENTO</label>
            <input type="date" name="fecha" /><br/><br/>
            <input type = 'submit' name = 'submit' value = Login> 
        </form> 
    </body> 
</html> 
<?php 
    session_start();


    if(isset($_POST["submit"]))  
    { 
        if(isset($_POST["nombre"]) && $_POST["password"] != '' && $_POST["email"] != '' && $_POST["fecha"] != '')  
        { 
            $user = array("nombre"=>$_POST["nombre"], "password"=>$_POST["password"], "email"=>$_POST["email"], "fecha"=>$_POST["fecha"]);
            setcookie("inicio", time(), time() + (86400 * 30), "/");
            $_SESSION["user"] = $user ;
        } 
    else
        echo "Por favor llenar todos los campos !!"; 
    } 
?> 
