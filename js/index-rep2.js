$(document).ready(function(){
    

     /*  $('#ver-clientes').select2({
        dropdownParent: $('#nuevaCtaCte')
    }); */

    

    

})


function ccListarCliente(){
    
    
    $.ajax({
        url: '../php/clientes.php',
        type: 'GET',
        success: function (respuesta) {
        let clientes = JSON.parse(respuesta);
                    //console.log(clientes);
                    let fila = '';
                    clientes.forEach(cc_pen => {
                        fila += `<option value="${cc_pen.id}"> ${cc_pen.nombre}</option>`        
                            
                        });

                        $('#ver-clientes').html(fila);
                    }
                    
        });
                    
}

//............................Iniciar Reparto.......................................

$('#ini-rep').on('click',function(){

    const postreparto = { new: '1' }
    $.post('../php/newrep.php',postreparto,function(response){
        //console.log(response);
        let id_reparto = JSON.parse(response);
        let id_rep = id_reparto[0]['id'];
        //console.log(id_reparto[0]['id']);
        //console.log(id_rep);
    })

   const button = document.querySelector('#ini-rep');
   
   const desc = document.querySelector('#desc-falt');
   desc.removeAttribute("hidden","");
   const gastos = document.querySelector('#gastos-rep');
   gastos.removeAttribute("hidden","");
   const cccte = document.querySelector('#ccte');
   cccte.removeAttribute("hidden","");
   const finrep = document.querySelector('#endrep');
   finrep.removeAttribute("hidden","");
   
   button.setAttribute("hidden","");

})

//-.-.-.-..-.-.-.-.-.-.-FiN.-.-.-.-.-..-..-.-.-.-.-.-

//.....................Descuentos y Faltantes...............................

$('#desc-falt').on('click',function(){

    const tdescuentos = document.querySelector('#tdescuentos');
    if(tdescuentos.getAttribute("hidden")==false){
        tdescuentos.removeAttribute("hidden","");
        
    }else{

    tdescuentos.setAttribute("hidden","");

    }

    


})

const exampleModalDesc = document.getElementById('add-desc')
exampleModalDesc.addEventListener('show.bs.modal', event => {
    ccListarCliente();
    $('#form-desc').submit(function(e){
        const postdate = {
            cliente: $('#clientes').val(),
            n_remito: $('#n_remito').val(),
            t_remito: $('#t_remito').val(),
            efectivo: $('#efectivo').val(),
            transf: $('#transf').val()
    
            }
            console.log(postdate);
            $.post('../php/add_cc_sva.php',postdate,function(response){
                console.log(response);
            })
        
        e.preventDefault();
        $('#form-desc').trigger('reset');
    })
    
  
})

//-.-.-.-..-.-.-.-.-.-.-FiN Descuentos y Faltantes.-.-.-.-.-..-..-.-.-.-.-.-


//.....................Cta Cte...............................

$('#ccte').on('click',function(){



    const tccte = document.querySelector('#tccte');
    if(tccte.getAttribute("hidden")==false){
        tccte.removeAttribute("hidden","");
    }else{
        tccte.setAttribute("hidden","");
    }
    
    ccListar();


})

$('#boton').on('click',function(){
    ccListarCliente();

    function matchCustom(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
          return data;
        }
        
        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
          return null;
        }
        
        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1) {
          var modifiedData = $.extend({}, data, true);
          modifiedData.text /* += ' (matched)' */;
          
          // You can return modified objects from here
          // This includes matching the `children` how you want in nested data sets
          return modifiedData;
        }
        
        // Return `null` if the term should not be displayed
        return null;
      }

      // Do this before you initialize any of your modals
        
      
      $("#ver-clientes").select2({
          
          minimumInputLength: 3,
          
        matcher: matchCustom
      });
    
    let ventana=document.querySelector('#ventana');
    
    ventana.removeAttribute("hidden");



});

$('#cerrar').on('click',function(){

    
    let ventana=document.querySelector('#ventana');
    
    ventana.setAttribute("hidden","");

    
});

$('#nuevaCtaCte').submit(function(e){
    
    const postdate = {
        cliente: $('#ver-clientes').val(),
        n_remito: $('#numRem').val(),
        t_remito: $('#totRem').val(),
        efectivo: $('#efecRem').val(),
        transf: $('#transfRem').val()

        }
        console.log(postdate);
        $.post('../php/add_cc_sva.php',postdate,function(response){
            ccListar();
            console.log(response);
        })
        
        e.preventDefault();
        $('#nuevaCtaCte').trigger('reset');
        
        
        let ventana=document.querySelector('#ventana');
        
        ventana.setAttribute("hidden","");

})



function ccListar(){
    
    
    $.ajax({
        url: '../php/cc_sva_fecha_zona.php',
        type: 'GET',
        success: function (respuesta) {
            
            let cc_pens = JSON.parse(respuesta);
            //console.log(cc_pens);
            let fila = '';
            cc_pens.forEach(cc_pen => {
                fila += `
                <tr id = "${cc_pen.id}">
                <td>${cc_pen.codcliente}</td>
                <td>${cc_pen.num_rem}</td>
                <td>${cc_pen.total_rem}</td>
                <td>${cc_pen.saldo}</td>
                <td>
                <button id="cc-delete" class="btn btn-danger"><i class="bi bi-trash"></i>Anular</button>
                </td>   
                </tr> 
                `        
            });
            
            $('#tcca').html(fila);
            
            
        }
    });
    
}

                
$(document).on('click','#cc-delete',function(){
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('id');
    $.post('../php/cc_anular.php',{id},function(respuesta){
                    ccListar();
                        console.log(respuesta);
                    })
                    
                    
                }
 )

//-.-..-.-.-.-.-.-.-.--.Fin Cta Cte.-.-.-.-.-..--..-.-.-.-..-.-.-.-.-.-.-



//..................................GASTOS......................................


$('#gastos-rep').on('click',function(){
    const tgastos = document.querySelector('#tgasrep');
    if(tgastos.getAttribute("hidden")==false){
        gastosListar();
        tgastos.removeAttribute("hidden","");

    }else{

        tgastos.setAttribute("hidden","");

    }



})

//---------------Modal----------------------

const exampleModalGastos = document.getElementById('add-gastos')
exampleModalGastos.addEventListener('show.bs.modal', event => {

    $('#form-gastos').submit(function(e){
        const postdate = {
            catgastos: $('#catgastos').val(),
            efectivo: $('#monto').val(),
            observacion: $('#observacion').val()
            
    
            }
            //console.log(postdate);
            $.post('../php/gastos.php',postdate,function(response){
              //  console.log(response);
              gastosListar()
            })
            
            e.preventDefault();
            $('#form-gastos').trigger('reset');
    })
})

//------------------Mostrar en la Tabla-------------------------
function gastosListar(){
    
    
    $.ajax({
        url: '../php/verGastosRep.php',
        type: 'GET',
                success: function (respuesta) {
                    
                    let cc_pens = JSON.parse(respuesta);
                    //console.log(cc_pens);
                    let fila = '';
                    cc_pens.forEach(cc_pen => {
                        fila += `
                        <tr id = "${cc_pen.id}">
                                <td>${cc_pen.tipo}</td>
                                <td>${cc_pen.observacion}</td>
                                <td>${cc_pen.monto}</td>
                                <td>
                                <button class="btn btn-danger" id="gDelete"><i class="bi bi-trash"></i>Eliminar</button>
                                </td>   
                                </tr> 
                                `        
                            });
                            
                            $('#ver-gastos').html(fila);
                           
                            
                        }
                    });
}

//---------------BORRAR GASTOS CARGADO-----------------
$(document).on('click','#gDelete',function(){
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('id');
    $.post('../php/gastosDelete.php',{id},function(respuesta){
        gastosListar();
        console.log(respuesta);
    })
})

//.-.-.-.-.-.-.-.-.-.-.-.-.FIN.-.-.-.--.-.--.-.-.-.-.-.-.-.--.-.