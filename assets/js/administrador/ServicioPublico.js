 $(document).on("ready" ,function()
 {

    listarServicioP();
    $("#form-addServicioAsociado").submit(function(event)
    {
        event.preventDefault();
        $('#form-addServicioAsociado').data('formValidation').validate();
        if(!($('#form-addServicioAsociado').data('formValidation').isValid()))
        {
            return;
        }
        $.ajax({
            url:base_url+"index.php/ServicioPublico/AddServicioAsociado",
            type:$(this).attr('method'),
            encoding:"UTF-8",
            data:$(this).serialize(),
            success:function(resp)
            {
                var registros = eval(resp);
                for (var i = 0; i < registros.length; i++) 
                {
                    if(registros[i]["VALOR"]==1)
                    {
                        swal("",registros[i]["MENSAJE"], "success");
                        $('#form-addServicioAsociado')[0].reset();
                        $("#VentanaRegistraServicioAsociado").modal("hide");
                    }
                    else
                    {
                        swal('',registros[i]["MENSAJE"],'error' )
                    }
                };
                $('#table-ServicioAsociado').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet
            }
        });
    });   

    $("#form-UpdateServicioAsociado").submit(function(event)//Actualizar servicio publico asociado
    {
        event.preventDefault();
        $.ajax({
            url:base_url+"index.php/ServicioPublico/UpdateServicioAsociado",
            type:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(resp)
            {
                swal("",resp, "success");
                $('#table-ServicioAsociado').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet
            }
        });
    });  
});

$(function()
{
    $('#form-addServicioAsociado').formValidation(
    {
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            textarea_servicio_publicoA:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre de Servicio Público asociado" es requerido.</b>'
                    }
                }
            }
        }
    });
});
			   
var listarServicioP=function()
{
    var table=$("#table-ServicioAsociado").DataTable({

    "processing":true,
    "serverSide":false,
    destroy:true,
    "ajax":{
        "url":base_url+"index.php/ServicioPublico/GetServicioAsociado",
        "method":"POST",
        "dataSrc":""
    },
    "columns":[
        {"data":"id_serv_pub_asoc"},
        {"data":"nombre_serv_pub_asoc"},
        {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#UpdateServicioAsociado'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
    ],
    "language":idioma_espanol
    });
    ServicioPublicoDataActualizar("#table-ServicioAsociado",table) ;
}

/*fin crear tabla dinamica servicio publico asociado*/
var ServicioPublicoDataActualizar=function(tbody,table)
{
    $(tbody).on("click","button.editar",function()
    {
        var data=table.row( $(this).parents("tr")).data();
        console.log(data);
        var id_servicio_publicoA=$('#id_servicio_publicoA').val(data.id_serv_pub_asoc);
        var textarea_servicio_publicoAA=$('#textarea_servicio_publicoAA').val(data.nombre_serv_pub_asoc);

    });
}

/*Idioma de datatablet table-sector */
var idioma_espanol=
{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": 
    {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": 
    {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
