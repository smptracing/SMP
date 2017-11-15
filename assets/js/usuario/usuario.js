
$(function(){
  $("body").on("click","#bt_Der",function(e){
        $('#cbb_listaMenu option:selected').each(function(){
            var seleccionado=$(this).val();
            $('#cbb_listaMenuDestino').append("<option title='"+$(this).text()+"' value='"+$(this).val()+"'>"+$(this).text()+"</option>");
            $(this).remove();
        });
  });
  $("body").on("click","#bt_Izq",function(e){
        $('#cbb_listaMenuDestino option:selected').each(function(){
            var seleccionado=$(this).val();
            $('#cbb_listaMenu').append("<option title='"+$(this).text()+"' value='"+$(this).val()+"'>"+$(this).text()+"</option>");
            $(this).remove();
        });
  });
  $("body").on("click","#bt_Der2",function(e){
        $('#cbb_listaMenu2 option:selected').each(function(){
            var seleccionado=$(this).val();
            $('#cbb_listaMenuDestino2').append("<option title='"+$(this).text()+"' value='"+$(this).val()+"'>"+$(this).text()+"</option>");
            $(this).remove();
        });
  });
  $("body").on("click","#bt_Izq2",function(e){
        $('#cbb_listaMenuDestino2 option:selected').each(function(){
            var seleccionado=$(this).val();
            $('#cbb_listaMenu2').append("<option title='"+$(this).text()+"' value='"+$(this).val()+"'>"+$(this).text()+"</option>");
            $(this).remove();
        });
  });
});
 $(document).on("ready" ,function(){
                listarUsuario();
               /* listaPersonaCombo(15);
                listatipoUsuario();
                listaMenuUsuario(15);
                listaMenu();*/


               /* $("#formUsuario").submit(function(event){
                  event.preventDefault();
                  var stringMenuUsuario ='';
                  var c=0;
                  $("#cbb_listaMenuDestino option").each(function(){
                      if(c>0)
                        stringMenuUsuario+='-';
                      stringMenuUsuario+=$(this).attr('value');
                      c++;
                  });
                  $.ajax({
                      url:$("#formUsuario").attr("action"),
                      type:$(this).attr('method'),
                      data:$(this).serialize()+"&cbb_listaMenuDestino="+stringMenuUsuario,
                      success:function(resp){
                        swal("",resp, "success");
                        $('#table-Usuarios').dataTable()._fnAjaxUpdate();
                     }
                  });
                });*/


                $("#form-AddUsuario").submit(function(event)
                {
                  event.preventDefault();
                  var stringMenuUsuario ='';
                  var c=0;
                  $("#cbb_listaMenuDestino option").each(function(){
                      if(c>0)
                        stringMenuUsuario+='-';
                      stringMenuUsuario+=$(this).attr('value');
                      c++;
                  });
                  $.ajax({
                      url:base_url+"index.php/Usuario/AddUsuario",
                      type:$(this).attr('method'),
                      data:$(this).serialize()+"&cbb_listaMenuDestino="+stringMenuUsuario,
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
                                    {"data":"usuario","visible": false},
                                    {"data":"desc_usuario_tipo"},
                                    {"data":"contrasenia","visible":false},
                                    {"data":"nombres"},
                                    /*{"defaultContent":"<button type='button'  data-toggle='tooltip'  class='editar btn btn-primary btn-xs' data-toggle='modal' onclick=paginaAjaxDialogo(null,'itemUsuario',{id_persona:15},'"+base_url+"index.php/Usuario/itemUsuario','GET',null,null,false,true);><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}*/
                                    {"data":'nombres',render: function ( data, type, row ) {
                                            return "<button type='button'  data-toggle='tooltip'  class='editar btn btn-primary btn-xs' data-toggle='modal' onclick=paginaAjaxDialogo('null','Modificar',{id_persona:"+row.id_persona+"},'"+base_url+"index.php/Usuario/itemUsuario','GET',null,null,false,true);><i class='ace-icon fa fa-pencil bigger-120'></i></button>";
                                        }
                                    }


                                ],
                                "language":idioma_espanol


                    });
                }
               var listaPersonaCombo=function(seleccionado)
                {
                    var html="";
                    $("#listaPersonaC").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Personal/ListarPersonal",
                        async:false,
                        type:"POST",
                        success:function(respuesta){
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                                if(seleccionado==registros[i]["id_persona"])
                                    html +="<option selected value="+registros[i]["id_persona"]+"> "+ registros[i]["nombres"]+" "+registros[i]["apellido_p"]+" </option>";
                                else
                                    html +="<option value="+registros[i]["id_persona"]+"> "+ registros[i]["nombres"]+" "+registros[i]["apellido_p"]+" </option>";
                            };
                            $("#comboPersona").html(html);
                            if(seleccionado=='')
                                $('select[name=comboPersona]').val(-1);
                         //   $('select[name=comboPersona]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                var listatipoUsuario=function(seleccionado){
                    var html="";
                    $("#cbb_TipoUsuario").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Usuario/ListarTipoUsuario",
                        async:false,
                        type:"POST",
                        success:function(respuesta){
                            var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                                if(seleccionado==registros[i]["id_usuario_tipo"])
                                    html +="<option selected value="+registros[i]["id_usuario_tipo"]+"> "+ registros[i]["desc_usuario_tipo"]+" </option>";
                                else
                                    html +="<option value="+registros[i]["id_usuario_tipo"]+"> "+ registros[i]["desc_usuario_tipo"]+" </option>";
                            };
                            $("#cbb_TipoUsuario").html(html);
                            if(seleccionado=='')
                                $('select[name=cbb_TipoUsuario]').val(-1);
                            $('.selectpicker').selectpicker('refresh');



                        }
                    });

                }
                 var listaMenu=function(){
                    var html="";
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Login/recuperarMenu/0",
                        async:false,
                        type:"POST",
                        success:function(respuesta){
                            var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_submenu"]+"> "+registros[i]["id_modulo"]+": "+registros[i]["nombre"]+": "+ registros[i]["nombreSubmenu"]+" </option>";
                            };
                            $("#cbb_listaMenu").html(html);
                            $('select[name=cbb_listaMenu]').val(html);
                            $('select[name=cbb_listaMenu]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });

                }
                var listaMenu2=function(){
                   var html="";
                   event.preventDefault();
                   $.ajax({
                     "url":base_url +"index.php/Login/recuperarMenu/0",
                     async:false,
                     type:"POST",
                     success:function(respuesta){
                       var registros = eval(respuesta);
                       for (var i = 0; i <registros.length;i++) {
                           html +="<li><input type='checkbox' class='tw-control' checked>"
                           html += registros[i].nombreSubmenu + " - " + registros[i].id_modulo
                           /*
                           if ( registros[i].id_modulo == 'PMI') {
                             html += "<ul><li><input type='checkbox' class='tw-control' checked> string<li></ul>";
                           }*/
                           html += "</li>";
                       };
                       $("#cbb_listaMenu2").html(html); /*
                       $('select[name=cbb_listaMenu2]').val(html);
                       $('select[name=cbb_listaMenu2]').change();
                       $('.selectpicker').selectpicker('refresh');
                       console.log(registros[0].codigo_unico_pi);*/
                     }
                   });
               }
                 var listaMenuUsuario=function(idUsuario){
                    var html="";
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Login/recuperarMenu/"+idUsuario,
                        async:false,
                        type:"POST",
                        success:function(respuesta){
                            var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_submenu"]+"> "+registros[i]["id_modulo"]+":"+registros[i]["nombre"]+": "+ registros[i]["nombreSubmenu"]+" </option>";
                            };
                            $("#cbb_listaMenuDestino").html(html);
                            $('select[name=cbb_listaMenuDestino]').val(html);
                            $('select[name=cbb_listaMenuDestino]').change();
                            $('.selectpicker').selectpicker('refresh');
                             $('#cbb_listaMenuDestino option').each(function(){
                                $("#cbb_listaMenu option[value='"+$(this).val()+"']").remove();
                            });
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
