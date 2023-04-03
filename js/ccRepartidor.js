function listRep(){
    
    
    $.ajax({
        url: '../php/verRep.php',
        type: 'GET',
        success: function (respuesta) {
        let clientes = JSON.parse(respuesta);
                    console.log(clientes);
                    let fila = '';
                    clientes.forEach(cc_pen => {
                        fila += ` <option value="${cc_pen.zona}"> ${cc_pen.nombre}</option>`        
                            });
                    
                            $('#repartidor').html(fila);
                        }
        });
                    
}


$(document).ready(function(){
    listRep();
})