<?php
if($data)
{
    foreach($data as $producto)
    {
        echo "Producto ID: ".$producto["id"];
        echo "<br />";
        echo "Cantidad: ".$producto["cantidad"];
        echo "<br />";
        echo "Precio: ".$producto["precio"];
        echo "<br />";
        echo "Descripcion: ".$producto["descripcion"];
        echo "<br />";
    }
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "El precio total es $".$producto["cantidad"]*$producto["precio"]; 
    echo "<br />";
    echo "<a class='btn btn-danger' href='/cliente/eliminarCarrito'>Vaciar Carrito</a>"; 
}