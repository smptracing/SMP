$(document).on("ready" ,function(){
     lista_formulacion_evaluacion();/*llamar a mi datatablet listar proyectosinverision*/
     lista_ejecucion();
     lista_funcionamiento();
     $("#form_AddProgramacion").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/programar_pip/AddProgramacion",
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
                          $('#Table_OperacionMantenimiento').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                             formReset();
                         }
                      });
                  });
});
//listar proyectos de inversion en formulacion y evaluacion
 var lista_formulacion_evaluacion=function()
{
       var table=$("#table_formulacion_evaluacion").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/programar_pip/GetProyectosFormulacionEvaluacion",
                                    "method":"POST",
                                    "dataSrc":""                                    
                                  },
                                "columns":[
                                    {"defaultContent":"<td>#</td>"},
                                    {"data":"codigo_unico_pi"},
                                    {"data":"nombre_pi"},
                                    {"data":"costo_pi"},
                                    {"data":"nombre_estado_ciclo"},
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
                                    {"defaultContent":"<center><button type='button' title='Programar' class='programar_pip btn btn-warning btn-xs' data-toggle='modal' data-target='#Ventana_Programar'><i class='fa fa-file-powerpoint-o ' aria-hidden='true'></i></button></center>"}
                                ],
                               "language":idioma_espanol
                    });
        AddProgramacion("#table_formulacion_evaluacion",table);
}
//fin de proyectos de inversion en formulacion y evaluacion
//listar proyectos de inversion en Ejecucion
 var lista_ejecucion=function()
{
       var table=$("#table_ejecucion").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/programar_pip/GetProyectosEjecucion",
                                    "method":"POST",
                                    "dataSrc":""                                    
                                  },
                                "columns":[
                                    {"defaultContent":"<td>#</td>"},
                                    {"data":"id_pi" ,"visible": false},
                                    {"data":"codigo_unico_pi"},
                                    {"data":"nombre_pi"},
                                    {"data":"costo_pi"},
                                    {"data":"nombre_estado_ciclo"},
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
                                    {"defaultContent":"<center><button type='button' title='Programar' class='programar_pip btn btn-warning btn-xs' data-toggle='modal' data-target='#Ventana_Programar'><i class='fa fa-file-powerpoint-o ' aria-hidden='true'></i></button></center>"}
                                ],
                               "language":idioma_espanol
                    });
}
//fin de proyectos de inversion en Ejecucion
//listar proyectos de inversion en Funcionamiento
 var lista_funcionamiento=function()
{
       var table=$("#Table_funcionamiento").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/programar_pip/GetProyectosFuncionamiento",
                                    "method":"POST",
                                    "dataSrc":""                                    
                                  },
                                "columns":[
                                    {"defaultContent":"<td>#</td>"},
                                    {"data":"id_pi" ,"visible": false},
                                    {"data":"codigo_unico_pi"},
                                    {"data":"nombre_pi"},
                                    {"data":"costo_pi"},
                                    {"data":"nombre_estado_ciclo"},
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
                                    {"defaultContent":"<center><button type='button' title='Programar' class='programar_pip btn btn-warning btn-xs' data-toggle='modal' data-target='#Ventana_Programar'><i class='fa fa-file-powerpoint-o ' aria-hidden='true'></i></button></center>"}
                                ],
                               "language":idioma_espanol
                    });
      
}
//fin de proyectos de inversion en Funcionamiento

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
                            listar_Brecha();
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
