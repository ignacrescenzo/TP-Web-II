<?php

class Model_Usuario extends Model{

  private $db;
  private $usuario;
  private $clave;

  public function __construct(){
   require_once 'modelo_conexion_base_de_datos.php';
   $db=BaseDeDatos::conectarBD();
 }

   public function validarlogin($u,$c){
   $db=BaseDeDatos::conectarBD();
 
    $sql= 'select Rol.tipo as rol from Usuario inner join Rol on Usuario.Rol_idRol = Rol.idRol where Usuario.nombreUsuario="'.$u.'" and Usuario.clave="'.$c.'"; ';
    
    $result=mysqli_query($db,$sql);
	$rows=mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result)==1){
		$rol=($rows['rol']);
		return $rol;
      }else{
        echo "Error al buscar el usuario";
        echo "<br>";
        echo "<a href='/main/index'>Volver</a>";
      }

   }

   public function cerrarsesion(){
    session_destroy();
    header("location:/main");
   }

   public function insertarCliente($username,$password,$email,$name,$surname,$direccion,$tel){
    $db=BaseDeDatos::conectarBD();
    $sql = "insert into Usuario (nombreUsuario,clave,email,nombre,apellido,direccion,telefono,Rol_idRol) values ('".$username."','".$password."','".$email."','".$name."','".$surname."','".$direccion."','".$tel."',2);";
    $result = mysqli_query($db,$sql);
   }
   public function insertarOperadorComercio($username,$password,$comercioId){
    $db=BaseDeDatos::conectarBD();
    $sql = "insert into Usuario (nombreUsuario,clave,Comercio_idComercio,Rol_idRol) values ('".$username."','".$password."','".$comercioId."',4);";
    $result = mysqli_query($db,$sql);
   }
   ///OBTENER ID DEL COMERCIO EN QUE TRABAJA
   public function obtenerIdComercio($username){
    $db=BaseDeDatos::conectarBD();
    $sql = "select Comercio_idComercio from Usuario where nombreUsuario = '".$username."';";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Comercio_idComercio'];
   }

   public function obtenerIdCliente($username){
    $db=BaseDeDatos::conectarBD();
    $sql = "select idUsuario from Usuario where nombreUsuario = '".$username."';";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row['idUsuario'];
   }

}
?>