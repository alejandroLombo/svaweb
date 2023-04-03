


function ccList(){
    $.ajax({
        url: '../php/cc_sva.php',
        type: 'GET',
        success: function (respuesta) {
            
            let cc_pens = JSON.parse(respuesta);
            console.log(cc_pens);
            let fila = '';
            cc_pens.forEach(cc_pen => {
                fila += `
                     <tr id = "${cc_pen.id}">
                        <td>${cc_pen.id}</td>
                        <td>${cc_pen.fecha}</td>
                        <td>${cc_pen.codcliente}</td>
                        <td>${cc_pen.num_rem}</td>
                        <td>${cc_pen.total_rem}</td>
                        <td>${cc_pen.zona}</td>
                        <td>${cc_pen.saldo}</td>
                        <td>
                        <button class="ver-pagos btn btn-info">Ver</button>
                        <button class="cc-delete btn btn-danger">Anular</button>
                        </td>   
                    </tr> 
                    `        
            });
            
            $('#tcca').html(fila);
        }
    });
    

}

$(document).on('click','.cc-delete',function(){
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('id');
    if(confirm('Realmente decea anular la Cuenta Corriente')===true){
        $.post('../php/cc_anular.php',{id},function(respuesta){
            console.log(respuesta);
            ccList();
        })

    }
    
    
}
)
