 
 
 
 let date = new Date();
 console.log(date);

 let fecha= date.toLocaleDateString();
 console.log(fecha);

$('#fecha').text(fecha);
$(document).ready(function(){
    ccListarCliente();
    
})

function ccListarCliente(){
    
    
    $.ajax({
        url: '../reparto/saldos_cobrados.php',
        type: 'GET',
        success: function (respuesta) {
        let clientes = JSON.parse(respuesta);
                    console.log(clientes);
                    let fila = '';
                    clientes.forEach(cc_pen => {
                        fila += `
                            <tr>
                        <td>${cc_pen.efectivo}</td>
                        <td>${cc_pen.trasferencia} </td>
                        </tr>`        
                            
                        });
                        let suma = 0;
                         clientes.forEach(cc_pen =>{
                              
                                efect = (+cc_pen.efectivo);

                                suma = suma + efect;

                        });
                        let suma2 = 0;
                         clientes.forEach(cc_pen =>{
                              
                                transf = (+cc_pen.transferencia);

                                suma2 = suma2 + transf;

                        });
                        $('#tcccob').html(fila);
                       $('#tefec').text(suma);
                       $('#ttransf').text(suma2); 
                        
                    }
                    
        });
                    
}


 