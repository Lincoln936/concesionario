<?php
require 'clases/AutoCarga.php';
$sesion = new Session();
$bd = new DataBase();
$gestor = new ManageTurismos($bd);

$filtro = Request::get("filtro");
if ($filtro === null) {
    $params = array();
    $condicion = "1 = 1";
} else {
    $params["filtro"] = $filtro . "%";
    $condicion = "Name like :filtro";
}

$order = Request::get("order");
$orderby = "ID";
if ($order !== null) {
    $orderby = "$order, $orderby";
}

$registros = $gestor->count($condicion, $params);
$paginacion = new Pager($registros, Request::get("rpp"), Request::get("page"));
$parametros = new QueryString();

$turismos = $gestor->getList($paginacion->getPaginaActual(), $orderby, $paginacion->getRpp(), $condicion, $params);
$op = Request::get("op");
$r = Request::get("r");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Concesionario</title>
        <link rel="stylesheet" href="index.css">
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
                        <form action="nuevo_turismo.php" method="POST" id="formuNuev">
                            <input type="submit" name="nuevo_turismo" value="Nuevo vehículo"/>
                        </form>
                        <h2 id="usuario"><?php echo $sesion->getUser(); ?></h2>
                        <form action="phplogout.php" method="POST" id="formu">
                            <input type="submit" name="submit" value="Logout"/>
                        </form>
                    <?php } ?>
                </div>
            </div>
            <div id="lista_vehiculos">
                <table border="1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                Tipo de vehículo
                                <a href="?<?= $parametros->getParams(array("order" => "Tipo desc")) ?>">&Del;</a>
                                <a href="?<?= $parametros->getParams(array("order" => "Tipo asc")) ?>">&Delta;</a></th>
                            <th>
                                Modelo
                                <a href="?<?= $parametros->getParams(array("order" => "Modelo desc")) ?>">&Del;</a>
                                <a href="?<?= $parametros->getParams(array("order" => "Modelo asc")) ?>">&Delta;</a>
                            </th>
                            <th>
                                Motor
                                <a href="?<?= $parametros->getParams(array("order" => "Motor desc")) ?>">&Del;</a>
                                <a href="?<?= $parametros->getParams(array("order" => "Motor asc")) ?>">&Delta;</a>
                            </th>
                            <th>
                                Nuevo
                                <a href="?<?= $parametros->getParams(array("order" => "Nuevo desc")) ?>">&Del;</a>
                                <a href="?<?= $parametros->getParams(array("order" => "Nuevo asc")) ?>">&Delta;</a>
                            </th>
                            <th>
                                Usado
                                <a href="?<?= $parametros->getParams(array("order" => "Usado desc")) ?>">&Del;</a>
                                <a href="?<?= $parametros->getParams(array("order" => "Usado asc")) ?>">&Delta;</a>
                            </th>
                            <th>
                                Kilometros
                                <a href="?<?= $parametros->getParams(array("order" => "Kilometros desc")) ?>">&Del;</a>
                                <a href="?<?= $parametros->getParams(array("order" => "Kilometros asc")) ?>">&Delta;</a>
                            </th>
                            <th>
                                Propietario
                                <a href="?<?= $parametros->getParams(array("order" => "Propietario desc")) ?>">&Del;</a>
                                <a href="?<?= $parametros->getParams(array("order" => "Propietario asc")) ?>">&Delta;</a>
                            </th>
                            <th>
                                Precio
                                <a href="?<?= $parametros->getParams(array("order" => "Precio desc")) ?>">&Del;</a>
                                <a href="?<?= $parametros->getParams(array("order" => "Precio asc")) ?>">&Delta;</a>
                            </th>
                            <?php
                            if ($sesion->isLogged()) {
                                ?>
                                <th colspan="2">Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <a href="?page=1">Primero</a>
                                <a href="?<?= $parametros->getParams(array("page" => $paginacion->getAnterior())) ?>">Anterior</a>
                                <a href="?<?= $parametros->getParams(array("page" => $paginacion->getSiguiente())) ?>">Siguiente</a>
                                <a href="?<?= $parametros->getParams(array("page" => $paginacion->getUltima())) ?>">Ultimo</a>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($turismos as $indice => $turismo) { ?>
                            <tr>
                                <td><img src="images/<?= $turismo->getUrl() ?>"/></td>
                                <td><?= $turismo->getTipo() ?></td>
                                <td><?= $turismo->getModelo() ?></td>
                                <td><?= $turismo->getMotor() ?></td>
                                <td><?php
                                    if ($turismo->getNuevo() == 1) {
                                        echo "Sí";
                                    }else{
                                    } else {
                                        echo "No";
                                    }
                                    ?></td>

                                <td><?php
                                    if ($turismo->getUsado() == 1) {
                                        echo "Sí";
                                    } else {
                                        echo "No";
                                    }
                                    ?></td>
                                <td><?= $turismo->getKilometros() ?> km</td>
                                <td><?php
                                    $dni = $turismo->getDni();
                                    $sql = "SELECT * FROM `propietarios` WHERE Dni='" . $dni . "'";
                                    $bd->send($sql);
                                    $r = array();
                                    while ($fila = $bd->getRow()) {
                                        $r[] = $fila;
                                    }
                                    echo $r[0]["Nombre"];
                                    ?></td>
                                <td><?= $turismo->getPrecio() ?> euros</td>
                                <?php
                                if ($sesion->isLogged()) {
                                    ?>
                                    <td>
                                        Borrar<a href='phpdelete.php?ID=<?= $turismo->getID() ?>'></a><br/>
                                        Editar<a href='viewedit.php?ID=<?= $turismo->getID() ?>'></a>
                                    </td>
                                <?php }?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
    </html>
    <?php
    $bd->closeConnection();    