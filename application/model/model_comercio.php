<?php
require_once 'modelo_conexion_base_de_datos.php';

class Model_Comercio extends Model{
    public function __construct() {
        
    }
    public function listarComercios(){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from Comercio;";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    public function listarComercioEspecifico($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from Comercio where idComercio = ".$idComercio.";";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    public function traerComercioPorNombre($nombreComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select idComercio from comercio where nombre = '".$nombreComercio."';";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['idComercio'];
        return $id;
    }
	
    public function agregarIdComercioAOperador($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "upgrade usuario set Comercio_idComercio =".$idComercio." WHERE idUsuario=9;";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
	
	public function listarLocalidades(){
		$conn =BaseDeDatos::conectarBD();
		$sql="select * from provincialocalidad;";
		$result = mysqli_query($conn,$sql);
        return $result;
	}
    
    public function listarPuntosDeVenta($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from puntodeventa as p 
		inner join provincialocalidad as pl on pl.idLocalidad = p.provincialocalidad_idLocalidad 
		where Comercio_idComercio = ".$idComercio.";";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    public function insertarPuntoDeVenta($direccion,$telefono,$idComercio,$idLocalidad){
        $conn =BaseDeDatos::conectarBD();
        $sql="insert into PuntoDeVenta (direccion, telefono, Comercio_idComercio, provincialocalidad_idLocalidad) values ('".$direccion."','".$telefono."',".$idComercio.",".$idLocalidad.")";
        $result = mysqli_query($conn,$sql);
    }

    public function insertarUsuarioDeComercio($NombreUsuario1,$clave1,$idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "insert into usuario (nombreUsuario, clave, Rol_idRol, habilitado, Comercio_idComercio) values ('".$NombreUsuario1."', '".$clave1."', 4, 0,".$idComercio.")";
        $result = mysqli_query($conn,$sql);   
    }

    public function listarComerciosEnEspera(){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select c.idComercio as idComercio, c.nombre as nombreComercio, c.email as emailComercio, c.direccion as direccionComercio, c.telefono as telefonoComercio, c.habilitado as habilitadoComercio, u.idUsuario as idUsuario
            from comercio as c
            inner join usuario as u on c.idComercio = u.Comercio_idComercio
            where c.habilitado = 0;";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    public function activarComercio($usuarioParaEmail){
        $idComercio = $usuarioParaEmail['idComercio'];
        $conn =BaseDeDatos::conectarBD();
        $sql = "update comercio set habilitado=1 where idComercio =".$idComercio."";
        $result = mysqli_query($conn,$sql);
        return $result;
}

    public function enviarEmailDeConfirmacion($usuarioParaEmail){
      $idUsuario = $usuarioParaEmail['idUsuario'];
      $nombreUsuario = $usuarioParaEmail['nombreUsuario'];
      $idComercio = $usuarioParaEmail['idComercio'];
      $email = $usuarioParaEmail['email'];

      $titulo = "Email Confirmacion Resto";
      $mensaje = "Para seguir la confirmacion de tu comercio entra a el siguiente link: www.localhost/login/cambiarContrasena?u=".$idUsuario."&c=".$idComercio."";

                
                /*Configuracion de variables para enviar el correo*/
                $mail_username="alansnydermusic@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
                $mail_userpassword="alan.boca12";//Tu contraseña de gmail
                $mail_addAddress=$email;//correo electronico que recibira el mensaje
                //$template="application/view/email_template.html"; // $template="email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
                
                /*Inicio captura de datos enviados por $_POST para enviar el correo */
                $mail_setFromEmail=$email;
                $mail_setFromName=$nombreUsuario;
                $txt_message=$mensaje;
                $mail_subject= $titulo;
                
               $this->sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject);//Enviar el mensaje
            
    }

    public  function sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject){

    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
    $mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar 
    $mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
    $mail->Username = $mail_username;          // Correo electronico saliente ejemplo: tucorreo@gmail.com
    $mail->Password = $mail_userpassword;       // Tu contraseña de gmail
    $mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
    $mail->Port = 587;                      // Puerto TCP  para conectarse 
    $mail->setFrom($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
    $mail->addReplyTo($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
    $message = ($txt_message);
    $mail->addAddress($mail_addAddress);   // Agregar quien recibe el e-mail enviado
    $message = str_replace('{{first_name}}', $mail_setFromName, $message);
    $message = str_replace('{{message}}', $txt_message, $message);
    $message = str_replace('{{customer_email}}', $mail_setFromEmail, $message);
    $mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
    
    $mail->Subject = $mail_subject;
    $mail->msgHTML($message);
    $mail->send();
}

    public function eliminarPuntoDeVenta($idPuntodeventa,$idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "delete from menu where idPuntoDeVenta=".$idPuntodeventa.";";
        $result = mysqli_query($conn,$sql);
        $sql="delete from PuntoDeVenta where idPuntoDeVenta=".$idPuntodeventa." and Comercio_idComercio = ".$idComercio.";";
        $result = mysqli_query($conn,$sql);
    }

    public function updatePuntoDeVenta($idPuntoDeVenta,$telefono,$direccion,$idLocalidad){
        $conn =BaseDeDatos::conectarBD();
        $sql="update PuntoDeVenta set direccion='".$direccion."',telefono='".$telefono."',provincialocalidad_idLocalidad='".$idLocalidad."' where idPuntoDeVenta=".$idPuntoDeVenta.";";
        $result = mysqli_query($conn,$sql);
    }
    
    public function eliminarComercioPorId($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql= "delete from comercio where idComercio=".$idComercio.";";
        $result = mysqli_query($conn,$sql);   
    }

   public function eliminarUsuarioDeComercio($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql= "delete from usuario where Comercio_idComercio=".$idComercio.";";
        $result = mysqli_query($conn,$sql);   
   }

   public function obtenerIdComercio($idPuntoDeVenta){
    $conn =BaseDeDatos::conectarBD();
    $sql= "select Comercio_idComercio from puntodeventa where idPuntoDeVenta=".$idPuntoDeVenta.";";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['Comercio_idComercio'];
    return $id;
   }

   
    public function insertarComercio($nombreComercio,$email,$direccion,$telefono){
        $conn =BaseDeDatos::conectarBD();
        $sql = "insert into comercio (nombre,email,direccion,banner,telefono, habilitado) values ('".$nombreComercio."','".$email."','".$direccion."', null, '".$telefono."',0 );";

        $result = mysqli_query($conn,$sql);   
        return $result;
    }
}