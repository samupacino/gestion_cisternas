<?php
    include RUTA_APP.'/Modelo/Cisterna/Query.php';
    

    class Controlador{

        private $querys;

        public function __construct(){
            $this->querys = new Cisterna_querys();
        } 

        public function index(){

            include RUTA_APP.'/vistas/paginas/placa_cisterna/inicio.php';
        }
        public function listar(){
            $resultado_listar = [];
            try {
          
                $resultado_listar = $this->querys->listar_cisterna();

            } catch (PDOException $e) {
                http_response_code(500);          
                
                $resultado_listar = $e->getMessage();
                
            }
            return $resultado_listar;
        }
        public function eliminar($id){
            $resultado_eliminar;
            try{
                $resultado_eliminar = $this->querys->eliminar_cisterna($id);

            }catch(PDOException $e){
                http_response_code(500);
                $resultado_eliminar = $e->getMessage();
            }
            return $resultado_eliminar;
        }
        public function registrar(){
            include RUTA_APP . '/vistas/paginas/placa_cisterna/registro.php';
        }
        public function guardar_registro(){
            $resultado_guardar_registro;
            try{
                $placa = $_POST['placa'];
                $nombre = $_POST['nombre'];
                $largo = $_POST['largo'];
                $ancho = $_POST['ancho'];
                $alto = $_POST['alto'];

                $form_cisterna = array(
                    "placa"=>$placa,
                    "nombre"=>$nombre,
                    "largo"=>$largo,
                    "ancho"=>$ancho,
                    "alto"=>$alto
                );

                $resultado_guardar_registro = $this->querys->guardar_registro($form_cisterna);
           
            }catch(PDOException $e){
                
                http_response_code(500);
                $resultado_guardar_registro = $e->getMessage();

            }
            return $resultado_guardar_registro;
        }
        public function editar_placa($id){

            $resultado_placa = $this->querys->buscar_placa($id);
            include RUTA_APP.'/vistas/paginas/placa_cisterna/editar.php';
        }

        public function guardar_update_placa($id){
            $resultado_guardar_update;
            try{
                $placa = $_POST['placa'];
                $nombre = $_POST['nombre'];
                $largo = $_POST['largo'];
                $ancho = $_POST['ancho'];
                $alto = $_POST['alto'];

                $formulario_update = array(
                    "placa"=>$placa,
                    "nombre"=>$nombre,
                    "largo"=>$largo,
                    "ancho"=>$ancho,
                    "alto"=>$alto
                );

                $resultado_guardar_update = $this->querys->update_placa($formulario_update,$id);

            }catch(PDOException $e){
                
                http_response_code(500);
                $resultado_guardar_update = $e->getMessage();

            }
            return $resultado_guardar_update;
        }
        
    }
?>