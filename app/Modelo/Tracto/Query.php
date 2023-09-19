<?php
include RUTA_APP.'/Librerias/Base.php';

class Tracto_querys{

    public function __construct(){
   
    }

    public function listar_tracto(){
        $resultado = [];
       
        $conexion = Base::connection(); 

        $prepare_statement = $conexion->prepare("SELECT * FROM Tracto");
        $prepare_statement->execute();
 
        $resultado = $prepare_statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultado;
    }

    public function registro_placa_tracto($placa_tracto = []){
        /*
        insert into Tracto (Tracto_placa ,Tracto_largo,Tracto_ancho,Tracto_alto)values(?,?,?,?);
        */
 
        
        $conexion = Base::connection(); 
        $preparar_statement = $conexion->prepare('insert into Tracto(Tracto_placa,Tracto_largo,Tracto_ancho,Tracto_alto,Tracto_veh)values(?,?,?,?,?)');
        
        
        $preparar_statement->execute(array(
            $placa_tracto['placa'],
            $placa_tracto['largo'],
            $placa_tracto['ancho'],
            $placa_tracto['alto'],
            $placa_tracto['config_veh']
        ));
        
        return $preparar_statement->rowCount();  
        
    }
}
?>