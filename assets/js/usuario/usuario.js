 $(document).on("ready" ,function(){

                listarUsuario();
                listaPersonaCombo();
                listatipoUsuario();
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
                   
                $("#btnCerrar").on("click",function(event){ 
                   event.prevenDefault(); 
                   $('#form-AddUsuario').trigger("reset"); 
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
                                    {"data":"usuario"},
                                    {"data":"desc_usuario_tipo"},
                                    {"data":"contrasenia"},
                                    {"data":"nombres"},
                                  
                                ],
                                "language":idioma_espanol

                              
                    });
                }
               var listaPersonaCombo=function()
                {
                    var html="";
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
                var listatipoUsuario=function(){
                    var html="";
                    $("#cbb_TipoUsuario").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Usuario/ListarTipoUsuario",
                        type:"POST",
                        success:function(respuesta){
                            var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_usuario_tipo"]+"> "+ registros[i]["desc_usuario_tipo"]+" </option>";   
                            };
                            $("#cbb_TipoUsuario").html(html);
                            $('select[name=cbb_TipoUsuario]').val(html);
                            $('select[name=cbb_TipoUsuario]').change();
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


