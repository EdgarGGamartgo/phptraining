<!DOCTYPE html>
<html>
<head>
<title>Formularios y estructuras de datos en PHP</title>
</head>
<body>
    <h1>Registro de usuarios</h1>
    <form method="post">
        <label>Nombre</label>
        <input type="text" name="nombre" /><br/>
        <label>Apellido paterno</label>
        <input type="text" name="apellidop" /><br/>
        <label>Apellido materno</label>
        <input type="text" name="apellidom" /><br/>
        <label>Sexo</label>
        <select type="text" name="sexo">
            <option>Hombre</option>
            <option>Mujer</option>
        </select><br/>
        <label>Lenguaje de programación que domina (selección múltiple)</label>
        <select type="text" name="languajes" multiple>
            <option value="JavaScript">JavaScript</option>
            <option value="TypeScript">TypeScript</option>
            <option value="PHP">PHP</option>
            <option value="Java">Java</option>
            <option value="Python">Python</option>
            <option value="Go">Go</option>
        </select><br/><br/>
        <button >Enviar</button>
    </form>
    <?php
        // if (isset($_POST["nombre"])) {
        //     echo "Enviaste el valor: " . $_POST["lenguajes"];
        //     //echo var_dump($_POST);
        // }

        //if(isset($_POST["submit"]))  
        //{ 
        // Check if any option is selected 
        if(isset($_POST["languajes"]))  
        { 
            echo $_POST["languajes"];
            // Retrieving each selected option 
            foreach ($_POST['languajes'] as $language)  {

                echo $lenguaje; 
            }
//                echo "You selected $lenguaje<br/>";

        } 
       // else
         //   echo "Select an option first !!"; 
        //} 
    ?>
</body>
</html>
