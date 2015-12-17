<?php
require 'clases/AutoCarga.php';
$sesion = new Session();
$bd = new DataBase();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo vehículo</title>
        <link rel="stylesheet" href="nuevo.css">
    </head>
    <body>
        <div id="contenedor">
            <div id="cabecera">
                <span id="titulo">Concesionario</span>
                <div id="login">
                    <?php
                    if (!$sesion->isLogged()) {
                        ?>
                        <form action="phplogin.php" method="post">
                            <input type="text" name="user" placeholder="Nombre usuario"/><br/>
                            <input type="password" name="password" placeholder="Contraseña"/><br/>
                            <label for="check">Recordar?</label><input type="checkbox" name="recordar" value="ON" />
                            <input type="submit" name="submit" value="Login"/>
                        </form>
                    <?php } else { ?>
                        <h2 id="usuario"><?php echo $sesion->getUser(); ?></h2>
                        <form action="phplogout.php" method="POST" id="formu">
                            <input type="submit" name="submit" value="Logout"/>
                        </form>
                    <?php } ?>
                </div>
        </div>
        <form action="phpvalidarvehiculo.php" method="POST" id="formulario">
            <h2>Datos del vehículo</h2>
            <label for="Tipo">Tipo</label><input type="text" name="Tipo" value=""/><br/>
            <label for="Modelo">Modelo</label><input type="text" name="Modelo" value="" /><br/>
            <label for="Motor">Motor</label><input type="text" name="Motor" value="" /><br/>
            <label for="Nuevo">Nuevo</label><input type="number" name="Nuevo" value="" /><br/>
            <label for="Usado">Usado</label><input type="number" name="Usado" value="" /><br/>
            <label for="Kilometros">Kilometros</label><input type="number" name="Kilometros" value="" /><br/>
            <label for="Precio">Precio</label><input type="number" name="Precio" value="" /><br/>
            <label for="Url">Ruta imagen</label><input type="text" name="Url" value="" /><br/>
            <h2>Datos del propietario</h2>
            <label for="Nombre">Nombre</label><input type="text" name="Nombre" value="" /><br/>
            <label for="Correo">Correo</label><input type="text" name="Correo" value="" /><br/>
            <label for="Direccion">Direccion</label><input type="text" name="Direccion" value="" /><br/>
            <label for="Dni">Dni</label><input type="text" name="Dni" value="" /><br/><br/>
            <input type="submit" value="Enviar" name="submit" />
        </form>
        <form action="index.php" id="formulario">
            <input type="submit" name="cancelar" value="Cancelar"/>
        </form>
    </body>
</html>
<?php
$bd->closeConnection();