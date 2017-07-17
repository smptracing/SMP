function paginaAjaxJSON(data, url, method, preFunction, postFunction, cache, async)
{
    var returnTemp=null;

    if((typeof preFunction)=='function')
    {
        preFunction();
    }

    $('#divModalCargaAjax').show();
    
    $.ajax(
    {
        url : url,
        type : method,
        data : data,
        cache : cache,
        async : async
    }).done(function(pagina) 
    {
        if((typeof postFunction)=='function')
        {
            postFunction(pagina);
        }
    }).fail(function()
    {
        $('#divModalCargaAjax').hide();
        
        alert('Error en la red (Transferencia de datos). Por favor reporte ésto al administrador del sistema. Pedimos disculpas y damos gracias por su comprensión.');
    });
}

function paginaAjax(idSeccion, data, url, method, preFunction, postFunction, cache, async)
{
    if((typeof preFunction)=='function')
    {
        preFunction();
    }

    $('#divModalCargaAjax').show();
    
    $.ajax(
    {
        url : url,
        type : method,
        data : data,
        cache : cache,
        async : async
    }).done(function(pagina) 
    {
        $('#divModalCargaAjax').hide();
        $('#'+idSeccion).html(pagina);

        if((typeof postFunction)=='function')
        {
            postFunction();
        }
    }).fail(function()
    {
        $('#divModalCargaAjax').hide();
        $('#'+idSeccion).html('<div class="alert alert-danger">Error en la red (Transferencia de datos). Por favor reporte ésto al administrador del sistema. Pedimos disculpas y damos gracias por su comprensión.</div>');
    });
}

function paginaAjaxDialogo(idModal, titulo, data, url, method, preFunction, postFunction, cache, async)
{
    if((typeof preFunction)=='function')
    {
        preFunction();
    }

    $('#divModalCargaAjax').show();

    var idModalTemp=(idModal!=null ? idModal : 'modalTemp');

    var htmlTempInicio='<div id="'+idModalTemp+'" class="modal fade" role="dialog" data-backdrop="static">'+
        '<div class="modal-dialog modal-lg">'+
            '<div class="modal-content">'+
                '<div class="modal-header">'+
                    '<button type="button" class="close" onclick="$(this).parent().parent().parent().parent().remove();$(\'.modal-backdrop\').remove();">&times;</button>'+
                    '<h4 class="modal-title">'+titulo+'</h4>'+
                '</div>'+
                '<div class="modal-body">';

    var htmlTempFin='</div>'+
                '<div class="modal-footer"></div>'+
            '</div>'+
        '</div>'+
    '</div>';
    
    $.ajax(
    {
        url : url,
        type : method,
        data : data,
        cache : cache,
        async : async
    }).done(function(pagina) 
    {
        $('#divModalCargaAjax').hide();

        $('body').append(htmlTempInicio+pagina+htmlTempFin);

        $('#'+idModalTemp).modal('show');

        if((typeof postFunction)=='function')
        {
            postFunction();
        }
    }).fail(function()
    {
        $('#divModalCargaAjax').hide();

        $('body').append(htmlTempInicio+'<div class="alert alert-danger">Error en la red (Transferencia de datos). Por favor reporte ésto al administrador del sistema. Pedimos disculpas y damos gracias por su comprensión.</div>'+htmlTempFin);

        $('#'+idModalTemp).modal('show');
    });
}