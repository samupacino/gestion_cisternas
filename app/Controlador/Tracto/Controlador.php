<?php
    include RUTA_APP.'/Modelo/Tracto/Query.php';

    class Controlador{

        private $query_tracto = NULL;

        public function __construct(){

            $this->query_tracto = new Tracto_querys();
        }

        public function index(){
            $lista_tracto = [];
            try{
                
                include RUTA_APP.'/vistas/paginas/placa_tracto/inicio.php';
            }catch(PDOException $e){
                $mensaje_error = "<p id='mensaje_error'>". $e->getMessage() ."</p>";
                include RUTA_APP.'/vistas/paginas/placa_tracto/inicio.php';
            }  
        }
        public function registro(){
            include RUTA_APP . '/vistas/paginas/placa_tracto/registro.php';
        }
        public function vista_editar(){
            $arreglo_tracto = [];
            $arreglo_tracto = $this->query_tracto->search_placa_tracto($_GET['editar']);

            include RUTA_APP.'/vistas/paginas/placa_tracto/editar.php';
        }
        public function save_registro_tracto(){

            try{

                $placa_tracto = array(
                    "placa" => $_POST['placa'],
                    "largo" => $_POST['largo'],
                    "ancho" => $_POST['ancho'],
                    "alto" => $_POST['alto'],
                    "config_veh" => $_POST['config_veh']
                );
                
                echo $this->query_tracto->registro_placa_tracto($placa_tracto);

            }catch(PDOException $e){
               
                echo $e->getMessage();

            }

        }
        public function eliminar_placa_tracto($id){
            try{
                echo $this->query_tracto->eliminar_placa_tracto($id);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function listar_placa(){
      
            $lista_tracto = [];     

            try{
                $lista_tracto = $this->query_tracto->listar_tracto();
                echo json_encode($lista_tracto);

            }catch(PDOException $e){
                echo $e->getMessage();

            }
        }
        public function editar_placa_tracto($id){
            try{
        
                $datos_update =  [
                    "placa"=>$_POST['placa'],
                    "largo"=>$_POST['largo'],
                    "ancho"=>$_POST['ancho'],
                    "alto"=>$_POST['alto'],
                    "config_veh"=>$_POST['config_veh']
                ];
                $resultado = $this->query_tracto->editar_placa_tracto($id, $datos_update);
                echo $resultado;

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        public function vista_registro(){
    
            include RUTA_APP.'/vistas/paginas/placa_tracto/registro.php';
        }
    }

?>