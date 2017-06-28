 $(document).on("ready" ,function(){
              listaTipEstudioFE();

                $("#form-addTipoEstudioFE").submit(function(event)//para añadir nueva funcion
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/TipEstudioFE/AddTipoEstudioFE",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");
                          $('#table-TipEstudioFE').dataTable()._fnAjaxUpdate();

                         }
                      });
                  });
                  //alctualizar nivel de estudio
                  $("#form-UpdateTipoEstudioFE").submit(function(event)//para añadir nueva funcion
                    {
                        event.preventDefault();
                        $.ajax({
                            url:base_url+"index.php/TipEstudioFE/UpdateTipoEstudioFE",
                            type:$(this).attr('method'),
                            data:$(this).serialize(),
                            success:function(resp){
                             swal("",resp, "success");
                            $('#table-TipEstudioFE').dataTable()._fnAjaxUpdate();

                           }
                        });
                    });
                    //fin alctualizar nivel de estudio
			});
                var listaTipEstudioFE=function()
                {
                    var table=$("#table-TipEstudioFE").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/TipEstudioFE/GetTipEstudioFE",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_tipo_est","visible": false},
                                    {"data":"nombre_tipo_est"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#ventanaTipoEstudio'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });
                   FENivelEstudio("#table-TipEstudioFE",table);

                }

                var  FENivelEstudio=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                          $("#id_tipoEstudioFEModi").val(data.id_tipo_est);
                          $("#txt_tipoEstudioFEModi").val(data.nombre_tipo_est);
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
