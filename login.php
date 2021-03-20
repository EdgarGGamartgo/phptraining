
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

    $users = array("edgarggamartgo@gmail.com"=>"12345", "edgar@gmail.com"=>"67890", "test@gmail.com"=>"1234567890");
    $msg = '';
    if(isset($_POST["submit"]))  
    { 
        if(isset($_POST["nombre"]) && $_POST["password"] != '')  
        { 
            foreach($users as $x => $x_value) {
                if($x == $_POST["nombre"] && $x_value == $_POST["password"]) {
                    $msg = $x;
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
