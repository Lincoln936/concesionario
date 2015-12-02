<?php

class ManageTurismos {
    private $bd = null;
    private $tabla = "turismos";

    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }

    function get($ID) {
        //devolver objeto turismo
        $parametros = array();
        $parametros["ID"] = $ID;
        $this->bd->select($this->tabla, "*", "ID = :ID", $parametros);

        $fila = $this->bd->getRow();
        $turismo = new Turismos();
        $turismo->set($fila);
        return $turismo;
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

    function erase(Turismos $turismo) {
        return $this->delete($turismo->getID());
    }

    function deleteTurismos($parametros) {
        return $this->bd->delete($this->tabla, $parametros);
    }

    function set(Turismos $turismo) {
        //devolver filas modificadas
        $parametrosSet = array();
        $parametrosSet["Tipo"] = $turismo->getTipo(); 
        $parametrosSet["Modelo"] = $turismo->getModelo();
        $parametrosSet["Motor"] = $turismo->getMotor();
        $parametrosSet["Nuevo"] = $turismo->getNuevo();
        $parametrosSet["Usado"] = $turismo->getUsado();
        $parametrosSet["Kilometros"] = $turismo->getKilometros();
        $parametrosSet["Precio"] = $turismo->getPrecio();
        $parametrosSet["Url"] = $turismo->getUrl();
        $parametrosSet["Dni"] = $turismo->getDni();
        $parametrosWhere = array();
        $parametrosWhere["ID"] = $turismo->getID();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }

    function insert(Turismos $turismo) {
        $parametros = array();
        $parametros["Tipo"] = $turismo->getTipo(); 
        $parametros["Modelo"] = $turismo->getModelo();
        $parametros["Motor"] = $turismo->getMotor();
        $parametros["Nuevo"] = $turismo->getNuevo();
        $parametros["Usado"] = $turismo->getUsado();
        $parametros["Kilometros"] = $turismo->getKilometros();
        $parametros["Precio"] = $turismo->getPrecio();
        $parametros["Url"] = $turismo->getUrl();
        $parametros["Dni"] = $turismo->getDni();
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
            $turismo = new Turismos();
            $turismo->set($fila);
            $r[] = $turismo;
        }
        return $r;
    }

    function getValuesSelect() {
        $this->bd->query($this->tabla, "ID, Modelo", array(), "Modelo");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }

}
