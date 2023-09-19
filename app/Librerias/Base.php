<?php

    class Base{

        private $dsn = "mysql:dbname=".BD_NOMBRE.";host=".BD_HOST;
        private $usuario = BD_USUARIO;
        private $password = BD_PASSWORD;
     
        public function __construct(){

        }
        public static function connection(){
            $connection = NULL;
            
            $dsn = "mysql:dbname=".BD_NOMBRE.";host=".BD_HOST;
            $usuario = BD_USUARIO;
            $password = BD_PASSWORD;

           

            $connection = new PDO($dsn,$usuario,$password);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            return $connection;
        }
        public function _conexion(){
    
            $connection = NULL;

            $connection = new PDO($this->dsn,$this->usuario,$this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
    } 
?>