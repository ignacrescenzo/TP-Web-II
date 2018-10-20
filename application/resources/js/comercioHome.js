$(document).ready(function(){

//---Pasar Parámetros al Controlador -----

    $("#botonEliminar").click(function(){
        //window.location = "menu/eliminar";
        $.ajax({
            type:"POST",
            url: "menu/eliminar",
            data: {"id": $("#menuId").text()},
            success: window.location = "menu/eliminar"
        });
    });
});
