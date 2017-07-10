 $(document).on("ready" ,function(){

                listarUsuario();//listar entidad
                $("#form-AddUsuario").submit(function(event)//para añadir una nueva entidad
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/Usuario/AddUsuario",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           //alert(resp);
                            swal("",resp, "success");
                           $('#table-Usuarios').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet
                         }
                      });
                  });  


			});

             /* listar y lista en tabla entidadr*/ 
                var listarUsuario=function()
                {
                    var table=$("#table-Usuarios").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/Usuario/GetUsuario",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_persona","visible": false},
                                    {"data":"nombres"},
                                    {"data":"tipo"},
                                    {"data":"usuario"},
                                    {"data":"contrasenia"},
                                  
                                ],
                                "language":idioma_espanol

                              
                    });
                  //SectorDataEntidad("#table-entidad",table);  //obtener data de entidad para actualizar   
                 // SectorDataEliminar("#table-entidad",table) ;
                }
              /*  var SectorDataEntidad=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_sector=data.id_sector;//ojo
                        var id_entidadM=$('#txt_IdModificarEntidar').val(data.id_entidad);
                        var nombre_entidadM=$('#txt_NombreEntidadM').val(data.nombre_entidad);
                        var denominacion_entidadM=$('#txt_DenominacionEntidadM').val(data.siglas_entidad);
                      $('select[name=listaSectorModificar]').val(id_sector);
                      $('select[name=listaSectorModificar]').change();

                    });
                }*/

                
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


