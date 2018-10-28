<?php

if($data)
{
    foreach($data as $producto)
    {
        echo $producto["id"];
        echo "<br />";
        echo $producto["unique_id"];
        echo "<br />";
        echo $producto["cantidad"];
        echo "<br />";
        echo $producto["precio"];
        echo "<br />";
        echo $producto["descripcion"];
        echo "<br />";
    }
}