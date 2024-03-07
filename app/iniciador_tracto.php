<?php
    include'config/configurar.php';
    include'Controlador/Tracto/Controlador.php';

    
    if(isset($_GET['tracto'])){

        $controlador = new Controlador();

        if(isset($_GET['listar'])){

            $controlador->listar_placa();

        }else if(isset($_GET['registro'])){
        
            if(isset($_GET['registro']) && isset($_GET['guardar'])){
               
                $controlador->save_registro_tracto();
    
            }else{

                $controlador->vista_registro();
            }
            
        }else if(isset($_GET['editar'])){
          
            if(isset($_GET['editar']) && isset($_GET['guardar'])){

                $controlador->editar_placa_tracto($_GET['editar']);
                
            }else{
                $controlador->vista_editar($_GET['editar']);
            }

        }else if(isset($_GET['eliminar'])){

            $controlador->eliminar_placa_tracto($_GET['eliminar']);

        }else{
            $controlador->index();
        }

    }


?>
