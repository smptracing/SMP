$(document).on("ready" ,function(){
     lista_no_pip();/*llamar a mi datatablet listar proyectosinverision*/
     $("#form_AddProgramacion").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/programar_nopip/AddProgramacion",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           //alert(resp);
                           if (resp=='1') {
                             swal("REGISTRADO","Se regristró correctamente", "success");
                             formReset();
                           }
                            if (resp=='2') {
                             swal("NO SE REGISTRÓ","NO se regristró ", "error");
                           }
                          $('#Table_Programar').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                          $('#table_NoPip').dataTable()._fnAjaxUpdate();
                             formReset();
                         }
                      });
                  });
     $("#form_AddMeta_Pi").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/programar_nopip/AddMeta_PI",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           //alert(resp);
                           if (resp=='1') {
                             swal("REGISTRADO","Se regristró correctamente", "success");
                             formReset();
                           }
                            if (resp=='2') {
                             swal("NO SE REGISTRÓ","NO se regristró ", "error");
                           }
                          $('#Table_meta_pi').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                             
                             formReset();
                         }
                      });
                  });
     function formReset()
          {
          document.getElementById("form_AddProgramacion").reset();       
          document.getElementById("form_AddMeta_Pi").reset();  
          }

});
//listar proyectos de inversion en formulacion y evaluacion
 var lista_no_pip=function()
{
       var table=$("#table_NoPip").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/programar_nopip/Get_no_pip",
                                    "method":"POST",
                                    "dataSrc":""                                    
                                  },
                                "columns":[
                                    {"defaultContent":"<td>#</td>"},
                                    {"data":"codigo_unico_pi"},
                                    {"data":"nombre_pi"},
                                    {"data":"costo_pi"},
                                    {"data":"nombre_naturaleza_inv"},
                                    {"data": function (data, type, dataToSet) {

                                      if (data.estado_programado !='0') //estap programado
                                      {
                                       // return '<a  href="#"><button type="button" class="btn btn btn-success btn-xs">Programado</button></a>';
                                       return '<h5><span class="label label-success"> Programado</span></h5>';
                                      }
                                      if (data.estado_programado =='0') //no esta progrmado
                                      {
                                        //return '<a  href="#"><button type="button" class="btn btn btn-danger btn-xs">No Programado</button></a>';
                                        return '<h5><span class="label label-danger">No Programado</span></h5>';
                                      }
                                   }},
                                    {"defaultContent":"<center><button type='button' title='Programar' class='programar_pip btn btn-warning btn-xs' data-toggle='modal' data-target='#Ventana_Programar'><i class='fa fa-file-powerpoint-o ' aria-hidden='true'></i></button><button type='button' title='Meta Presupuestal PIP' class='meta_pip btn btn-success btn-xs' data-toggle='modal' data-target='#Ventana_Meta_Presupuestal_PI'><i class='fa fa-usd' aria-hidden='true'></i></button></center>"}
                                ],
                               "language":idioma_espanol
                    });
        AddProgramacion("#table_NoPip",table);
        AddMeta_Pi("#table_NoPip",table);
}
//fin de proyectos de inversion en formulacion y evaluacion
//listar programación por cada proyecto
 var listar_programacion=function(id_pi)
                {
                    var table=$("#Table_Programar").DataTable({
                      "processing": true,
                      "serverSide":false,
                       destroy:true,
                         "ajax":{
                                     url:base_url+"index.php/programar_nopip/listar_programacion",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                    {"data":"id_pi","visible": false},
                                    {"data":"año_prog"},
                                    {"data":"monto_prog"}
                                    ],
                               "language":idioma_espanol
                    });
                }
//fin listar programación por cada proyecto
//listar meta proyecto
 var listar_meta_pi=function(id_pi)
                {
                    var table=$("#Table_meta_pi").DataTable({
                      "processing": true,
                      "serverSide":false,
                      destroy:true,
                      "ajax":{
                                     url:base_url+"index.php/programar_nopip/listar_metas_pi",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                    {"data":"id_meta_pi","visible": false},
                                    {"data":"anio"},
                                    {"data":"pia_meta_pres"},
                                    {"data":"pim_meta_pres"},
                                    {"data":"devengado_meta_pres"}
                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaupdateEstadoFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                }
//Agregar META PIP
 var  AddMeta_Pi=function(tbody,table){
                    $(tbody).on("click","button.meta_pip",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                       $("#txt_codigo_unico_pi_mp").val(data.codigo_unico_pi);
                      $("#txt_id_pip_programacion_mp").val(data.id_pi);
                      $("#txt_costo_proyecto_mp").val(data.costo_pi);
                      $("#txt_nombre_proyecto_mp").val(data.nombre_pi);
                      listar_Meta();
                       listar_meta_pi(id_pi);
                    });
                }

//add operacion y manteniemito
   var  AddProgramacion=function(tbody,table){
                    $(tbody).on("click","button.programar_pip",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                       $("#txt_codigo_unico_pi").val(data.codigo_unico_pi);
                      $("#txt_id_pip_programacion").val(data.id_pi);
                      $("#txt_costo_proyecto").val(data.costo_pi);
                      $("#txt_nombre_proyecto").val(data.nombre_pi);
                        listar_aniocartera();
                        listar_programacion(id_pi);

                    });
                }
                 var listar_aniocartera=function(valor){
                     html="";
                    $("#Cbx_AnioCartera").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/programar_pip/GetAnioCartera",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_cartera"]+"> "+registros[i]["anio"]+" </option>";
                            };
                            $("#Cbx_AnioCartera").html(html);
                            $('select[name=Cbx_AnioCartera]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_AnioCartera]').change();
                            $('.selectpicker').selectpicker('refresh');
                            listar_Brecha();//listar brecha
                        }
                    });
                }
                var listar_Brecha=function(valor){
                     html="";
                    $("#cbxBrecha").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/MantenimientoBrecha/GetBrecha",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_brecha"]+"> "+registros[i]["nombre_brecha"]+" </option>";
                            };
                            $("#cbxBrecha").html(html);
                            $('select[name=cbxBrecha]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxBrecha]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                var listar_Meta=function(valor){
                     html="";
                    $("#cbx_Meta").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Meta/listar_correlativo",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_correlativo_meta"]+"> "+registros[i]["cod_correlativo"]+" </option>";
                            };
                            $("#cbx_Meta").html(html);
                            $('select[name=cbx_Meta]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbx_Meta]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                /*para listar nombres de las metas*/
                var listar_meta_presupuestal=function(valor){
                     html="";
                    $("#cbx_meta_presupuestal").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Meta/listar_correlativo",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_correlativo_meta"]+"> "+registros[i]["cod_correlativo"]+" </option>";
                            };
                            $("#cbx_meta_presupuestal").html(html);
                            $('select[name=cbx_meta_presupuestal]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbx_meta_presupuestal]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
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
