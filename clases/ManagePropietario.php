<?php

class ManagePropietario {
    private $bd = null;
    private $tabla = "propietarios";

    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }

    function get($ID) {
        //devolver objeto turismo
        $parametros = array();
        $parametros["ID"] = $ID;
        $this->bd->select($this->tabla, "*", "ID = :ID", $parametros);

        $fila = $this->bd->getRow();
        $propietario = new Propietario();
        $propietario->set($fila);
        return $propietario;
    }

    function count($condicion = "1 = 1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

    function delete($ID) {
        //devolver filas borradas
        $parametros = array();
        $parametros["ID"] = $ID;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function erase(Propietario $propietario) {
        return $this->delete($propietario->getID());
    }

    function deletePropietario($parametros) {
        return $this->bd->delete($this->tabla, $parametros);
    }

    function set(Propietario $propietario) {
        //devolver filas modificadas
        $parametrosSet = array();
        $parametrosSet["Nombre"] = $propietario->getNombre(); 
        $parametrosSet["Correo"] = $propietario->getCorreo();
        $parametrosSet["Dirección"] = $propietario->getDireccion();
        $parametrosSet["Dni"] = $propietario->getDni();
        $parametrosWhere = array();
        $parametrosWhere["ID"] = $propietario->getID();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }

    function insert(Propietario $propietario) {
        $parametros = array();
        $parametros["Nombre"] = $propietario->getNombre(); 
        $parametros["Correo"] = $propietario->getCorreo();
        $parametros["Dirección"] = $propietario->getDireccion();
        $parametros["Dni"] = $propietario->getDni();
        $auto = true;
        return $this->bd->insert($this->tabla, $parametros, $auto);
    }

//    function getListOld() {
//        $this->bd->select($this->tabla, "*", "1=1", array(), "Name, CountryCode");
//        $r = array();
//        while($fila = $this->bd->getRow()){
//            $city = new City();
//            $city->set($fila);
//            $r[] = $city;
//        }
//        return $r;
//    }

    function getList($pagina = 1, $orden = "", $nrpp = Constant::NRPP, $condicion = "1 = 1", $parametros = array()) {
        /*$ordenPredeterminado = "$orden, Name, CountryCode, ID";
        if($orden==="" || $orden===null){
            $ordenPredeterminado = "Name, CountryCode, ID";
        }*/
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", $condicion, $parametros, $orden, "$registroInicial, $nrpp");
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $propietario = new Propietario();
            $propietario->set($fila);
            $r[] = $propietario;
        }
        return $r;
    }

    function getValuesSelect() {
        $this->bd->query($this->tabla, "ID, Nombre", array(), "Nombre");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }

}
