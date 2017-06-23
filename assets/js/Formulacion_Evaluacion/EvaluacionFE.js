 $(document).on("ready" ,function(){
              ListarEvaluacionFE();
         
			});
 //LISTAR PROYECTOS QUE SE ENCUENTRARN EN EVALUACION
                var ListarEvaluacionFE=function()
                {
                    var table=$("#table-EvaluacionFE").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/EvaluacionFE/GetEvaluacionFE",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_pi","visible": false},
                                    {"data":"codigo_unico_est_inv",
                                    "mRender": function ( data, type, full ) {
                                     return '<a style="font-weight:normal;font-size:15" type="button" class="VerDetalleFormulacion btn btn-link" data-toggle="modal" data-target="#VerDetalleFormulacion" href="/codigo_unico_est_inv/' + data + '">' + data+ '</a>';
                                      }
                                    },
                                    {"data":"nombre_est_inv"},
                                    {"data":"provincia"},
                                    {"data":"distrito"},
                                    {"data":"denom_nivel_estudio"},
                                    {"data":"Evaluador"},
                                    {"data":"costo_estudio"},
                                    {"data":"denom_situacion_fe"},
                                    {"data":function (data, type, dataToSet) {
                                         return "<td class='project_progress'><div class='progress progress_sm'><div class='progress-bar bg-green' role='progressbar' data-transitiongoal='57' style='width: "+data.avance_fisico+"%;'></div></div><small>"+data.avance_fisico+" % Complete</small></td>";
                                       }}
                       
                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaDenominacionModFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });
                   // DenominacionFE("#table-DenominacionFE",table);                
                     ListarEvaluacion("#table-EvaluacionFE",table);    			   	
                }
//FIN LISTAR PROYECTOS QUE SE ENCUENTRARN EN EVALUACION
//LISTAR DETALLE DE SITUACION ACTUAL DE UNA PIP EN EVALUACION
var DetalleSitActPipEvaluacion=function(codigo_unico_est_inv)
  {
    html1="";
     $("#table-DetSitActEvaluacionFE").html(html1);
    $.ajax({
    "url":base_url+"index.php/EvaluacionFE/GetDetallesituacionActual",
    type:"post",
    data:{codigo_unico_est_inv:codigo_unico_est_inv},
     success:function(respuesta)
                      {
                         var registros = eval(respuesta);  
                          
                         html1+="<thead> <tr> <th  class='active'><h5>ID</h5></th><th  class='active'><h5>CODIGO UNICO </h5></th> <th class='active'><h5>NOMBRE DEL ESTUDIO </h5></th><th colspan='12' class='active'><h5>EVALUADOR</h5></th>  <th colspan='12' class='active'><h5>CARGO</h5></th><th colspan='12' class='active'><h5>OBSERVACIONES</h5></th><th colspan='12' class='active'><h5>FECHA</h5></th></tr></thead>"
                         for (var i = 0; i <registros.length;i++) {
                              html1 +="<tbody> <tr><th>"+registros[i]["id_est_inv"]+"</th><th>"+registros[i]["codigo_unico_est_inv"]+"</th><th>"+registros[i]["nombre_est_inv"]+"</th><th>"+registros[i]["Evaluador"]+"</th><th>"+registros[i]["desc_cargo"]+"</th><th>"+registros[i]["observacion"]+"</th><th>"+registros[i]["fecha"]+"</th></tr>";    
                          //alert(suma);
                           };               
                             html1 +="</tbody>";
                         $("#table-DetSitActEvaluacionFE").html(html1);
                             
                      }
                    });
    }
  
  //FIN LISTAR DETALLE DE SITUACION ACTUAL DE UNA PIP EN EVALUACION
          var  ListarEvaluacion=function(tbody,table){
                             $(tbody).on("click","a.VerDetalleFormulacion",function(){
                              var data=table.row( $(this).parents("tr")).data();
                               var codigo_unico_est_inv=data.codigo_unico_est_inv;
                               DetalleSitActPipEvaluacion(codigo_unico_est_inv);
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

  