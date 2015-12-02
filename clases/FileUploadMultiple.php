<?php

// Resumen general de métodos de la clase:
// Tamaño, destino, nombre, controlar tipo, controlar archivo

class FileUploadMultiple {

    private $destino = "./", $nombre = [], $tamaño = 10000000000000000000, $parametro;

    const CONSERVAR = 1, REEMPLAZAR = 2, RENOMBRAR = 3;

    private $error = false, $politica = self::RENOMBRAR;
    private $subido = false;
// Tipo archivos
    private $arrayDeTipos = array(
        "jpg" => 1,
        "gif" => 1,
        "png" => 1,
        "jpeg" => 1,
        "pdf" => 1
    );
    private $extension = [];

    public function __construct($parametro) {
        if (isset($_FILES[$parametro])) {
            $this->parametro = $parametro;
            for ($i = 0; $i < count($_FILES[$parametro]["name"]); $i++) {
                if ($_FILES[$parametro]["name"][$i] !== "") {
                    $nombre = $_FILES[$this->parametro]["name"][$i];
                    $trozos = pathinfo($nombre);
                    $extension = $trozos["extension"];
                    $this->nombre[$i] = $trozos["filename"];
                    $this->extension[$i] = $extension;
                } else {
                    
                }
            }
        }

//        var_dump($parametro);
//        print_r($this->nombre);
    }

    public function getDestino() {
        return $this->destino;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTamaño() {
        return $this->tamaño;
    }

    function setDestino($destino) {
        $this->destino = $destino;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTamaño($tamaño) {
        $this->tamaño = $tamaño;
    }

    function getPolitica() {
        return $this->politica;
    }

    function setPolitica($politica) {
        $this->politica = $politica;
    }

    function upload() {
        print_r($this->nombre);
        for ($i = 0; $i < count($this->nombre); $i++) {
            if ($this->error) {
                echo "2";
                return false;
            }
            if ($_FILES[$this->parametro]["error"][$i] != UPLOAD_ERR_OK) {
                echo "3";
                return false;
            }
            if ($_FILES[$this->parametro]["size"][$i] > $this->tamaño) {
                echo "4";
                return false;
            }
            if (!$this->isTipo($this->extension[$i])) {
                echo "5";
                return false;
            }
            if (!(is_dir($this->destino) && substr($this->destino, -1) === "/")) {
                echo "6";
                return false;
            }
            $nombre = $this->nombre[$i];
            if ($this->politica === self::CONSERVAR && file_exists($this->destino . $nombre . "." . $this->extension[$i])) {
                echo "7";
                return false;
            }
            if ($this->politica === self::RENOMBRAR && file_exists($this->destino . $nombre . "." . $this->extension[$i])) {
                $nombre = $this->renombrar($nombre, $this->extension[$i]);
            }
            $this->subido = true;
            move_uploaded_file($_FILES[$this->parametro]["tmp_name"][$i], $this->destino . $nombre . "." . $this->extension[$i]);
        }
        return true;
    }

    private function renombrar($nombre, $extension) {
        $i = 1;
        while (file_exists($this->destino . $nombre . "_" . $i . "." . $extension)) {
            $i++;
        }
        echo $nombre;
        return $nombre . "_" . $i;
    }

    public function addTipo($tipo) {
        if (!$this->isTipo($tipo)) {
            $this->arrayDeTipos[$tipo] = 1;
            return true;
        }
        return false;
    }

    public function removeTipo($tipo) {
        if ($this->isTipo($tipo)) {
            unset($this->arrayDeTipos[$tipo]);
            return true;
        }
        return false;
    }

    public function isTipo($tipo) {
        return isset($this->arrayDeTipos[$tipo]);
    }

}
