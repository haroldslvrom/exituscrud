<?php


//Llamada al modelo
require_once("models/usuarios_model.php");

// index
if(!isset($_GET['opcion'])){
  $usuarios=new usuarios_model();
  $datos=$usuarios->get_usuarios();
  //Llamada a la vista para mostrar todos los usuarios
  require_once("views/usuarios_view.phtml");
}
//new
else if($_GET['opcion']=='new_user'){
  //Llamada a la vista para añadir un nuevo usuario
    require_once("views/formulario_new.phtml");
 }
//store
 else if ($_GET['opcion']=='registrar') {
   $usuarios=new usuarios_model();
   $registro=$usuarios->new_usuario($_POST['nombre'],$_POST['apellido_paterno'],$_POST['apellido_materno'],$_POST['fecha_nacimiento']);
   $datos=$usuarios->get_usuarios();
   //Llamada a la vista mostrar todos los usuarios
   require_once("views/usuarios_view.phtml");
 }
 //edit
 else if ($_GET['opcion']=='editar') {
   //Llamada a la vista para modificar un usuario
    $usuarios=new usuarios_model();
    $datos=$usuarios->edit_usuario($_GET['id']);
   require_once("views/formulario_update.phtml");
 }
 //edit
 else if ($_GET['opcion']=='modificar') {
   //Llamada a la vista para modificar un usuario
    $usuarios=new usuarios_model();
    $modificar=$usuarios->update_usuario($_POST['id'],$_POST['nombre'],$_POST['apellido_paterno'],$_POST['apellido_materno'],$_POST['fecha_nacimiento']);
    $datos=$usuarios->get_usuarios();
   require_once("views/usuarios_view.phtml");
 } //destroy
 else if ($_GET['opcion']=='eliminar') {
    //Llamada a la vista para modificar un usuario
     $usuarios=new usuarios_model();
     $modificar=$usuarios->delete_usuario($_GET['id']);
     $datos=$usuarios->get_usuarios();
    require_once("views/usuarios_view.phtml");
  }






















?>
