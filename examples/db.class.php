<?php

class db {

  protected $name;
  protected $sname;
  protected $conex;

        public function agregar($n,$s){

          $this->name=$n;
          $this->sname=$s;

          //realizando la conexion
          $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
          mysql_select_db("ipnetwork",$a)or die("checar conexion");
          //realizando el query para agregar datos
          mysql_query("INSERT INTO prueba (NOMBRE,APELLIDO)
           VALUES ('$this->name','$this->sname')",$a);
          echo "datos agregados exitosamente";

      }

      public function buscar ($n){
        $this->name=$n;

        //buscando un registro ya en la DB

        //realizando la conexion
        $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");

        //recuperando los datos de una base de datos
        $registro=mysql_query("SELECT * from prueba WHERE NOMBRE='$this->name'")
        or die ("problemas en consulta: ".mysql_error());

        while($reg=mysql_fetch_array($registro)){
        	echo $reg['NOMBRE']."<br>";
        	echo $reg['APELLIDO']."<br>";
        }
      }

      public function modificar($n,$s){
        //recibiendo los parámetros
        $this->name=$n;
        $this->sname=$s;

        //realizando la conexion
        $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");

        //realizar la actualización
        mysql_query("UPDATE prueba set APELLIDO = '$this->sname' WHERE NOMBRE='$this->name'")
         or die (mysql_error());

        echo "actualizacion correcta";

      }

      public function eliminar($n){
        $this->name=$n;

        //realizando la conexion
        $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");
        //eliminando
        $reg=mysql_query("SELECT ID FROM prueba WHERE NOMBRE='$this->name'",$a);
        if($re=mysql_fetch_array($reg)){
        	mysql_query("DELETE FROM prueba WHERE NOMBRE = '$this->name'",$a);
        	echo "datos eliminados";
        }else{
        	echo "problema al eliminiar";
        }

      }

      public function leer(){

        //realizando la conexion
        $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");

        $registro=mysql_query("SELECT * from prue_u")
          or die ("problemas en consulta: ".mysql_error());
          $i=1;
          //recuperando los datos de una base de datos
          while($reg=mysql_fetch_array($registro)){

            echo $i.".- ";
          	echo $reg['ID']." ";
          	echo $reg['USER']."<br>";
            $i++;

          }
      }

}


 ?>
