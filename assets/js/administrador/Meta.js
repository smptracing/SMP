$(document).on("ready" ,function()
{
    lista_metas();
    $("#form_EditMetaPresupuestal").submit(function(event)
    {
        event.preventDefault();
        $.ajax({
            url:base_url+"index.php/Meta/EditarMetaPresupuestal",
            type:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(resp){
              if (resp=='1') {
                 swal("ACTUALIZADO","Se actualizó correctamente", "success");
                 formReset();
               }
                if (resp=='2') {
                 swal("NO SE ACTUALIZÓ","No se actualizó ", "error");
               }
              $('#table_metas_presupuestales').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                 formReset();
             }
        });
    });

    $("#form_AddMeta").submit(function(event)
    {
        event.preventDefault();
        $('#validarMeta').data('formValidation').validate();
        if(!($('#validarMeta').data('formValidation').isValid()))
        {
          return;
        }
        $.ajax({
            url:base_url+"index.php/Meta/AddMeta",
            type:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(resp)
            {
                resp = JSON.parse(resp);
                ((resp.proceso=='Correcto') ? swal(resp.proceso,resp.mensaje,"success") : swal(resp.proceso,resp.mensaje,"error"));
                $('#table_metas_presupuestales').dataTable()._fnAjaxUpdate();
                $('#ventana_registrar_meta').modal('hide');
                formReset();
            }
        });
    });

     function formReset()
          {
          document.getElementById("form_AddMeta").reset();   
          document.getElementById("form_EditMetaPresupuestal").reset();     
          }
});
//listar proyectos de inversion en formulacion y evaluacion
 var lista_metas=function()
{
   var table=$("#table_metas_presupuestales").DataTable({
                 "processing": true,
                  "serverSide":false,
                 destroy:true,
                     "ajax":{
                                "url":base_url+"index.php/meta/listar_meta",
                                "method":"POST",
                                "dataSrc":""                                    
                              },
                            "columns":[
                                {"defaultContent":"<td>#</td>"},
                                //{"data":"anio_meta_pres"},
                                //{"data":"numero_meta_pres"},
                                {"data":"nombre_meta_pres"},
                                {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#ventana_editar_meta_presupuestal'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>"}
                          ],
                           "language":idioma_espanol
                });
   MetaPresupuestalData("#table_metas_presupuestales",table);
   Eliminar_meta_prepuestalData("#table_metas_presupuestales",table);
}

var  MetaPresupuestalData=function(tbody,table)
{
    $(tbody).on("click","button.editar",function(){
        var data=table.row( $(this).parents("tr")).data();
        var txt_id_meta=$('#txt_id_meta').val(data.id_meta_pres);
        var txt_anio_meta_m=$('#txt_anio_meta_m').val(data.anio_meta_pres);
        var txt_correlativo_meta_m=$('#txt_correlativo_meta_m').val(data.numero_meta_pres);
        var txt_nombre_meta_m=$('#txt_nombre_meta_m').val(data.nombre_meta_pres);
     

    });
}

var Eliminar_meta_prepuestalData=function(tbody,table)
{
    $(tbody).on("click","button.eliminar",function(){
        var data=table.row( $(this).parents("tr")).data();
        var id_meta_pres=data.id_meta_pres;
         swal({
                title: "Desea eliminar la Entidad?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes,Eliminar",
                closeOnConfirm: false
              },
              function(){
                    $.ajax({
                          url:base_url+"index.php/meta/Eliminar_meta_prepuestal",
                          type:"POST",
                          data:{id_meta_pres:id_meta_pres},
                          success:function(respuesta){
                            //alert(respuesta);
                            swal("Eliminado!", "Se elimino corectamente.", "success");
                            $('#table_metas_presupuestales').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

                          }
                        });
              });
    });
}

$(function()
{
    $('#validarMeta').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            txt_anio_meta:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Año" es requerido.</b>'
                    }
                }
            },
            txt_correlativo_meta:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Correlativo Meta" es requerido.</b>'
                    }
                }
            },
            txt_nombre_meta:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
                    }
                }
            }            
        }
    });


});


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
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}

