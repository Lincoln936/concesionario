<?php

class Propietario {
    private $ID, $Nombre, $Correo, $Direccion, $Dni;
    
    function __construct($ID = null, $Nombre = null, $Correo = null, $Direccion = null, $Dni = null) {
        $this->ID = $ID;
        $this->Nombre = $Nombre;
        $this->Correo = $Correo;
        $this->Direccion = $Direccion;
        $this->Dni = $Dni;
    }

    function getID() {
        return $this->ID;
    }
    
    function getNombre() {
        return $this->Nombre;
    }

    function getCorreo() {
        return $this->Correo;
    }

    function getDireccion() {
        return $this->Direccion;
    }
    
    function getDni() {
        return $this->Dni;
    }

    function setDni($Dni) {
        $this->Dni = $Dni;
    }
    
    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setCorreo($Correo) {
        $this->Correo = $Correo;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
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
