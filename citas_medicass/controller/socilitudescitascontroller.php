<?php 
/*
* Creado por: Jhordan solis
* Fecha: @Jhordan
* Descripción: Vamos auteticar los usuarios. 
* validando que se encuentren en la base de datos y ver en que fosyga esten.
*/


// require_once "../model/validar_usermodel.php";
class socilitudescitascontroller{

   // public $model; 

    // public function __construct(){
    //    // $this->model = new Modelo();   
    // }

/** Muestra la vista de autenticar */
    function mostrar(){
     
        require_once "../view/mostrar_citas_solicitadas/index.php";        
    }


}


?> 