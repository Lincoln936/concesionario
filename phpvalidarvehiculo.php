<?php
require 'clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTurismos($bd);
$manejadorpropietario = new ManagePropietario($bd);

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

$turismo = new Turismos(null, $tipo, $modelo, $motor, $nuevo, $usado, $kilometros, $precio, $url, $dni);
$r = $gestor->insert($turismo);
$propietario = new Propietario(null, $nombre, $correo, $direccion, $dni);
$u = $manejadorpropietario->insert($propietario);
//echo $r;
//echo $u;
//var_dump($bd->getError());
$bd->closeConnection();
header("Location:index.php");