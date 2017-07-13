$(document).on("ready", function()
{
    lista_subgerencias();

    /*llamar a mi datatablet listar funcion*/
    $("#btn_NuevaSubGerencia").click(function()//para que cargue el como una vez echo click sino repetira datos
    {
        listaGerenciaCombo();//para llenar el combo de agregar
    });

    $("#form-AddSubGerencia").submit(function(event)//para añadir nuevo division funcional
    {
        event.preventDefault();

        $.ajax(
        {
            url : base_url + "index.php/SubGerencia/AddSubGerencia",
            type : $(this).attr('method'),
            data : $(this).serialize(),
            success : function(resp)
            {
                swal("", resp, "success");
                
                $('#table-SubGerencia').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                
                $('#VentanaRegistraSubGerencia').modal('hide');
            }
        });
    });

    $("#form-ModificarSubGerencia").submit(function(event)//Actualizar funcion
    {
        event.preventDefault();

        $.ajax(
        {
            url : base_url + "index.php/SubGerencia/UpdateSubGerencia",
            type : $(this).attr('method'),
            data : $(this).serialize(),
            success : function (resp)
            {
                swal("", resp, "success");

                $('#table-SubGerencia').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

                $('#VentanaUpdateSubGerencia').modal('hide');
            }
        });
    });
    //fin de  funcional
});

/*listra funcion*/
var lista_subgerencias = function () {
    var table = $("#table-SubGerencia").DataTable({
        "processing": true,
        "serverSide": false,
        destroy: true,

        "ajax": {
            "url": base_url + "index.php/SubGerencia/GetSubGerencia",
            "method": "POST",
            "dataSrc": ""
        },
        "columns": [
            {"data": "id_subgerencia"},
            {"data": "id_gerencia"},
            {"data": "denom_gerencia"},
            {"data": "denom_subgerencia"},
            {"defaultContent": "<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaUpdateSubGerencia'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
        ],

        "language": idioma_espanol
    });
    SubGerenciaData("#table-SubGerencia", table);  //obtener data de gerencia para agregar  AGREGAR

};

var listaGerenciaCombo = function (valor)//COMO CON LAS FUNCIONES PARA AGREGAR DIVIVISION FUNCIONAL
{
    html = "";
    $("#listaGerenciaC").html(html);
    event.preventDefault();
    $.ajax({
        "url": base_url + "index.php/Gerencia/GetGerencia",
        type: "POST",
        success: function (respuesta) {
            // alert(respuesta);
            var registros = eval(respuesta);
            for (var i = 0; i < registros.length; i++) {
                html += "<option value=" + registros[i]["id_gerencia"] + "> " + registros[i]["denom_gerencia"] + " </option>";
            }

            $("#listaGerenciaC").html(html);//para modificar las entidades
            $("#listaGerenciaCM").html(html);//para modificar las entidades

            $('select[name=listaGerenciaCM]').val(valor).change();//PARA AGREGAR UN COMBO PSELECIONADO
            //$('select[name=listaGerenciaCM]').change();

            $('.selectpicker').selectpicker('refresh');
        }
    });
};

var SubGerenciaData = function (tbody, table) {
    $(tbody).on("click", "button.editar", function () {
        var data = table.row($(this).parents("tr")).data();
        var txt_id_subgerencia_m = $('#txt_id_subgerencia_m').val(data.id_subgerencia);
        var txt_id_gerencia_m = data.id_gerencia;
        var txt_denom_subgerencia_m = $('#txt_denom_subgerencia_m').val(data.denom_subgerencia);
        listaGerenciaCombo(txt_id_gerencia_m);
    });
};

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