<?php
class Conectar{
public static function conexion(){
  //parametros de la conexion
  $user="root";
  $password="";
  $server="localhost";
  $db="exituscrud";

  //se reliza la conecion a la base de datos exituscrud
  $conexion=new mysqli($server, $user, $password, $db);
  //codificacion utf8
  $conexion->query("SET NAMES 'utf8'");
  return $conexion;
  }
}
?>
