$(document).ready(function(){
    
    
    
})


$('#loadVentas').on('click',function(){

    const divCarga = document.querySelector('#cargaListas');
    if(divCarga.getAttribute("hidden")==false){
        divCarga.removeAttribute("hidden","");
        
    }else{

    divCarga.setAttribute("hidden","");

    }
    
})

 let allList = '';
$('#iListas').on('change',function(){
    var listas = $(this)[0].files[0];
    reader = new FileReader();
    reader.readAsText(listas, [JSON]);
    reader.onload = function() {
        //console.log(reader.result);
        allList = JSON.parse(reader.result);
        $('#fecha').text(allList[0]['Fecha']);
        let ventasVend = '';
        allList.forEach(listaVend =>{
            ventasVend += `
            <tr>
                <td>${listaVend.VENDNOM}</td>
                <td>$${listaVend.Lista1}</td>
                <td>$${listaVend.Lista2}</td>
                <td>$${listaVend.Lista3}</td>
                <td>$${listaVend.Lista4}</td>
                <td>$${listaVend.Lista5}</td>
                <td>$${listaVend.Lista6}</td>
                <td>$${listaVend.Lista7}</td>
                <td>$${listaVend.Lista8}</td>
                <td>$${listaVend.Total}</td>
            </tr>    
            `         
        })
        $('#tabVend').html(ventasVend);     
        const divCarga = document.querySelector('#cargaListas');
        divCarga.setAttribute("hidden","");
    };
})

let postdate ='';
$('#guardarVentas').on('click',function(){

    allList.forEach(auxiliar=>{
        
         postdate = {

            fecha: auxiliar.Fecha,
            vendedor: auxiliar.VENDNOM,
            lista1: auxiliar.Lista1,
            lista2: auxiliar.Lista2,
            lista3: auxiliar.Lista3,
            lista4: auxiliar.Lista4,
            lista5: auxiliar.Lista5,
            lista6: auxiliar.Lista6,
            lista7: auxiliar.Lista7,
            lista8: auxiliar.Lista8,
            Total: auxiliar.Total 
        } 
     
        
        $.post('../php/cargaVentas.php',postdate,function(response){
           console.log(response);
       })
    })
    console.log(postdate);


})
