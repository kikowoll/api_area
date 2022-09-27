// const datos = {
//     accion: 'getGruposPorDia',
//     dia: 'SABADOS'
// }
$(function() {
    // $.ajax({
    //     url: 'controllers/grupos.php ',
    //     type: 'POST',
    //     dataType: 'JSON',
    //     data: {
    //         datos: JSON.stringify(datos)
    //     }
    // }).done(res =>{
    //     console.log(res);
    //     var fila = '' 
    //     $.each(res,(index,data) => {
    //         fila += '<p>'+data.grupo+' - '+data.abiertas+'</p>'
    //     })
    //     $('body').html(fila)
    // }).fail(() => {
    //     console.log('error al probar');
    // })

    var acciones,
        IDD = 0,
        direGrupos = 'controllers/grupos.php'
    if(IDD > 0) acciones = 'updateGrupo'
    else acciones = 'setGrupo' 
    console.log('IDD: ' + acciones);
    if($('#sitio').val() != '0') {
        var datos = {
                id: IDD,
                grupo: $('#grupo').val(),
                direcion: $('#direcion').val(),
                local: $('#local').val(),
                zona: $('#zona').val(),
                codpos: $('#codpos').val(),
                ciudad: $('#ciudad').val(),
                sitio: $('#sitio').val(),
                cerradas: $('#cerradas').val(),
                abiertas: $('#abiertas').val(),
                otros: $('#otros').val(),
                lm: $('#lm').val(),
                mm: $('#mm').val(),
                xm: $('#xm').val(),
                jm: $('#jm').val(),
                vm: $('#vm').val(),
                sm: $('#sm').val(),
                dm: $('#dm').val(),
                lt: $('#lt').val(),
                mt: $('#mt').val(),
                xt: $('#xt').val(),
                jt: $('#jt').val(),
                vt: $('#vt').val(),
                st: $('#st').val(),
                dt: $('#dt').val(),
                servidor1: $('#servi1').val(),
                servidor2: $('#servi2').val(),
                servidor3: $('#servi3').val(),
                lnt: $('#lnt').val(),
                lat: $('#lat').val(),
                accion: acciones
            }
        
        $.ajax({
            url: direGrupos,
            type: 'post',
            dataType: 'JSON',
            data: {datos: JSON.stringify(datos)}
        }).done(res => {
            console.log(res);
            if(res == 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Datos guardados con exito',
                    showConfirmButton: false,
                    timer: 3000
                  })
                  llenarTabla()
                setTimeout(() => {
                    volver() // ver editor
                }, 3000);
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error al guardar los datos',
                    text: 'Intentalo mas tarde.',
                    showConfirmButton: false,
                    timer: 3000
                  })
            }
        }).fail(() => {
            console.log('error al guardar los datos');
        })
    } else {
        console.log('sitio esta vacio');
    }

})