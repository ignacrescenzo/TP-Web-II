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
 
    $sql= 'select Rol.tipo as rol, idUsuario as id from Usuario inner join Rol on Usuario.Rol_idRol = Rol.idRol where Usuario.nombreUsuario="'.$u.'" and Usuario.clave="'.$c.'"; ';
    
    $result=mysqli_query($db,$sql);
	  $rows=mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result)==1){
		$rol=($rows['rol']);
    $id=($rows['id']);
    if ($rol=='Delivery'){
      $db=BaseDeDatos::conectarBD();
      $sql2='select habilitado as h from Usuario where Rol_idRol=3 and idUsuario="'.$id.'";';
      $result2=mysqli_query($db,$sql2);
      $rows2=mysqli_fetch_assoc($result2);
      $habilitado=$rows2['h'];
      if ($habilitado==1) {
        return $rol;
      }else{
        echo "No se encuentra habilitado por un administrador";
      }
    }else{
      return $rol;
    }
		/*
      }else{
        echo "Error al buscar el usuario";
        echo "<br>";
        echo "<a href='/main/index'>Volver</a>";
      }
      */
   }
   else{
     header("location:/login?e=1");
   }
 }

   public function cerrarsesion(){
    session_destroy();
    header("location:/main");
   }

   public function insertarCliente($username,$password,$email,$name,$surname,$direccion,$tel,$idLocalidad){
    $db=BaseDeDatos::conectarBD();
    $sql = "insert into Usuario (nombreUsuario,clave,email,nombre,apellido,domicilio,telefono,Rol_idRol,provincialocalidad_idLocalidad) values ('".$username."','".$password."','".$email."','".$name."','".$surname."','".$direccion."','".$tel."',2,'".$idLocalidad."');";
    echo $sql;
    $result = mysqli_query($db,$sql);
   }

   public function insertarDelivery($username,$password,$email,$name,$surname,$tel){
    $db=BaseDeDatos::conectarBD();
    $sql = "insert into Usuario (nombreUsuario,clave,email,nombre,apellido,telefono,Rol_idRol,estado,habilitado) values ('".$username."','".$password."','".$email."','".$name."','".$surname."','".$tel."',3,0,0);";
    echo $sql;
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


   public function obtenerIdDelivery($username){
    $db=BaseDeDatos::conectarBD();
    $sql = "select idUsuario from Usuario where nombreUsuario = '".$username."';";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row['idUsuario'];
  }
    public function obtenerUsuario($idUsuario){
    $db=BaseDeDatos::conectarBD();
    $sql = "select u.idUsuario as idUsuario, u.nombreUsuario as nombreUsuario, c.email as email, c.idComercio as idComercio from Usuario as u
       inner join comercio as c on u.Comercio_idComercio = c.idComercio
      where idUsuario = '".$idUsuario."';";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
  }

	
	public function mostrarPedidosCliente($id){
    $conn =BaseDeDatos::conectarBD();
    $sql = "select loc.descripcionLocalidad as localidad, loc.descripcionProvincia as provincia, p.montoTotal as total, p.fechaHoraGenerado as horaG, p.Usuario_idDelivery as idDelivery, c.direccion as dir, p.idPedido as id,p.fechaHoraRetiro as retiro, p.fechaHoraEntrega as entrega
	from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
	inner join puntodeventa as c on c.idPuntoDeVenta = p.idPuntoDeVenta
    inner join provincialocalidad as loc on c.provincialocalidad_idLocalidad = loc.idLocalidad
	where p.Usuario_idCliente = ".$id.";";
	$result = mysqli_query($conn,$sql);
    return $result;
	}
	
  public function mostrarPedidosOperador($id){
    $conn =BaseDeDatos::conectarBD();
    $sql = "select p.montoTotal as total, p.fechaHoraGenerado as horaG, p.Usuario_idDelivery as idDelivery, c.direccion as dir, p.idPedido as id,p.fechaHoraRetiro as retiro,p.idPuntoDeVenta, p.fechaHoraEntrega as entrega
  from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
  inner join puntodeventa as c on c.idPuntoDeVenta = p.idPuntoDeVenta
  where p.idPuntoDeVenta = ".$id."";
  $result = mysqli_query($conn,$sql);
  return $result;
  }

	public function retirarPedidoDelivery($id){
		$conn = BaseDeDatos::conectarBD();
		$sql = "update Pedido set fechaHoraRetiro=(select now()) where idPedido=".$id.";";
		$result = mysqli_query($conn,$sql);
	}
	public function entregarPedidoDelivery($id,$idDelivery){
		$conn = BaseDeDatos::conectarBD();
		$sql = "update Pedido set fechaHoraEntrega=(select now()) where idPedido=".$id.";";
		$sql2 = "update usuario set estado = 1, horaActivo=(now())where idUsuario=".$idDelivery.";";
		$result2 =mysqli_query($conn,$sql2);
		$result = mysqli_query($conn,$sql);
	}
		public function aceptarPedidoDelivery($id,$idDelivery){
    $conn = BaseDeDatos::conectarBD();
    $sql2 = "update usuario set estado = 0, horaActivo=null where idUsuario=".$idDelivery.";";
		$sql = "update Pedido set Usuario_idDelivery=".$idDelivery." where idPedido=".$id.";";
		$result2 =mysqli_query($conn,$sql2);
    $result = mysqli_query($conn,$sql);
	}
	public function cancelarPedidoDelivery($id,$idDelivery){
		$conn = BaseDeDatos::conectarBD();
		$sql = "update Pedido set Usuario_idDelivery=null where idPedido=".$id.";";
		$sql2 = "update usuario set estado = 1, horaActivo=(now())where idUsuario=".$idDelivery.";";
		$result2 =mysqli_query($conn,$sql2);
		$result = mysqli_query($conn,$sql);
	}
	public function listarPedidosEnCursoDelivery($id){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select loc.descripcionLocalidad as ulocalidad, loc.descripcionProvincia as uprovincia,loccom.descripcionLocalidad as clocalidad, loccom.descripcionProvincia as cprovincia, p.idPuntoDeVenta,p.montoTotal as total, p.fechaHoraGenerado as horaG, p.idPedido as id, u.domicilio dom, c.direccion as dir,p.fechaHoraRetiro as retiro, p.fechaHoraEntrega as entrega
		from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
		inner join puntodeventa as c on c.idPuntoDeVenta = p.idPuntoDeVenta
        inner join provincialocalidad as loc on u.provincialocalidad_idLocalidad = loc.idLocalidad
        inner join provincialocalidad as loccom on c.provincialocalidad_idLocalidad = loccom.idLocalidad
		where p.Usuario_idDelivery = ".$id." and p.fechaHoraEntrega is null;";
    		$result = mysqli_query($conn,$sql);
        return $result;
    }
    
    public function listarPedidosDisponibles(){
        $conn = BaseDeDatos::conectarBD();
        $sql = "select loc.descripcionLocalidad as ulocalidad, loc.descripcionProvincia as uprovincia,loccom.descripcionLocalidad as clocalidad, loccom.descripcionProvincia as cprovincia, p.montoTotal as total,p.idPuntoDeVenta, p.fechaHoraGenerado as horaG, p.idPedido as id, u.domicilio dom, c.direccion as dir,p.fechaHoraRetiro as retiro, p.fechaHoraEntrega as entrega
		from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
		inner join puntodeventa as c on c.idPuntoDeVenta = p.idPuntoDeVenta
        inner join provincialocalidad as loc on u.provincialocalidad_idLocalidad = loc.idLocalidad
        inner join provincialocalidad as loccom on c.provincialocalidad_idLocalidad = loccom.idLocalidad
		where p.Usuario_idDelivery is null;";
		$result = mysqli_query($conn,$sql);
        return $result;
	}
	
	public function listarPedidosRealizadosDelivery($id){
    $conn =BaseDeDatos::conectarBD();
    $sql = "select loc.descripcionLocalidad as ulocalidad, loc.descripcionProvincia as uprovincia,loccom.descripcionLocalidad as clocalidad, loccom.descripcionProvincia as cprovincia, p.montoTotal as total, p.fechaHoraGenerado as horaG, p.idPedido as id, u.domicilio as dom, c.direccion as dir,p.fechaHoraRetiro as retiro, p.fechaHoraEntrega as entrega
		from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
		inner join puntodeventa as c on c.idPuntoDeVenta = p.idPuntoDeVenta
        inner join provincialocalidad as loc on u.provincialocalidad_idLocalidad = loc.idLocalidad
        inner join provincialocalidad as loccom on c.provincialocalidad_idLocalidad = loccom.idLocalidad
		where p.Usuario_idDelivery = ".$id." and p.fechaHoraEntrega is not null;";
		$result = mysqli_query($conn,$sql);
    return $result;
	}

  public function deliveryActivo($id){
    $conn =BaseDeDatos::conectarBD();
    $sql = "update Usuario set estado='1' where idUsuario=".$id.";";
    $_SESSION['estado'] = 1;
    $result = mysqli_query($conn,$sql);
    return $result;
  }

  public function deliveryInactivo($id){
    $conn =BaseDeDatos::conectarBD();
    $sql = "update Usuario set estado='0' where idUsuario=".$id.";";
    $result = mysqli_query($conn,$sql);
    return $result;
  }

  public function deliveryHoraActivo($id){
    $conn =BaseDeDatos::conectarBD();
    $sql = "update Usuario set horaActivo=(select now()) where idUsuario=".$id.";";
    $result = mysqli_query($conn,$sql);
    return $result;
  }

  public function deliveryDesconectado($id){
    $conn =BaseDeDatos::conectarBD();
    $sql = "update Usuario set horaDesconectado=(select now()) where idUsuario=".$id.";";
    $result = mysqli_query($conn,$sql);
    return $result;
  }

  public function listarDeliverys($estado){
        $conn =BaseDeDatos::conectarBD();
        $sql= "select * from Usuario as u where u.habilitado=".$estado." and u.Rol_idRol = 3;";
        $result = mysqli_query($conn,$sql); 
        return $result;
  }  


public function listarDeliverysEnEsperaDeAprobacion(){
        $conn =BaseDeDatos::conectarBD();
        $sql= "select * from Usuario as u where u.habilitado=0 and u.horaActivo is null and Rol_idRol=3;";
        $result = mysqli_query($conn,$sql); 
        return $result;
  }

  public function habilitarDelivery($idUsuario){
        $conn =BaseDeDatos::conectarBD();
        $sql="update Usuario set habilitado=1 where idUsuario=".$idUsuario.";";
        $result = mysqli_query($conn,$sql);
        if ($result){
            echo "Se habilito correctamente el delivery...";
            }else{
              echo "No se pudo habilitar el delivery correctamente";
            }       
  }

   public function deshabilitarDelivery($idUsuario){
        $conn =BaseDeDatos::conectarBD();
        $sql="update Usuario set habilitado=0 where idUsuario=".$idUsuario.";";
        $result = mysqli_query($conn,$sql);
        if ($result){
            echo "Se deshabilito correctamente el delivery...";
            }else{
              echo "No se pudo deshabilitar el delivery correctamente";
            }       
    }

    public function eliminarDelivery($idUsuario){
        $conn =BaseDeDatos::conectarBD();
        $sql="delete from Usuario where idUsuario=".$idUsuario.";";
        $result = mysqli_query($conn,$sql);
        if ($result){
            echo "Se ha eliminado correctamente el delivery...";
            }else{
              echo "No se pudo eliminar el delivery correctamente";
            } 
    }

    public function verificarPenalizaciones(){
      $conn =BaseDeDatos::conectarBD();
      $sql = "select * from usuario where Rol_idRol = 3 and timestampdiff (minute,horaActivo,now()) >= 1;";
      $result = mysqli_query($conn,$sql);
      return $result;     
    }
    public function penalizarDeliverys($result){
      $conn =BaseDeDatos::conectarBD();
      while($rows = mysqli_fetch_assoc($result)){
        $sql = "update usuario set habilitado = 2, horaPenalizado = (now()) where idUsuario =".$rows['idUsuario'].";";
        mysqli_query($conn,$sql);
      }
    }
    public function getHabilitado($id){
      $conn =BaseDeDatos::conectarBD();
      $sql = "select habilitado from usuario where idUsuario=".$id.";";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      return $row['habilitado'];

      // if($result == 2){
      //   $sql2 = "select idUsuario from usuario where idUsuario=".$id." and timestampdiff (minute,horaPenalizado,now()) >= 1;";
      //   $id2 = mysqli_query($conn,$sql2);
      // }
      // if($id2 != null){
        
      // }

    }
    public function chequearTiempoPenalizacion($id){
      $conn =BaseDeDatos::conectarBD();
      $sql = "select idUsuario from usuario where idUsuario=".$id." and timestampdiff (minute,horaPenalizado,now()) >= 1;";
      $id = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($id);
      return $row['idUsuario'];
    }
    public function despenalizar($id){
      $conn =BaseDeDatos::conectarBD();
      $sql = "update usuario set habilitado = 1 where idUsuario=".$id.";";
      mysqli_query($conn,$sql); 
    }

   public function cambiarContrasenaUsuarioDeComercio($claveNueva,$idUsuario){
     $conn =BaseDeDatos::conectarBD();
     $sql= "update usuario set clave = '".$claveNueva."' where idUsuario=".$idUsuario.";";

      $result = mysqli_query($conn,$sql);
      return $result;  
   }

   public function cargarUsuariosDeComercio($usuario2,$usuario3,$usuario4,$usuario5,$clave2,$clave3,$clave4,$clave5,$idComercio){
    $conn =BaseDeDatos::conectarBD();
    $sql = "insert into usuario (nombreUsuario, clave, Rol_idRol,Comercio_idComercio) values ('".$usuario2."','".$clave2."',4,".$idComercio."), ('".$usuario3."','".$clave3."',4,".$idComercio."),('".$usuario4."','".$clave4."',4,".$idComercio."),('".$usuario5."','".$clave5."',4,".$idComercio.");";
     $result = mysqli_query($conn,$sql);
      return $result; 
   }
   public function cobrarComisiones($idComercio,$idDelivery,$total){
    $porcentajeAdmin = $total * 5 / 100;
    $porcentajeDelivery = $total * 3 / 100;
    $porcentajeComercio = $porcentajeAdmin + $porcentajeDelivery;
    $conn =BaseDeDatos::conectarBD();

    $sqlMontoComercio = "(select monto from cuenta where comercio_idComercio = ".$idComercio.")";
    $result = mysqli_query($conn,$sqlMontoComercio);
    $row = mysqli_fetch_assoc($result);

    $sql = "update cuenta set monto = ".$row['monto']."-".$porcentajeComercio." where comercio_idComercio = ".$idComercio.";";
    $result = mysqli_query($conn,$sql);

    //movimiento monetario
    $sql4 = "insert into movimiento (monto,fecha,comercio_idComercio,tipo,liquidado) values (".$porcentajeAdmin.",CURDATE(),".$idComercio.",'Pago a Administrador',0);";
    mysqli_query($conn,$sql4);

    $sql5 = "insert into movimiento (monto,fecha,comercio_idComercio,tipo,liquidado,usuario_idUsuario) values (".$porcentajeDelivery.",CURDATE(),".$idComercio.",'Pago a Delivery',0,".$idDelivery.");";
    mysqli_query($conn,$sql5);

    $sqlMontoAdmin = "(select monto from cuenta where usuario_idUsuario = 1)";
    $result = mysqli_query($conn,$sqlMontoAdmin);
    $row = mysqli_fetch_assoc($result);

    
    $sql2 = "update cuenta set monto = ".$row['monto']."+".$porcentajeAdmin." where usuario_idUsuario = 1;";
    $result = mysqli_query($conn,$sql2);

    $sqlMontoDelivery = "(select monto from cuenta where usuario_idUsuario = ".$idDelivery.")";
    $result = mysqli_query($conn,$sqlMontoDelivery);
    $row = mysqli_fetch_assoc($result);

    $sql3 = "update cuenta set monto = ".$row['monto']."+".$porcentajeDelivery." where usuario_idUsuario = ".$idDelivery.";";
    $result = mysqli_query($conn,$sql3);
   }

   public function verificarTardanza($idPedido){
    $conn = BaseDeDatos::conectarBD();
    $sqlTiempoEntrega = "select c.tiempoEntrega from pedido p inner join puntodeventa pdv on pdv.idPuntoDeVenta=p.idPuntoDeVenta inner join comercio c on c.idComercio = pdv.Comercio_idComercio where p.idPedido = ".$idPedido.";";
    $result = mysqli_query($conn,$sqlTiempoEntrega);
    $row = mysqli_fetch_assoc($result);
    $tiempoLimite = $row['tiempoEntrega'] + ($row['tiempoEntrega'] * 15 / 100);
    $sql = "select * from pedido where idPedido=".$idPedido." and timestampdiff (minute,fechaHoraRetiro,fechaHoraEntrega) > ".$tiempoLimite.";";
    $result2 = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result2) >= 1){
      return true;
    }
    else{
      return false;
    }
  }

  public function bonificarAlCliente($idPedido,$montoTotal){
    $conn = BaseDeDatos::conectarBD();
    $sql = "select Usuario_idCliente from pedido where idPedido = ".$idPedido.";";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $idCliente = $row['Usuario_idCliente'];
    
    $porcentaje = ($montoTotal * 10 / 100);

    $sqlMontoCliente = "(select monto from cuenta where usuario_idUsuario = ".$idCliente.")";
    $result3 = mysqli_query($conn,$sqlMontoCliente);
    $row3 = mysqli_fetch_assoc($result3);
    $totalParaCliente = $row3['monto'] + $porcentaje;

    $sql4 = "update cuenta set monto = ".$totalParaCliente." where usuario_idUsuario = ".$idCliente."";
    $result4 = mysqli_query($conn,$sql4);
  }

  public function cobrarAlDelivery($idDelivery,$idPedido,$montoTotal){
    $conn = BaseDeDatos::conectarBD();
    $porcentaje = ($montoTotal * 0.5 / 100);

    $sqlMontoDelivery = "(select monto from cuenta where usuario_idUsuario = ".$idDelivery.")";
    $result3 = mysqli_query($conn,$sqlMontoDelivery);
    $row3 = mysqli_fetch_assoc($result3);
    $totalParaDelivery = $row3['monto'] - $porcentaje;

    $sql4 = "update cuenta set monto = ".$totalParaDelivery." where usuario_idUsuario = ".$idDelivery."";
    $result4 = mysqli_query($conn,$sql4);
  }

  public function cobrarAlCliente($idPedido,$total){
    $conn = BaseDeDatos::conectarBD();
    $sql = "select Usuario_idCliente from pedido where idPedido = ".$idPedido.";";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $idCliente = $row['Usuario_idCliente'];

    $sqlMontoCliente = "(select monto from cuenta where usuario_idUsuario = ".$idCliente.")";
    $result3 = mysqli_query($conn,$sqlMontoCliente);
    $row3 = mysqli_fetch_assoc($result3);
    $totalParaCliente = $row3['monto'] - $total;

    $sql4 = "update cuenta set monto = ".$totalParaCliente." where usuario_idUsuario = ".$idCliente."";
    $result4 = mysqli_query($conn,$sql4);
  }

  public function pagarAlComercio($idComercio,$total){
    $conn = BaseDeDatos::conectarBD();
    $sqlMontoComercio = "(select monto from cuenta where comercio_idComercio = ".$idComercio.")";
    $result3 = mysqli_query($conn,$sqlMontoComercio);
    $row3 = mysqli_fetch_assoc($result3);
    $totalParaComercio = $row3['monto'] + $total;

    $sql4 = "update cuenta set monto = ".$totalParaComercio." where comercio_idComercio = ".$idComercio."";
    $result4 = mysqli_query($conn,$sql4);

    $sql5 = "insert into movimiento (monto,fecha,comercio_idComercio,tipo,liquidado) values (".$total.",CURDATE(),".$idComercio.",'Venta',0);";
    mysqli_query($conn,$sql5);
  }

  public function deliverySePoneInactivo($id){
    $conn =BaseDeDatos::conectarBD();
    $sql = "update Usuario set estado=0, horaActivo=null where idUsuario=".$id.";";
    $_SESSION['estado'] = 0;
    $result = mysqli_query($conn,$sql);
    return $result;
  }
  
  public function listarLocalidadesCliente(){
		$conn =BaseDeDatos::conectarBD();
		$sql="select * from provincialocalidad;";
		$result = mysqli_query($conn,$sql);
    return $result;
  }
  
  public function liquidarDatos($desde,$hasta){
    $conn =BaseDeDatos::conectarBD();
    $sql = "update movimiento set liquidado = 1,fechaLiquidado = CURDATE() where (fecha between '".$desde."' and '".$hasta."') and liquidado = 0;";
    $result = mysqli_query($conn,$sql);
  }

  public function mostrarDatosDeLiquidacion($desde,$hasta){
    $conn =BaseDeDatos::conectarBD();
    $sql = "select * from movimiento where (fecha between '".$desde."' and '".$hasta."') and liquidado = 0;";
    $result = mysqli_query($conn,$sql);
    return $result;
  }
  
  public function verMovimientosSinLiquidar($desde,$hasta,$idDelivery){
	$conn =BaseDeDatos::conectarBD();
    $sql = "select * from movimiento where fecha between '".$desde."' and '".$hasta."' and liquidado = 0 and usuario_idUsuario =".$idDelivery.";";
    $result = mysqli_query($conn,$sql);
    return $result;
  }
  
  public function listarLiquidaciones($idDelivery){
	$conn =BaseDeDatos::conectarBD();
	$sql="select distinct fechaLiquidado from movimiento where usuario_idUsuario = ".$idDelivery.";";
	$result = mysqli_query($conn,$sql);
    return $result;
  }
  
  public function verLiquidacionSelecionada($idDelivery,$fechaLiquidado){
	$conn =BaseDeDatos::conectarBD();
	$sql = "select * from movimiento where usuario_idUsuario =".$idDelivery." and fechaLiquidado ='".$fechaLiquidado."';";
	$result = mysqli_query($conn,$sql);
    return $result;
  }
  
    public function listarLiquidacionesAdministrador(){
	$conn =BaseDeDatos::conectarBD();
	$sql="select distinct fechaLiquidado from movimiento;";
	$result = mysqli_query($conn,$sql);
    return $result;
  }
  
  public function verLiquidacionSelecionadaAdministrador($fechaLiquidado){
	$conn =BaseDeDatos::conectarBD();
	$sql = "select * from movimiento where fechaLiquidado ='".$fechaLiquidado."';";
	$result = mysqli_query($conn,$sql);
    return $result;
  }

  public function obtenerEstadoDelivery($idDelivery){
    $conn =BaseDeDatos::conectarBD();
    $sql = "select estado from usuario where idUsuario ='".$idDelivery."';";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row['estado'];
    }
}
?>