$("body").on("change","#Cbx_AnioCartera_",function(e){
  $(".lb_anio1").html(parseInt($("#Cbx_AnioCartera_").val())+1);
  $(".lb_anio2").html(parseInt($("#Cbx_AnioCartera_").val())+2);
  $(".lb_anio3").html(parseInt($("#Cbx_AnioCartera_").val())+3);
});
$("body").on("change","#Cbx_AnioCartera_Ejecucion",function(e){
  $(".lb_anio1").html(parseInt($("#Cbx_AnioCartera_Ejecucion").val())+1);
  $(".lb_anio2").html(parseInt($("#Cbx_AnioCartera_Ejecucion").val())+2);
  $(".lb_anio3").html(parseInt($("#Cbx_AnioCartera_Ejecucion").val())+3);
});
$("body").on("change","#Cbx_AnioCartera_operacion_mant",function(e){
  $(".lb_anio1").html(parseInt($("#Cbx_AnioCartera_operacion_mant").val())+1);
  $(".lb_anio2").html(parseInt($("#Cbx_AnioCartera_operacion_mant").val())+2);
  $(".lb_anio3").html(parseInt($("#Cbx_AnioCartera_operacion_mant").val())+3);
});

$(document).on("ready" ,function(){
     listar_aniocartera_();
});
//listar proyectos de inversion en formulacion y evaluacion
 var lista_programados_formulacion_evaluacion=function(anio)
{
  var str1 = "Inv_";
  var anio_1= parseInt(anio) +1; 
  var anio_2= parseInt(anio) +2; 
  var anio_3= parseInt(anio) +3; 
  var anioR1 = str1.concat(anio_1);
  var anioR2 = str1.concat(anio_2);
  var anioR3 = str1.concat(anio_3);
       var table=$("#table_formulacion_evaluacion").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    url:base_url+"index.php/PipProgramados/GetPipProgramadosFormulacionEvaluacion",
                                     type:"POST",
                                     data :{anio:anio}                             
                                  },
                                "columns":[ 
                                {"defaultContent":"<td>#</td>", "visible" : false },
                                { "data" : "codigo_unico_pi" },
                                { "data" : "nombre_estado_ciclo" },
                                { "data" : "nombre_pi" },
                                { "data" : "prioridad_prog" },
                                { "data" : "nombre_brecha" },
                                { "data" : anioR1 },
                                { "data" : anioR2 },
                                { "data" : anioR3 }
    ]
  });
}
//fin de proyectos de inversion en Ejecucion
//listar proyectos de inversion en formulacion y evaluacion
 var lista_programados_ejecucion=function(anio)
{
  var str1 = "Inv_";
  var str2= "OyM_";
  var anio_1= parseInt(anio) +1; 
  var anio_2= parseInt(anio) +2; 
  var anio_3= parseInt(anio) +3; 

  var anioR1 = str1.concat(anio_1);
  var anioR2 = str1.concat(anio_2);
  var anioR3 = str1.concat(anio_3);

  var anioOyM1 = str2.concat(anio_1);
  var anioOyM2 = str2.concat(anio_2);
  var anioOyM3 = str2.concat(anio_3);
 // alert(anioOyM1);
       var table=$("#table_ejecucion").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    url:base_url+"index.php/PipProgramados/GetPipProgramadosEjecucion",
                                     type:"POST",
                                     data :{anio:anio}  
                                                                   
                                  },
                                "columns":[ 
                                { "data" : "id_pi", "visible" : false },
                                { "data" : "codigo_unico_pi" },
                                { "data" : "nombre_estado_ciclo" },
                                { "data" : "nombre_pi" },
                                { "data" : "prioridad_prog" },
                                { "data" : "nombre_brecha" },
                                { "data" : anioR1 },
                                { "data" : anioR2 },
                                { "data" : anioR3 },
                                { "data" : anioOyM1 },
                                { "data" : anioOyM2 },
                                { "data" : anioOyM3 }
    ]
  });
}
//fin de proyectos de inversion en Ejecucion
//listar operacion y mantenimeitno
 var lista_programados_operacion_mant=function(anio)
{
  var str1 = "OpeMa_";
  var anio_1= parseInt(anio) +1; 
  var anio_2= parseInt(anio) +2; 
  var anio_3= parseInt(anio) +3; 
  var anioR1 = str1.concat(anio_1);
  var anioR2 = str1.concat(anio_2);
  var anioR3 = str1.concat(anio_3);
       var table=$("#table_operacion_mantenimiento").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    url:base_url+"index.php/PipProgramados/GetPipOperacionMantenimiento",
                                     type:"POST",
                                     data :{anio:anio}  
                                                                   
                                  },
                                "columns":[ 
                                {"defaultContent":"<td>#</td>"},
                                { "data" : "codigo_unico_pi" },
                                { "data" : "nombre_estado_ciclo" },
                                { "data" : "nombre_pi" },
                                { "data" : "prioridad_prog" },
                                { "data" : "nombre_brecha" },
                                { "data" : anioR1 },
                                { "data" : anioR2 },
                                { "data" : anioR3 }
    ]
  });
}
//fin de proyectos de operacion y mantenimiento

var listar_aniocartera_=function(valor){ //listar ani cartera operacion y mantenimiento
                     html="";
                    $("#Cbx_AnioCartera_").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/programar_pip/GetAnioCarteraProgramado",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["anio"]+"> "+registros[i]["anio"]+" </option>";
                            };
                            $("#Cbx_AnioCartera_").html(html);
                            $('select[name=Cbx_AnioCartera_]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_AnioCartera_]').change();
                            $('.selectpicker').selectpicker('refresh');
                            var anio=$("#Cbx_AnioCartera_").val();
                            lista_programados_formulacion_evaluacion(anio);
                            listar_aniocartera_Ejecucion();
                            $("#Cbx_AnioCartera_").trigger("change");
                        }
                    });
                }
                      $("#Cbx_AnioCartera_").change(function() {
                          var anio=$("#Cbx_AnioCartera_").val();
                            lista_programados_formulacion_evaluacion(anio);
                            //lista_ejecucion(anio);
                           //listar carteran de proyectos
                           $("#Aniocartera").val(anio);
                        });         
var listar_aniocartera_Ejecucion=function(valor){ //listar ani cartera operacion y mantenimiento
                     html="";
                    $("#Cbx_AnioCartera_Ejecucion").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/programar_pip/GetAnioCarteraProgramado",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["anio"]+"> "+registros[i]["anio"]+" </option>";
                            };
                            $("#Cbx_AnioCartera_Ejecucion").html(html);
                            $('select[name=Cbx_AnioCartera_Ejecucion]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_AnioCartera_Ejecucion]').change();
                            $('.selectpicker').selectpicker('refresh');
                            var anio=$("#Cbx_AnioCartera_Ejecucion").val();
                            lista_programados_ejecucion(anio);
                            listar_aniocartera_operacion_mant();
                            $("#Cbx_AnioCartera_Ejecucion").trigger("change");
                        }
                    });
                }
                 $("#Cbx_AnioCartera_Ejecucion").change(function() {
                          var anio=$("#Cbx_AnioCartera_Ejecucion").val();
                            lista_programados_ejecucion(anio);
                        }); 
var listar_aniocartera_operacion_mant=function(valor){ //listar ani cartera operacion y mantenimiento
                     html="";
                    $("#Cbx_AnioCartera_operacion_mant").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/programar_pip/GetAnioCarteraProgramado",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["anio"]+"> "+registros[i]["anio"]+" </option>";
                            };
                            $("#Cbx_AnioCartera_operacion_mant").html(html);
                            $('select[name=Cbx_AnioCartera_operacion_mant]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_AnioCartera_operacion_mant]').change();
                            $('.selectpicker').selectpicker('refresh');
                            var anio=$("#Cbx_AnioCartera_operacion_mant").val();
                            lista_programados_operacion_mant(anio);
                            $("#Cbx_AnioCartera_operacion_mant").trigger("change");
                        }
                    });
                }
                 $("#Cbx_AnioCartera_operacion_mant").change(function() {
                          var anio=$("#Cbx_AnioCartera_operacion_mant").val();
                            lista_programados_operacion_mant(anio);
                        });
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
