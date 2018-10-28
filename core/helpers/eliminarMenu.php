<?php
header("location:/puntoDeVenta");
//$conn = mysqli_connect("localhost","root","","tpweb2db");
$conn = mysqli_connect("localhost","root","0000","tpweb2db");
$descripcion = $_GET['variable'];
$queryPrecio = "select * from menu where descripcion='$descripcion'";
$result = mysqli_query($conn,$queryPrecio);
$precio = mysqli_fetch_assoc($result);
$idPrecio = $precio['Precio_idPrecio'];
//HAGO LA QUERY PARA DESPUES PREGUNTAR CUANTOS MENUES HAY CON ESE PRECIO
$queryMenuesConEsePrecio = "select idMenu from menu where Precio_idPrecio = $idPrecio";
$result = mysqli_query($conn,$queryMenuesConEsePrecio);
$numeroFilas=mysqli_num_rows($result);
////BORRO PRIMERO EL MENU PARA QUE NO DE ERROR
$query = "delete from menu where descripcion='$descripcion';";
$resultado = mysqli_query($conn, $query);
////
/// ///AHORA PREGUNTO CUANTOS MENUES TIENEN ESE PRECIO PARA SABER SI BORRARLO O NO
if($numeroFilas==1) {
    //Logica: tiene que eliminar de la tabla de precio si el menu que voy a borrar es el unico que tiene ese precio. Por eso $numeroFilas==1
    $queryBorrarPrecio = "delete from precio where idPrecio = $idPrecio;";
    $result = mysqli_query($conn, $queryBorrarPrecio);
}
?>
