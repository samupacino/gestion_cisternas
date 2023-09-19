<?php
    include'config/configurar.php';
    include'Controlador/Tracto/Controlador.php';

    $controlador = new Controlador();
    if(isset($_GET['listas'])){
        //$controlador->listar_placa($_GET['listas']);
    }else if(isset($_GET['registro'])){
        
        if(isset($_GET['registro']) && isset($_GET['guardar'])){
          
            $controlador->save_registro_tracto();

        }else{
           
            $controlador->registro();
        }
        
    }else{
        $controlador->index();
    }

?>
