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

                                    {"data":"nombres"},
                                    {"data":"costo_estudio"},
                                    {"data":"denom_situacion_fe"},
                                    {"data":"avance_fisico",
                                      "mRender":function (data,type, full) {
                                         return "<td class='project_progress'><div class='progress progress_sm'><div class='progress-bar bg-green' role='progressbar' data-transitiongoal='57' style='width: "+data+"%;'></div></div><small>"+data+" % Complete</small></td>";
                                    }},

                       
                                    {"data":"id_etapa_estudio",
                                    "mRender": function ( data, type, full ) {
                                     return '<button type="button" class="btn btn-default sm"><a  href="getCarteraAnio/' + data + '"><i class="fa fa-book"></i> </a></button>';
                                      }}
                                ],

                                "language":idioma_espanol
                    });
                   // DenominacionFE("#table-DenominacionFE",table);   
                   $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.DataTable.Buttons(table, {
          buttons: [
           {
            "extend": "colvis",
            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
            "className": "btn btn-white btn-primary btn-bold",
            columns: ':not(:first):not(:last)'
            },
            {
            "extend": "copy",
            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "excel",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: false,
            message: 'This print was produced using the Print button for DataTables'
            }     
           
          ]
        } );
        table.buttons().container().appendTo( $('.tableTools-container-EvaluacionFE') );

                            
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

  