<?php
/*
* Creado por: Jhordan solis
* Fecha: @Jhordan
* Descripción: rutas 
*/
require_once '../controller/socilitudescitascontroller.php';
$objcusto= new socilitudescitascontroller();
$op = "mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objcusto->mostrar();
    // elseif ($op=="nuevo")
    //     $objcusto->nuevo();
    // elseif ($op=="guardar")
    //     $objcusto->guardar();
    // elseif ($op=="editar")
    //     $objcusto->editar();
    // elseif($op=="update")
    //     $objcusto->update();
    //     elseif($op=="insertar")
    //         $objcusto->insertar();
    //     elseif($op=="recibir")
    //         $objcusto->recibir();
    //         elseif($op=="eliminar")
    //             $objcusto->eliminar();
    //             elseif($op=="validar_user")
    //                 $objcusto->validar_user();
?>
