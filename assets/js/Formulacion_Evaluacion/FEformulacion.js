 $(document).on("ready" ,function(){
              ListarFormulacion();
             
			});
 //LISTAR DENOMINACION DE FORMULACION Y EVALUACION EN TABLA
                var ListarFormulacion=function()
                {
                    var table=$("#table-formulacion").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/FEformulacion/GetFormulacion",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_pi","visible": false},
                                    {"data":"codigo_unico_est_inv",
                                    "mRender": function ( data, type, full ) {
                                     return '<a style="font-weight:normal;font-size:15" type="button" class="VerDetalleFormulacion btn btn-link" data-toggle="modal" data-target="#VerDetalleFormulacion" href="/codigo_unico_pi/' + data + '">' + data+ '</a>';
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
                                    "mRender": function ( data, type, full )
                                     {
                                     return '<button type="button" class="btn btn-default sm"><a  href="getCarteraAnio/' + data + '"><i class="fa fa-book"></i> </a></button>';
                                      }
                                    },
{"defaultContent":"<button type='button' class='Situacion btn btn-warning btn-xs' data-toggle='modal' data-target='#VentanaSituacionActual'><i class='fa fa-flag' aria-hidden='true'></i></button><button type='button'  class='AsignarPersona btn btn-info btn-xs' data-toggle='modal' data-target='#ventanaasiganarpersona'><i class='glyphicon glyphicon-user' aria-hidden='true'></i></button>"}                            
                                ],
                                "language":idioma_espanol
                    });
                   // DenominacionFE("#table-DenominacionFE",table);                
                     ListaFormulacion("#table-formulacion",table);    			   	
                }
//LISTAR DENOMINACION DE FORMULACION Y EVALUACION EN TABLA
          var  ListaFormulacion=function(tbody,table){
                             $(tbody).on("click","a.VerDetalleFormulacion",function(){
                              var data=table.row( $(this).parents("tr")).data();
                              $("#CodigoFormulacion").val(data.codigo_unico_pi);

                          });
                      }

              var  TipoInversiongiaData=function(tbody,myTable){
                    $(tbody).on("click","button.Situacion",function(){
                        var data=myTable.row( $(this).parents("tr")).data();
                        var txt_IdTipoInversionM=$('#txt_IdTipoInversionM').val(data.id_tipo_inversion);
                        var txt_NombreTipoInversionM=$('#txt_NombreTipoInversionM').val(data.nombre_tipo_inversion);
                        var txt_DescripcionTipoInversionM=$('#txt_DescripcionTipoInversionM').val(data.descripcion_tipo_inversion);
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

