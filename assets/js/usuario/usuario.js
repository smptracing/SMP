 $(document).on("ready" ,function(){

                listarUsuario();
                listaPersonaCombo();
                $("#form-AddUsuario").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/Usuario/AddUsuario",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                            swal("",resp, "success");
                           $('#table-Usuarios').dataTable()._fnAjaxUpdate();
                         }
                      });
                  });  
			});

                var listarUsuario=function()
                {
                    var table=$("#table-Usuarios").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                     "info":false,
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
                }
               var listaPersonaCombo=function()
                {
                    html="";
                    $("#listaPersonaC").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Personal/ListarPersonal",
                        type:"POST",
                        success:function(respuesta){
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_persona"]+"> "+ registros[i]["nombres"]+" "+registros[i]["apellido_p"]+" </option>";   
                            };
                            $("#comboPersona").html(html);
                            $('select[name=comboPersona]').val(html);
                            $('select[name=comboPersona]').change();
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }

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


