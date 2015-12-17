<?php
require 'clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTurismos($bd);
$manejadorpropietario = new ManagePropietario($bd);
$ID = Request::post("pkID");
$tipo = Request::post("Tipo");
$modelo = Request::post("Modelo");
$motor = Request::post("Motor");
$nuevo = Request::post("Nuevo");
$usado = Request::post("Usado");
$kilometros = Request::post("Kilometros");
$precio = Request::post("Precio");
$url = Request::post("Url");
$nombre = Request::post("Nombre");
$correo = Request::post("Correo");
$direccion = Request::post("Direccion");
$dni = Request::post("Dni");

$turismo = new Turismos($ID, $tipo, $modelo, $motor, $nuevo, $usado, $kilometros, $precio, $url, $dni);
$r = $gestor->set($turismo);
$propietario = new Propietario($ID, $nombre, $correo, $direccion, $dni);
$u = $manejadorpropietario->set($propietario);
//echo $r;
//var_dump($bd->getError());
$bd->closeConnection();
header("Location:index.php?op=edit&r=$r");