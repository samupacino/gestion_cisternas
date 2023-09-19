
<?php

    include'config/configurar.php';
    include'Controlador/Cisterna/Controlador.php';
   
    $controlador = new Controlador();
    
    if(isset($_GET['listar'])){
        //devuelve response json mediante ajax
        //y el json lo cargamos con javascript
        echo json_encode($controlador->listar());

    }else if(isset($_GET['registro'])){
        //vamos a registro
        if(isset($_GET['registro']) && isset($_GET['guardar'])){
           
            echo $controlador->guardar_registro();

        }else{
            $controlador->registrar();
        }
        
    }else if(isset($_GET['eliminar'])){
        //devuelve response text mediante ajax
        echo $controlador->eliminar($_GET['eliminar']);

    }else if(isset($_GET['editar'])){

        
        if($_GET['editar'] && isset($_GET['guardar'])){
         
            echo $controlador->guardar_update_placa($_GET['editar']);
        
        }else if($_GET['editar']){
            $controlador->editar_placa($_GET['editar']);
        }
        //echo $_POST["button_editar"];

    }else{
        //muestra el index principal
        /*
        $array['placas'] = $controlador->listar();
        foreach($array['placas'] as $valor){
            echo $valor['placa_cisterna'] . "   ";
        }*/
    
        $controlador->index();

    }
?>