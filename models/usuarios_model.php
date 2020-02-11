<?php
class usuarios_model{
    private $conexion;
    private $usuarios;

    //constructor para obtener la conecion hacia la base de datos
    public function __construct(){
        $this->conexion=Conectar::conexion();
        $this->usuarios=array();
    }

    //funcion para la obtencion de los usuarios
    public function get_usuarios(){
        $consulta=mysqli_query($this->conexion,"SELECT * FROM usuarios;");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }

    //añadir un nuevo usuario a la base de datos
    public function new_usuario($nombre,$apellido_paterno,$apellido_materno,$fecha_nacimiento){
        $nuevo_usuario_db=mysqli_query($this->conexion,"INSERT INTO usuarios (id, nombre, apellido_paterno, apellido_materno, fecha_nacimiento) VALUES (NULL, '$nombre', '$apellido_paterno', '$apellido_materno', '$fecha_nacimiento')");
        if(!$nuevo_usuario_db){
          die("Fallo la inserción del usuario.");
          return false;
        }
        return true;
    }
    //mostrar la informacion del usuario a editar
    public function edit_usuario($id){
        $consulta=mysqli_query($this->conexion,"SELECT * FROM usuarios WHERE id=$id;");
        $usuario=$consulta->fetch_assoc();
            $this->usuarios=$usuario;
        return $this->usuarios;
    }

    //actualizar la informacion del usuario
    public function update_usuario($id,$nombre,$apellido_paterno,$apellido_materno,$fecha_nacimiento){
        $actualizacion_usuario_db=mysqli_query($this->conexion,"UPDATE usuarios SET nombre='$nombre', apellido_paterno='$apellido_paterno',apellido_materno='$apellido_materno', fecha_nacimiento='$fecha_nacimiento' WHERE id=$id");
        if(!$actualizacion_usuario_db){
          die("Fallo la modificación del usuario.");
          return false;
        }
        return true;
    }
    //elimiar el registro del usuario
    public function delete_usuario($id){
        $eliminar_usuario_db=mysqli_query($this->conexion,"DELETE FROM usuarios WHERE id=$id");
        if(!$eliminar_usuario_db){
          die("Fallo la eliminación del usuario.");
          return false;
        }
        return true;
    }


}
?>
