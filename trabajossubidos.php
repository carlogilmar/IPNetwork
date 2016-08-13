<?php 
  require_once('carcase.php');
  function trabajosSubidos(){

  ?>
  <div class="container">
      <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Trabajos subidos</h3>
  </div>
  <div class="doit panel-body">
  <div class="col col-lg-12 col-md-9 col-sm-9 col-xs-12">
  <div class="seccion3">
  <ul class="list-inline">
  <li><button class="btn btn-link"><span class="glyphicon glyphicon-folder-open"> Cargar Archivo</span></button></li>
  <li><button class="btn btn-link"><span class="glyphicon glyphicon-apple"> Nueva Materia</span></button></li>
  <li><button class="btn btn-link"><span class="glyphicon glyphicon-education"> Nuevo Semestre</span></button></li>
  </ul>
  </div>    
  <table class="table table-hover">
  <tr class="active sin" >
    <td>Nombre</td>
    <td>Fecha</td>
    <td>Materia</td>
    <td>Votaciones</td>
    <td>...</td>
  </tr>
  </table>
  </div>
  </div>
  </div>
  </div>
 <?php 
   }

   ?>