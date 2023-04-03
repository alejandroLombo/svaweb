function listaProv(){
    
    
    
    $.ajax({
        url: '../php/listaProv.php',
        type: 'GET',
                success: function (respuesta) {
                
                    let cc_pens = JSON.parse(respuesta);
                    //console.log(cc_pens);
                    let fila = '';
                    cc_pens.forEach(cc_pen => {
                        fila += `
                        <tr id = "${cc_pen.id}">
                                <td>${cc_pen.nombre}</td>
                                <td>${cc_pen.direccion}</td>
                                <td>${cc_pen.telefono}</td>
                                <td>${cc_pen.contacto}</td>
                                <td>${cc_pen.telContacto}</td>
                                <td>
                                <button class="cc-delete btn btn-danger"><i class="bi bi-trash"></i>Anular</button>
                                </td>   
                                </tr> 
                                `        
                            });
                            
                            $('#lProv').html(fila);
                            
                            
                        }
                    });

                    
                    
}

$(document).on('click','.cc-delete',function(){
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('id');
    $.post('../php/deleteProv.php',{id},function(respuesta){
                    listaProv();
                        console.log(respuesta);
                    })
                    
                    
                }
 )


 $('#nvoProv').submit(function(e){

    const datos = {
        nombre: $('#nombre').val(),
        direccion: $('#direccion').val(),
        telefono: $('#telefono').val(),
        contacto: $('#contacto').val(),
        telContacto: $('#telContacto').val()
    }
    console.log(datos);
     $.post('../php/addProv.php',datos,function(response){

        console.log(response);
        
    })
     
    e.preventDefault();
    listaProv();
    $('#nvoProv').trigger('reset');
    
})




$(document).ready(function(){
    listaProv();
    
})