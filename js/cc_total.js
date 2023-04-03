



function CrearTabla(){
    var table = $('#tablaSaldos').DataTable({
        language:{
            url:"https:////cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
        }
    });
    ccListar();
}

function listarSaldos(){
    
    
    $.ajax({
        url: '../php/totsaldos.php',
        type: 'GET',
        success: function (respuesta) {
        let saldosZonas = JSON.parse(respuesta);
                    
                    let tot_saldos = saldosZonas[0][0];
                    let r2_saldos = saldosZonas[0][1];
                    let onc_saldos = saldosZonas[0][2];
                    $('#saldos').text(tot_saldos);
                    $('#r2_saldos').text(r2_saldos);
                    $('#onc_saldos').text(onc_saldos);
                    
                    
                        }
        });
                    
}

function ccListarCliente(){
    
    
    $.ajax({
        url: '../php/clientes.php',
        type: 'GET',
        success: function (respuesta) {
        let clientes = JSON.parse(respuesta);
                    console.log(clientes);
                    let fila = '';
                    clientes.forEach(cc_pen => {
                        fila += ` <option value="${cc_pen.id}"> ${cc_pen.nombre}</option>`        
                            });
                    
                            $('#clientes').html(fila);
                        }
        });
                    
}


const exampleModal = document.getElementById('add-cc')
exampleModal.addEventListener('show.bs.modal', event => {
    ccListarCliente();
    //table.destroy();
    $('#add-new').submit(function(e){
        const postdate = {
            cliente: $('#clientes').val(),
            n_remito: $('#n_remito').val(),
            t_remito: $('#t_remito').val(),
            efectivo: $('#efectivo').val(),
            transf: $('#transf').val()
            
                }
        console.log(postdate);
        $.post('../php/add_cc_sva.php',postdate,function(response){
            //console.log(response);
        })
        
        e.preventDefault();
        $('#add-new').trigger('reset');
        ccListar();
    })
  
})

//ccListar();

function ccListar(){
    
    
    
    $.ajax({
        url: '../php/cc_sva.php',
        type: 'GET',
                success: function (respuesta) {
                
                    let cc_pens = JSON.parse(respuesta);
                    //console.log(cc_pens);
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
                                <button type="button" class="ver-pagos btn btn-info" data-bs-toggle="modal" data-bs-target="#ver-pagos" ><i class="bi bi-zoom-in"></i>Ver PAGOS</button>
                                <button class="cc-delete btn btn-danger"><i class="bi bi-trash"></i>Anular</button>
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
    $.post('../php/cc_anular.php',{id},function(respuesta){
                    ccListar();
                        console.log(respuesta);
                    })
                    
                    
                }
 )



$(document).on('click','.ver-pagos',function(){

    let element = $(this)[0].parentElement.parentElement;
     let id = $(element).attr('id');
                    //console.log(id);
                    //let id = "88";
        $.post('../php/ver-pagos.php',{id},function(response){
                        let cc_pago = JSON.parse(response);
                        //console.log(cc_pago);
                        
                        //console.log(response);
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
 })
         
 
 $(document).ready(function(){
    listarSaldos();
    //CrearTabla();    
    ccListar();
    
    
    
})

                
                
                
                