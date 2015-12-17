<?php
require 'clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTurismos($bd);
$id = Request::get("ID");
$r = $gestor->delete($id);
//var_dump($bd->getError());
$bd->closeConnection();
header("Location:index.php?op=delete&r=$r");