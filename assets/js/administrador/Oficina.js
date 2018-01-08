$(document).on("ready", function()
{
    lista_oficinas();

    /*llamar a mi datatablet listar funcion*/
    $("#btn_nuevoOficina").click(function()//para que cargue el como una vez echo click sino repetira datos
    {
        listaSubGerenciaCombo();//para llenar el combo de agregar
    });

    $("#form-AddOficina").submit(function(event)//para añadir nuevo division funcional
    {
        event.preventDefault();

        $.ajax(
        {
            url : base_url + "index.php/Oficina/AddOficina",
            type : $(this).attr('method'),
            data : $(this).serialize(),
            success : function(resp)
            {
                swal("", resp, "success");
                
                $('#table-Oficina').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion

                $('#VentanaRegistraOficina').modal('hide');
            }
        });
    });

    $("#form-UpdateOficina").submit(function(event)//Actualizar off
    {
        event.preventDefault();

        $.ajax(
        {
            url : base_url + "index.php/Oficina/UpdateOficina",
            type : $(this).attr('method'),
            data : $(this).serialize(),
            success : function(resp)
            {
                swal("", resp, "success");
                
                $('#table-Oficina').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

                $('#VentanaUpdateOficina').modal('hide');
            }
        });
    });
    //fin de  funcional
});

/*listra funcion*/
var lista_oficinas = function () {
    var table = $("#table-Oficina").DataTable({
        "processing": true,
        "serverSide": false,
        destroy: true,

        "ajax": {
            "url": base_url + "index.php/Oficina/GetOficina",
            "method": "POST",
            "dataSrc": ""
        },
        "columns": [
            {"data": "id_oficina", "visible" : false},
            {"data": "id_subgerencia", "visible" : false},
            {"data": "denom_oficina"},
            {"data": "denom_subgerencia"},
            {"data": "denom_gerencia"},
            {"defaultContent": "<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaUpdateOficina'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
        ],

        "language": idioma_espanol
    });
    OficinasData("#table-Oficina", table);  //obtener data de gerencia para agregar  AGREGAR
    EliminarOficina("#table-Oficina", table);
};

var listaSubGerenciaCombo = function (valor)//COMO CON LAS FUNCIONES PARA AGREGAR DIVIVISION FUNCIONAL
{
    html = "";
    $("#listaSubGerencia").html(html);
    event.preventDefault();
    $.ajax({
        "url": base_url + "index.php/SubGerencia/GetSubGerencia",
        type: "POST",
        success: function (respuesta) {
            // alert(respuesta);
            var registros = eval(respuesta);
            for (var i = 0; i < registros.length; i++) {
                html += "<option value=" + registros[i]["id_subgerencia"] + "> " + registros[i]["denom_subgerencia"] + " </option>";
            }

            $("#listaSubGerencia").html(html);//para modificar las entidades
            $("#listaSubGerenciaM").html(html);//para modificar las entidades

            $('select[name=listaSubGerenciaM]').val(valor).change();//PARA AGREGAR UN COMBO PSELECIONADO
            //$('select[name=listaGerenciaCM]').change();

            $('.selectpicker').selectpicker('refresh');
        }
    });
};

var OficinasData = function (tbody, table) {
    $(tbody).on("click", "button.editar", function () {
        var data = table.row($(this).parents("tr")).data();
        var txt_id_oficina_m = $('#txt_id_oficina_m').val(data.id_oficina);
        var txt_id_subgerencia_m = data.id_subgerencia;
        var txt_denom_oficina_m = $('#txt_denom_oficina_m').val(data.denom_oficina);
        listaSubGerenciaCombo(txt_id_subgerencia_m);
    });
};
  
var EliminarOficina=function(tbody,table){
      $(tbody).on("click","button.eliminar",function(){
        var data=table.row($(this).parents("tr")).data();
        var id_oficina=data.id_oficina;
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
              url:base_url+"index.php/Oficina/EliminarOficina",
              type:"POST",
              data:{id_oficina:id_oficina},
              success:function(resp){
                var registros=jQuery.parseJSON(resp);
                if(registros.flag==0)
                {
                  swal("",registros.msg,"success");
                  $('#table-Oficina').dataTable()._fnAjaxUpdate();
                }
                else{
                  swal("",registros.msg,"error");
                  $('#table-Oficina').dataTable()._fnAjaxUpdate();
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