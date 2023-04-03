listarZonas();

function listarZonas(){
    
    
    $.ajax({
        url: '../php/ver-usuarios.php',
        type: 'GET',
        success: function (respuesta) {
        let zonas = JSON.parse(respuesta);
                    console.log(zonas);
                    let fila = '';
                    zonas.forEach(cc_pen => {
                        fila += ` 
                        
                        <option value="${cc_pen.usuario}"> ${cc_pen.usuario}</option>`        
                            });
                    
                            $('#usuario').html(fila);
                        }
        });
                    
}





$('#ver-pagos').submit(function(e){

    const datos = {
        fechad: $('#fecha-d').val(),
        fechah: $('#fecha-h').val(),
        usuario: $('#usuario').val()
    }
    console.log(datos);
    $.post('../php/ver-pagos-fecha.php',datos,function(response){

        console.log(response);
        let cc_pago = JSON.parse(response);
        console.log(cc_pago);
        let fila = '';
        cc_pago.forEach(cc_pen => {
            fila += `
            <tr id = "${cc_pen.id_pago}">
            <td>${cc_pen.id_pago}</td>
            <td>${cc_pen.id_cc}</td>
            <td>${cc_pen.fecha}</td>
            <td>${cc_pen.efectivo}</td>
            <td>${cc_pen.trasferencia}</td>
            <td>${cc_pen.cobrador}</td>
            
            
            </tr> 
            `        
        });
         
        $('#ver-p').html(fila);
        
    })
    
    e.preventDefault();
    
})




/* 
$(document).on('click','#ver-pagos',function(){



    let datos={

    }




})

 */