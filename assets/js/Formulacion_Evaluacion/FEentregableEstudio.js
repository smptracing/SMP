 $(document).on("ready" ,function(){

             
              $("#txt_valoracion_entre").keyup(function(){//verificar si el entregable supera el o no el cien porciento para inavilitar el boton
                   
                   var sumaValoracion=$("#txt_valoracion_entre").val();
                  $.ajax({
                              url: base_url+"index.php/FEentregableEstudio/MostrarAvance",//MOSTRAR AVANCE EN UN CAJA DE TEXTO PARA HABILTAR O INHABILTAR
                              type:"POST",
                              data:{},
                              success: function(data){
                                var registros = eval(data); 
                               for (var i = 0; i <registros.length;i++) {
                                    sumaValoracion=parseInt(sumaValoracion)+parseInt(registros[i]["valoracion"]);
                                    
                                 };
                                 if(sumaValoracion>100){
                                    document.getElementById('btn_entregableC').disabled=true;
                                    alert("LA SUMA DE SUS ENTREGABLES SUPERA AL 100%");
                                 }else{
                                    document.getElementById('btn_entregableC').disabled=false;
                                 }

                                 
                              }
                        });
              });

              var txt_id_etapa_estudio=$("#txt_id_etapa_estudio").val();
              listarEntregablesFE();
              //para agregar entregable
                $("#btn_entregable").click(function() {
                $("#id_etapa_estudioEE").val($("#txt_id_etapa_estudio").val())
              });
                $("#form-AddEntregable").submit(function(event)//para añadir nueva funcion
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEentregableEstudio/Add_Entregable",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");
                           $('#form-AddEntregable')[0].reset();
                           $("#VentanaEntregable").modal("hide");
                           listarEntregablesFE();

                          //$('#table-SituacioFE').dataTable()._fnAjaxUpdate();
                         }
                      });
                  });
               $("body").on("click","#table_entregable tbody th a",function(event){
                  event.preventDefault();
                  identregable = $(this).attr("href");
                  $("#txt_id_entregable").val(identregable);
                  $("#calendarActividadesFE" ).remove();
                  generarCalendario(identregable);//para el calendario
                  generarActividadesVertical(identregable);//para generar calendario en vertical
                  $("#txt_identregable").val(identregable);//para la parte de buscar persona si asignar responsable
                  //entregable_estudio = $(this).parent().parent().children("th:eq(0)").text();
                  //entregable_estudio = $(this).parent().parent().children("th:eq(0)").text();
                });

               //buscar responsable

                $("#text_buscarPersona").keyup(function(){//buscar persona para actividades
                 var text_buscarPersona = $("#text_buscarPersona").val();
                 html1=" . ";
                 $("#table_responsable").html(html1);
                 $.ajax({
                    url: base_url+"index.php/Personal/BuscarPersona",
                    type:"POST",
                    data:{text_buscarPersona:text_buscarPersona},
                    success: function(data){
                      if(Object.keys(data).length>0)
                       {
                          var registros = eval(data);
                             html1+="<thead> </thead>"
                             for (var i = 0; i <registros.length;i++) {
                                  html1 +="<tbody> <tr><th> <input type='checkbox' name='vehicle' value='Bike'></th><br></th><th> <a href='"+registros[i]["id_persona"]+"' type='button' class='btn btn-link'><img src='"+base_url+"assets/images/user.png' class='avatar' ></a>Gerencia:</br> <h5>Nombre completo:</h5> "+registros[i]["nombres"]+" "+registros[i]["apellido_p"]+" "+registros[i]["apellido_m"]+"</th> <th><div class='col-md-8 col-sm-8 col-xs-8 form-group has-feedback'>Fecha Asignación<input type='date' id='txt_AsigPersonalEntregable' name='txt_AsigPersonalEntregable' class='form-control calendario'></div></th></tr>";
                                  $("#txt_idPersona").val(registros[i]["id_persona"]);
                               };
                                 html1 +="</tbody>";
                             $("#table_responsable").html(html1);
                          }
                    }
              });
        });
//buscar perona para actividad
        $("#text_buscarPersonaActividad").keyup(function(){
                 var text_buscarPersona = $("#text_buscarPersonaActividad").val();
                 html1=" . ";
                 $("#table_responsable2").html(html1);
                 $.ajax({
                    url: base_url+"index.php/Personal/BuscarPersona",
                    type:"POST",
                    data:{text_buscarPersona:text_buscarPersona},
                    success: function(data){
                      if(Object.keys(data).length>0)
                       {
                          var registros = eval(data);
                             html1+="<thead> </thead>"
                             for (var i = 0; i <registros.length;i++) {
                                  html1 +="<tbody> <tr><th> <input type='checkbox' name='vehicle' value='Bike'></th><br></th><th> <a href='"+registros[i]["id_persona"]+"' type='button' class='btn btn-link'><img src='"+base_url+"assets/images/user.png' class='avatar' ></a>Gerencia:</br> <h5>Nombre completo:</h5> "+registros[i]["nombres"]+" "+registros[i]["apellido_p"]+" "+registros[i]["apellido_m"]+"</th> <th><div class='col-md-8 col-sm-8 col-xs-8 form-group has-feedback'>Fecha Asignación<input type='date' id='txt_AsigPersonalActividad' name='txt_AsigPersonalActividad' class='form-control calendario'></div></th></tr>";
                                  $("#txt_idPersonaActividad").val(registros[i]["id_persona"]);
                               };
                                 html1 +="</tbody>";
                             $("#table_responsable2").html(html1);
                          }
                    }
              });
        });



               //Fin buscar responsable
          $("#form-AsignacionPersonalEntregable").submit(function(event)//para añadir nueva funcion
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEentregableEstudio/AsignacionPersonalEntregable",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");
                         }
                      });
                  });


});

var generarActividadesVertical=function(id_en)
          {
                    var table=$("#datatable-actividadesV").DataTable({
                     "processing":true,
                      "serverSide":false,
                      destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/FEActividadEntregable/get_Actividades",
                                    "method":"POST",
                                     data:{"id_en":id_en},
                                    "dataSrc":"",
                                    },
                                "columns":[
                                    {"data":"id","visible": false},
                                    {"data":"title"},
                                    {"data":"nombres",
                                        "mRender": function ( data, type, full ) {
                                      var i=data;
                                          if(i=='')
                                          {
                                           return '<a type="button" class="editar btn btn-link" data-toggle="modal" data-target="#VentanaAsignacionPersonalActividad" ><img src='+base_url+'assets/images/user.png> ' + data+ '</a>'
                                          }else{
                                             return '<a type="button" class="editar btn btn-link" data-toggle="modal" data-target="#VentanaAsignacionPersonalActividad" ><img src='+base_url+'assets/images/asignado.png> ' + data+ '</a>'
                                          }
                                      }

                                    },
                                    {"data":"start"},
                                    {"data":"end"},
                                    {"data":"valoracion",
                                      "mRender":function (data,type, full) {
                                         return "<td class='project_progress'><div class='progress progress_sm'><div class='progress-bar bg-orange' role='progressbar' data-transitiongoal='57' style='width: "+data+"%;'></div></div><small>"+data+" % Complete</small></td>";
                                    }},
                                    {"data":"avance",
                                      "mRender":function (data,type, full) {
                                         return "<td class='project_progress'><div class='progress progress_sm'><div class='progress-bar bg-green' role='progressbar' data-transitiongoal='57' style='width: "+data+"%;'></div></div><small>"+data+" % Complete</small></td>";
                                    }},
                                    {"defaultContent":"<button type='button' class='editar btn btn-info btn-xs' data-toggle='modal' data-target='#VentanaAsignacionPersonalActividad'><i class='ace-icon fa fa-users bigger-120'></i></button><button type='button' class='edit btn btn-primary btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-pencil'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });
              DataActividadResponsable("#datatable-actividadesV",table);//para listar y asignar responsables

  }

 var  DataActividadResponsable=function(tbody,table){
                    $(tbody).on("click","a.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_ctividad=data.id;
                         var txt_idActividadCronograma=$("#txt_idActividadCronograma").val(id_ctividad);
                         $("#txt_NombreActividadTitleResponsable").html(data.title);
                          /*$('select[name=listaFuncionCM]').val(id_funcion);//PARA AGREGAR UN COMBO PSELECIONADO
                          $('select[name=listaFuncionCM]').change();*/
                         
                    });

                }

  function listarEntregablesFE()
          {   
                var table=$("#table_entregable").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/FEentregableEstudio/get_Entregables",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_entregable","visible": false},
                                    {"data":"nombre_entregable"},
                                    {"data":"responsable",
                                    "mRender": function ( data, type, full ) {
                                      var i=data;
                                          if(i==null)
                                          {
                                           return '<a type="button" class="AsignacionPersonaEntregables btn btn-link" data-toggle="modal" data-target="#VentanaAsignacionPersonalEntregable" ><img src='+base_url+'assets/images/user.png> ' + data+ '</a>'
                                          }else{
                                             return '<a type="button" class="AsignacionPersonaEntregables btn btn-link" data-toggle="modal" data-target="#VentanaAsignacionPersonalEntregable" ><img src='+base_url+'assets/images/asignado.png> ' + data+ '</a>'
                                          }
                                      }
                                    },
                                    {"data":"valoracion",
                                      "mRender":function (data,type, full) {
                                         return "<td class='project_progress'><div class='progress progress_sm'><div class='progress-bar bg-orange' role='progressbar' data-transitiongoal='57' style='width: "+data+"%;'></div></div><small>"+data+" % Complete</small></td>";
                                    }},
                                    {"data":"avance",
                                      "mRender":function (data,type, full) {
                                         return "<td class='project_progress'><div class='progress progress_sm'><div class='progress-bar bg-green' role='progressbar' data-transitiongoal='57' style='width: "+data+"%;'></div></div><small>"+data+" % Complete</small></td>";
                                    }},
                       
                                    {"defaultContent":"<button type='button' class='actividad btn btn-warning btn-xs' data-toggle='modal' data-target='#VentanaActividades'><i class='glyphicon glyphicon-plus-sign' aria-hidden='true'></i></button><button type='button'  class='ListarActividad btn btn-info btn-xs'><i class='glyphicon glyphicon-calendar' aria-hidden='true'></i></button>"}                            

                                ],

                                "language":idioma_espanol
                    });

                     addActividades("#table_entregable",table);  
                     getActividad("#table_entregable",table);   
                     AsignacionPersonaEntregables("#table_entregable",table);             
              }

                  var AsignacionPersonaEntregables=function(tbody,table){
                           $(tbody).on("click","a.AsignacionPersonaEntregables",function(){
                              var data=table.row( $(this).parents("tr")).data();
                              $('#txt_identregable').val(data.id_entregable);
                             });
                  }

                   var  addActividades=function(tbody,table){
                             $(tbody).on("click","button.actividad",function(){
                              var data=table.row( $(this).parents("tr")).data();
                              $('#txt_id_entregable').val(data.id_entregable);
                             });
                         }
                  var  getActividad=function(tbody,table){
                             $(tbody).on("click","button.ListarActividad",function(){
                              var data=table.row( $(this).parents("tr")).data();
                              generarActividadesVertical(data.id_entregable);//listar actividades
                              $("#calendarActividadesFE" ).remove();
                              generarCalendario(data.id_entregable);//Generar calendario

                             });
                         }
          
//generar actividades en el calendar
          function generarCalendario(id_en)
          {
                  var $myNewElement = $('<div id="calendarActividadesFE"></div>');
                  $myNewElement.appendTo('#contenidoActividadesFE');

                    var initialLocaleCode = 'es';
                     $('#calendarActividadesFE').fullCalendar({
                      header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listMonth'
                      },

                     locale: initialLocaleCode,
                      //buttonIcons: false, // show the prev/next text
                      //weekNumbers: true,
                      //navLinks: true, // can click day/week names to navigate views
                      editable: true,
                      //eventLimit: true, // allow "more" link when too many events
                      events:{
                        url: base_url+"index.php/FEActividadEntregable/get_Actividades",
                        type:"POST",
                        data:{id_en:id_en},
                        error: function() {
                          $('#script-warning').show();
                        }
                      },
                      loading: function(bool) {
                        $('#loading').toggle(bool);
                      },
                      eventClick: function(event, jsEvent, view) {
                        $('#tx_IdActividad').val(event.id);
                        $('#txt_idEntregable').val(event.id_entregable);
                        $('#txt_NombreActividadTitle').html(event.title);
                        $('#txt_NombreActividadAc').val(event.title);
                        $('#txt_ActividadColorAc').val(event.color);
                        $('#txt_avanceEAct').val(event.avance);
                        $('#txt_valorizacionEAct').val(event.valoracion);
                         $('#txt_observacio_EntreAct').val(event.Observacion);


                        //fecha inicial
                        var fechaIniciar=event.start;
                        var fechaI= (new Date(fechaIniciar)).toISOString().slice(0, 10);
                        $('#txt_fechaActividadIAc').val(fechaI);
                        //fecha inical
                         //fecha final
                         //
                        var fechaFinal=event.end;
                        var fechaFinalN= (new Date(fechaFinal)).toISOString().slice(0, 10);
                        $('#txt_fechaActividadfAc').val(fechaFinalN);
                        //fecha final

                        $('#modalEventoActividades').modal();
                        if (event.url) {
                          window.open(event.url);
                          return false;
                        }

                      }

                    });
                //fin generacion de actividades
          }
