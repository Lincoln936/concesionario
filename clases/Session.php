<?php

class Session {

    private static $iniciada = false;

    //private $trusted = true;
    // IP del cliente, el navegador
    function __construct() {
        if (!self::$iniciada) {
            session_start();
            $this->_control();
        }
        self::$iniciada = true;
    }

    private function _control() {
        $ip = $this->get("_ip");
        $cliente = $this->get("_cliente");
        if ($ip == null && $cliente == null) {
            $this->set("_ip", Server::getCLientAdress());
            $this->set("_cliente", Server::getUserAgent());
        } else {
            if ($ip !== Server::getClientAdress() || $cliente !== Server::getUserAgent()) {
                $this->destroy();
                //$this->trusted = false;
            }
        }
    }

    function isLogged() {
        return $this->getUser() != null;
    }

    function get($nombre) {
        if (isset($_SESSION[$nombre])) {
            return $_SESSION[$nombre];
        }
        return null;
    }

    function getUser() {
        return $this->get("_usuario");
    }

    function set($nombre, $valor) {
        $_SESSION[$nombre] = $valor;
    }

    function setUser(Usuario $usuario) {
        $this->set("_usuario", $usuario);
    }

    function delete($nombre) {
        if (isset($_SESSION[$nombre])) {
            unset($_SESSION[$nombre]);
        }
    }

    function destroy() {
        session_destroy();
    }

    function sendRedirect($destino = "index.php", $final = true) {
        header("Location:$destino");
        if($final === true){
            exit();
        }
    }

}
