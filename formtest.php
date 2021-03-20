
<html> 
    <body> 
        <form method = 'post'>  
            <h1>Registro de usuarios</h1>
            <br/>
            <label>Nombre</label>
            <input type="text" name="nombre" /><br/><br/>
            <label>Apellido paterno</label>
            <input type="text" name="apellidop" /><br/><br/>
            <label>Apellido materno</label>
            <input type="text" name="apellidom" /><br/><br/>
            <label>Sexo</label>
            <select type="text" name="sexo">
                <option value = 'Hombre'>Hombre</option>
                <option value = 'Mujer'>Mujer</option>
            </select><br/><br/>
            <label>Lenguaje de programación que domina (selección múltiple)</label><br/><br/>
            <select name = 'lenguaje[]' multiple size = 6>   
                <option value = 'JavaScript'>JavaScript</option> 
                <option value = 'TypeScript'>TypeScript</option> 
                <option value = 'PHP'>PHP</option> 
                <option value = 'JAVA'>JAVA</option> 
                <option value = 'GO'>GO</option> 
                <option value = 'PYTHON'>PYTHON</option> 
            </select><br/><br/> 
            <input type = 'submit' name = 'submit' value = Registrar> 
        </form> 
    </body> 
</html> 
<?php 
    if(isset($_POST["submit"]))  
    { 
        if(isset($_POST["lenguaje"]) && $_POST["apellidom"] != '' && $_POST["apellidop"] != '' && $_POST["nombre"] != '')  
        { 
            echo $_POST["nombre"] . " " . $_POST["apellidop"] . " " . $_POST["apellidom"] . " " . $_POST["sexo"] . "<br/><br/>";
            foreach ($_POST['lenguaje'] as $lenguaje)  
                print "$lenguaje<br/>"; 
        } 
    else
        echo "Por favor llenar todos los campos !!"; 
    } 
?> 
