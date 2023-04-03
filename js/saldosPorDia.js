$(document).ready(function(){
  Zonas();
    
    
})

function Zonas(){

$.ajax({
    url: '../php/ver-zonas.php',
    type: 'GET',
            success: function (respuesta) {
            
                let cc_pens = JSON.parse(respuesta);
                //console.log(cc_pens);
                let fila = '';
                cc_pens.forEach(cc_pen => {
                    fila += `
                    <option value="${cc_pen.id}">${cc_pen.zona}</option>
                            `        
                        });
                        
                        $('#zonas').html(fila);
                        
                        
                    }
                });



}

var totalSaldos= new Number;
var saldos=new Array();
$('#formSaldoFecha').submit(function(e){

    const postdate = {
        fecha: $('#fecha').val(),
        zona: $('#zonas').val()
        
            }
    //console.log(postdate);
    $.post('../php/saldosPorDia.php',postdate,function(response){
      //console.log(response)
        saldos=JSON.parse(response);

    })
    
    e.preventDefault();
    
    let fila = '';
        saldos.forEach(cc_pen => {
            fila += `
            <tr id = "${cc_pen.id}">
            <td>${cc_pen.id}</td>
            <td>${cc_pen.cliente}</td>
            <td>${cc_pen.remito}</td>
            <td>${cc_pen.saldo}</td>   
            </tr> 
                    `  
                
                
                
                
        });

        saldos.forEach(cc_pen => {
            
            let suma = (+cc_pen.saldo)
             totalSaldos= suma + totalSaldos;
           
        });
            
            
            
            
            $('#SxD').html(fila);
            $('#totalSaldos').html(totalSaldos)


})
            
