$(document).on("ready", function()
{
    lista_gerencias();
    /*llamar a mi datatablet listar funcion*/

    $("#form-addGerencia").submit(function (event)//para añadir nueva funcion
    {
        event.preventDefault();

        $.ajax(
        {
            url : base_url + "index.php/Gerencia/AddGerencia",
            type : $(this).attr('method'),
            data : $(this).serialize(),
            success : function (resp)
            {
                swal("", resp, "success");
            
                $('#table-Gerencia').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion

                $('#VentanaRegistraGerencia').modal('hide');
            }
        });
    });

    $("#form-ModificarGerencia").submit(function(event)//Actualizar funcion
    {
        event.preventDefault();

        $.ajax(
        {
            url : base_url + "index.php/Gerencia/UpdateGerencia",
            type : $(this).attr('method'),
            data : $(this).serialize(),
            success : function (resp)
            {
                swal("", resp, "success");
                
                $('#table-Gerencia').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

                $('#VentanaModificarGerencia').modal('hide');
            }
        });
    });
    //fin de  funcional
});

/*listra funcion*/
var lista_gerencias = function () {
    var table = $("#table-Gerencia").DataTable({
        "processing": true,
        "serverSide": false,
        destroy: true,

        "ajax": {
            "url": base_url + "index.php/Gerencia/GetGerencia",
            "method": "POST",
            "dataSrc": ""
        },
        "columns": [
            {"data": "id_gerencia","visible" : false},
            {"data": "denom_gerencia"},
            {"defaultContent": "<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarGerencia'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
        ],

        "language": idioma_espanol
    });
    GerenciaData("#table-Gerencia", table);  //obtener data de gerencia para agregar  AGREGAR
    EliminarGerencia("#table-Gerencia", table);
};

var GerenciaData = function (tbody, table) {
    $(tbody).on("click", "button.editar", function () {
        var data = table.row($(this).parents("tr")).data();
        var txt_id_gerencia_m = $('#txt_id_gerencia_m').val(data.id_gerencia);
        var txt_denom_gerencia_m = $('#txt_denom_gerencia_m').val(data.denom_gerencia);
    });
};

    var EliminarGerencia=function(tbody,table){
      $(tbody).on("click","button.eliminar",function(){
        var data=table.row($(this).parents("tr")).data();
        var id_gerencia=data.id_gerencia;
        swal({
                     title: "Desea eliminar el Registro?",
                     text: "",
                     type: "warning",
                                showCancelButton: true,
                                cancelButtonText:"Cerrar" ,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "SI,Eliminar",
                                closeOnConfirm: false          
          },
          function(){
            $.ajax({
              url:base_url+"index.php/Gerencia/EliminarGerencia",
              type:"POST",
              data:{id_gerencia:id_gerencia},
              success:function(resp){
                var registros=jQuery.parseJSON(resp);
                if(registros.flag==0)
                {
                  swal("",registros.msg,"success");
                  $('#table-Gerencia').dataTable()._fnAjaxUpdate();
                }
                else{
                  swal("",registros.msg,"error");
                  $('#table-Gerencia').dataTable()._fnAjaxUpdate();
                }
              }
            });
        });
      });
    }

/* Idioma DT*/
var idioma_espanol =
    {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    };