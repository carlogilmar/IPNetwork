<?php

include("db.class.php");

if(isset($_POST['can1']) && !empty($_POST['can1'])){

  //agregar a db
  $a = new db();
  $a->agregar($_POST['uno'],$_POST['dos']);


}else{
  if(isset($_POST['can2']) && !empty($_POST['can2'])){
    //buscar
    $a = new db();
    $a->buscar($_POST['dos']);


  }else{

    if(isset($_POST['can3']) && !empty($_POST['can3'])){
      //modificar
      $a= new db();
      $a->modificar($_POST['tres'],$_POST['cuatro']);

    }else{

      if(isset($_POST['can4']) && !empty($_POST['can4'])){
        //eliminar
        $a= new db();
        $a->eliminar($_POST['cinco']);

      }else{

        if(isset($_POST['can5']) && !empty($_POST['can5'])){
          //leer toda DB
          $a=new db();
          $a->leer();
        }
        else{
        header('location:index.html?error=datosvacios');
        }
      }
    }

  }

}


?>
