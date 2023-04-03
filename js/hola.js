
$('#boton').on('click',function(){

    
    let ventana=document.querySelector('#ventana');
    
    ventana.removeAttribute("hidden");


});

$('#cerrar').on('click',function(){

    
    let ventana=document.querySelector('#ventana');
    
    ventana.setAttribute("hidden","");
});







