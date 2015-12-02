<?php

class Turismos {

    private $ID, $Tipo, $Modelo, $Motor, $Nuevo, $Usado, $Kilometros, $Precio, $Url, $Dni;

    function __construct($ID = null, $Tipo = null, $Modelo = null, $Motor = null, 
            $Nuevo = null, $Usado = null, $Kilometros = null, $Precio = null, 
            $Url = null, $Dni = null) {
        $this->ID = $ID;
        $this->Tipo = $Tipo;
        $this->Modelo = $Modelo;
        $this->Motor = $Motor;
        $this->Nuevo = $Nuevo;
        $this->Usado = $Usado;
        $this->Kilometros = $Kilometros;
        $this->Precio = $Precio;
        $this->Url = $Url;
        $this->Dni = $Dni;
    }

    function getID() {
        return $this->ID;
    }

    function getTipo() {
        return $this->Tipo;
    }

    function getModelo() {
        return $this->Modelo;
    }

    function getMotor() {
        return $this->Motor;
    }

    function getNuevo() {
        return $this->Nuevo;
    }

    function getUsado() {
        return $this->Usado;
    }

    function getKilometros() {
        return $this->Kilometros;
    }

    function getPrecio() {
        return $this->Precio;
    }

    function getUrl() {
        return $this->Url;
    }

    function getDni() {
        return $this->Dni;
    }

    function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }

    function setModelo($Modelo) {
        $this->Modelo = $Modelo;
    }

    function setMotor($Motor) {
        $this->Motor = $Motor;
    }

    function setNuevo($Nuevo) {
        $this->Nuevo = $Nuevo;
    }

    function setUsado($Usado) {
        $this->Usado = $Usado;
    }

    function setKilometros($Kilometros) {
        $this->Kilometros = $Kilometros;
    }

    function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    function setUrl($Url) {
        $this->Url = $Url;
    }

    function setDni($Dni) {
        $this->Dni = $Dni;
    }

    //3º getJson
    function getJson() {
        $cadena = '{';
        foreach ($this as $indice => $valor) {
            $cadena .= '"' . $indice . '":"' . $valor . '",';
        }
        $cadena = substr($cadena, 0, -1);
        $cadena .= '}';
        return $cadena;
    }

    //4º set genérico
    function set($valores, $inicio = 0) { //Generico total
        $i = 0;
        foreach ($this as $indice => $valor) {
            $this->$indice = $valores[$i + $inicio];
            $i++;
        }
    }

    public function __toString() {
        $r = "";
        foreach ($this as $key => $valor) {
            $r .= "$valor ";
        }
        return $r;
    }

}
