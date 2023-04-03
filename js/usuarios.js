$(document).ready(function(){
    listarUsuarios();



})


function listarUsuarios(){
    
    
    $.ajax({
        url: '../php/ver-usuarios.php',
        type: 'GET',
        success: function (respuesta) {
        let zonas = JSON.parse(respuesta);
                    console.log(zonas);
                    let fila = '';
                    zonas.forEach(cc_pen => {
                        fila += ` 
                        <tr id = "${cc_pen.id}">
                        <td>${cc_pen.id}</td>
                        <td>${cc_pen.nombre}</td>
                        <td>${cc_pen.usuario}</td>
                        <td>${cc_pen.password}</td>
                        <td>${cc_pen.id_cargo}</td>
                        <td>${cc_pen.zona}</td>
                        
                        
                        </tr>
                        `        
                            });
                    
                            $('#usuario').html(fila);
                        }
        });
                    
}