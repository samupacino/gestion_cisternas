<?php

    include RUTA_APP.'/Librerias/Base.php';

    class Cisterna_querys{

        private $conexion = NULL;

        public function __construct(){
            
            $connection = NULL;
            $connection = new Base();
            $this->conexion = $connection->_conexion();

        }

        public function listar_cisterna(){
            $resultados = NULL;
      
            $prepare_stm = $this->conexion->prepare("SELECT * FROM PlacaCisterna");
            $prepare_stm->execute();
            $resultados = $prepare_stm->fetchAll(PDO::FETCH_ASSOC);

            return $resultados;
        }
        public function eliminar_cisterna($id){
            $mensaje = "";
          
            $prepare_statment = $this->conexion->prepare("DELETE FROM PlacaCisterna WHERE id = ?");
            $prepare_statment->execute(array($id));
            $mensaje = $prepare_statment->rowCount();

            return $mensaje;
        }
        public function guardar_registro($formulario = []){
            $mensaje="";

            $prepare_statement =  $this->conexion->prepare("INSERT INTO PlacaCisterna(placa_cisterna,nombre_cisterna,largo_cisterna,ancho_cisterna,alto_cisterna)VALUES(?,?,?,?,?)");

            $prepare_statement->execute(array(
                $formulario['placa'],
                $formulario['nombre'],
                $formulario['largo'],
                $formulario['ancho'],
                $formulario['alto']
            ));
            $mensaje = $prepare_statement->rowCount().".- "."GUARDO PLACA ".$formulario['placa'];

            return $mensaje;
        }

        public function buscar_placa($id){
            $resultados = NULL;
      
            $prepare_stm = $this->conexion->prepare("SELECT * FROM PlacaCisterna WHERE id = ?");
            $prepare_stm->execute(array($id));
            $resultados = $prepare_stm->fetchAll(PDO::FETCH_ASSOC);

            return $resultados;
        }

        public function update_placa($formulario_update,$id){
            $resultados = NULL;

            $sentencia = "UPDATE PlacaCisterna SET placa_cisterna = ?, nombre_cisterna = ?,largo_cisterna = ?, ancho_cisterna = ?, alto_cisterna = ? WHERE id = ?";
            
            $prepare_stm = $this->conexion->prepare($sentencia);

            $prepare_stm->execute(array(
                $formulario_update['placa'],
                $formulario_update['nombre'],
                $formulario_update['largo'],
                $formulario_update['ancho'],
                $formulario_update['alto'],
                $id
            ));
            $resultados = $prepare_stm->rowCount();
            return $resultados;
        }
    }
    
?>