<?php
$conn = mysqli_connect("localhost","root","admin","tpweb2db");
$sql = "select * from menu";
$result = mysqli_query($conn,$sql);
while($menues = mysqli_fetch_assoc($result)) {
    echo "<div class='d-md-flex d-block flex-row align-items-center justify-content-between poke'>
    <div class='col'>
        <img src=" . $menues['idMenu'] . " alt='' width=128 height=128>
    </div>

    <div class='col'>
        <h1>" . $menues['precio'] . "</h1>
    </div>

    <div class='col'>
        <h1>" . $menues['descripcion'] . "</h1>
    </div>

    <div class='col'>
        <img src=" . $menues['foto'] . " alt='' width=64 height=64>
    </div>";
}