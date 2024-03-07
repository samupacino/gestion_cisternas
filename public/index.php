<?php

    if(isset($_GET['cisterna'])){
    
        include'../app/iniciador_cisterna.php';


    }else if(isset($_GET['tracto'])){

        include'../app/iniciador_tracto.php';


    }else{
      
        include'../app/principal.php'; 
     
    }
?>
