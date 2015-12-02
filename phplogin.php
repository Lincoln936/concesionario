<?php

require 'clases/AutoCarga.php';
$bd = new DataBase();
$array = array();
$array["Usuario"] = Request::post("user");
$array["Password"] = Request::post("password");
$user = Request::post("user");
$sesion = new Session();
$proyeccion = "Usuario, Password";
$parametros = "Password='" . Request::post("password") . "'";
$bd->select("usuarios", $proyeccion, $parametros);
$r = array();
while ($fila = $bd->getRow()) {
    $r[] = $fila;
}

if($array["Password"]===$r[0]["Password"]){
    $usuario = new Usuario($user);
    $sesion->setUser($usuario);
    
    $sesion->sendRedirect("index.php");
}else{
    $sesion->destroy();
    $sesion->sendRedirect("vfdgd.php");
}
 
//
//if (isset($usuarios[$user]) && $usuarios[$user] == $password) {
//    if ($recordar != null){
//        Cookie::set("user", $user);
//    }else{
//        Cookie::delete("user");
//    }
//    $usuario = new Usuario($user);
//    $sesion->setUser($usuario);
//    $sesion->sendRedirect("index.php");
//} else {
//    $sesion->destroy();
//    $sesion->sendRedirect("vfdgd.php");
//    Cookie::delete("user");
//}