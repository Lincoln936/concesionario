<?php
class Server {
    
    static function getServerName(){
        return $_SERVER["SERVER_NAME"];
    }
    
    static function getRootPath(){
        return $_SERVER["CONTEXT_DOCUMENT_ROOT"];
    }
    
    static function getPort(){
        return $_SERVER["SERVER_PORT"];
    }
    
    static function getUserAgent(){
        return $_SERVER["HTTP_USER_AGENT"];
    }
    
    static function getQueryString(){
        return $_SERVER["QUERY_STRING"];
    }
    
    static function getFile(){
        return $_SERVER["SCRIPT_FILENAME"];
    }
    
    static function getMethod(){
        return $_SERVER["REQUEST_METHOD"];
    }
    
    static function isGet(){
        return self::getMethod()=="GET";
    }
    
    static function isPost(){
        return self::getMethod()=="POST";
    }
    
    static function getClientAdress(){
        return $_SERVER["REMOTE_ADDR"];
    }
    
    static function getClientLanguage(){
        return $_SERVER["HTTP_ACCEPT_LANGUAGE"];
    }
    
    static function getURL(){
        return $_SERVER["HTTP_REFERER"];
    }
    
    static function getRequestDate($campo=null){
        
        date_default_timezone_set('Europe/Madrid');
        switch ($campo) {
            case "Y":
                return intval (date('Y', $_SERVER["REQUEST_TIME"]));
            case "M":
                return intval (date('m', $_SERVER["REQUEST_TIME"]));
            case "D":
                return intval (date('d', $_SERVER["REQUEST_TIME"]));
            case "h";
                return intval (date('H', $_SERVER["REQUEST_TIME"]));
            case "m";
                return intval (date('i', $_SERVER["REQUEST_TIME"]));
            case "s";
                return intval (date('s', $_SERVER["REQUEST_TIME"]));
        }
        return $_SERVER["REQUEST_TIME"];
    }
    
}
