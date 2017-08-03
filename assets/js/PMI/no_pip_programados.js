$(document).on("ready" ,function(){
     listar_aniocartera_();
});
//listar proyectos no pip
 var lista_no_pip_programados=function(anio)
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
                                { "data" : "id_pi", "visible" : false },
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
//fin de proyectos no pip
 var listar_aniocartera_=function(valor){ //listar ani cartera operacion y mantenimiento
  alert();
                     html="";
                    $("#Cbx_AnioCartera_no_pip").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/programar_pip/GetAnioCartera",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["anio"]+"> "+registros[i]["anio"]+" </option>";
                            };
                            $("#Cbx_AnioCartera_no_pip").html(html);
                            $('select[name=Cbx_AnioCartera_no_pip]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_AnioCartera_no_pip]').change();
                            $('.selectpicker').selectpicker('refresh');
                            var anio=$("#Cbx_AnioCartera_no_pip").val();
                            lista_no_pip_programados(anio);
                        }
                    });
                }
                      $("#Cbx_AnioCartera_no_pip").change(function() {
                          var anio=$("#Cbx_AnioCartera_no_pip").val();
                            lista_no_pip_programados(anio);
                            //lista_ejecucion(anio);
                           //listar carteran de proyectos
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
