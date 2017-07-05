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
//Gant
              $("#btn_gant").click(function() {
               $('#ventanagant').modal('toggle');
               $('#ventanagant').modal('show');
            // $('#ventanagant').modal('hide');

              });
              //para agregar entregable
                $("#btn_entregable").click(function() {
                $("#id_etapa_estudioEE").val($("#txt_id_etapa_estudio").val())
              });
                $("#form-AddEntregable").submit(function(event)//para entregable
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEentregableEstudio/Add_Entregable",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                          var registros = eval(resp);
                          for (var i = 0; i < registros.length; i++) {
                               if(registros[i]["VALOR"]==1){
                                    swal("",registros[i]["MENSAJE"], "success");
                                   $('#form-AddEntregable')[0].reset();
                                   $("#VentanaEntregable").modal("hide");
                                   $('#table_entregable').dataTable()._fnAjaxUpdate();
                               }else{
                                      swal('',registros[i]["MENSAJE"],'error' );
                               }
                           };
                          /* swal("",resp, "success");
                           $('#form-AddEntregable')[0].reset();
                           $("#VentanaEntregable").modal("hide");
                          // listarEntregablesFE();
                            $('#table_entregable').dataTable()._fnAjaxUpdate();*/
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
                 
                 $.ajax({
                    url: base_url+"index.php/Personal/BuscarPersona",
                    type:"POST",
                    data:{text_buscarPersona:text_buscarPersona},
                    success: function(data){
                      var registros = eval(data);
                               html1="";
                               $("#table_responsable").html(html1);
                        if(registros.length>0)
                         {
                             html1+="<thead> </thead>";
                             for (var i = 0; i <registros.length;i++) {
                                  html1 +="<tbody> <tr><th> <input type='checkbox' name='vehicle' value='Bike'></th><br></th><th> <a href='"+registros[i]["id_persona"]+"' type='button' class='btn btn-link'><img src='"+base_url+"assets/images/user.png' class='avatar' ></a>Gerencia:</br> <h5>Nombre completo:</h5> "+registros[i]["nombres"]+" "+registros[i]["apellido_p"]+" "+registros[i]["apellido_m"]+"</th> <th><div class='col-md-8 col-sm-8 col-xs-8 form-group has-feedback'></div></th></tr>";
                                  $("#txt_idPersona").val(registros[i]["id_persona"]);
                                  html1 +="</tbody>";
                                  $("#table_responsable").html(html1);
                               };
                               
                                 
                           
                          }else{
                            alert("no hay data");
                          }
                    }
              });
        });
//buscar perona para actividad
        $("#text_buscarPersonaActividad").keyup(function(){
                 var text_buscarPersona = $("#text_buscarPersonaActividad").val();
                 
                 $.ajax({
                    url: base_url+"index.php/Personal/BuscarPersona",
                    type:"POST",
                    data:{text_buscarPersona:text_buscarPersona},
                    success: function(data){
                               var registros = eval(data);
                                html1="";
                               $("#table_responsable2").html(html1);
                      if(registros.length>0)
                       {

                          var registros = eval(data);
                             html1+="<thead> </thead>"
                             for (var i = 0; i <1;i++) {
                                  html1 +="<tbody> <tr><th> <input type='checkbox'></th><br></th><th> <a href='"+registros[i]["id_persona"]+"' type='button' class='btn btn-link'><img src='"+base_url+"assets/images/user.png' class='avatar' ></a>Gerencia:</br> <h5>Nombre completo:</h5> "+registros[i]["nombres"]+" "+registros[i]["apellido_p"]+" "+registros[i]["apellido_m"]+"</th> <th><div class='col-md-8 col</th></tr>";
                                  $("#txt_idPersonaActividad").val(registros[i]["id_persona"]);
                                  html1 +="</tbody>";
                                  $("#table_responsable2").html(html1);
                               };

                                 
                        }
                        else{
                            alert("no hay data");
                          }
                    }
              });
        });



               //Fin buscar responsable
          $("#form-AsignacionPersonalEntregable").submit(function(event)//para poder añadir personal al entregable
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEentregableEstudio/AsignacionPersonalEntregable",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");
                          $('#table_entregable').dataTable()._fnAjaxUpdate();
                          //refresca gantt
                          refrescarGantt();
                            var registros = eval(resp);
                          for (var i = 0; i < registros.length; i++) {
                               if(registros[i]["VALOR"]==1){
                                   $('#table_entregable').dataTable()._fnAjaxUpdate();
                                   swal("",registros[i]["MENSAJE"], "success");
                                   $('#form-AddEntregable')[0].reset();
                                   $("#VentanaEntregable").modal("hide");
                                 
                               }else{
                                      $('#table_entregable').dataTable()._fnAjaxUpdate();
                                      swal('',registros[i]["MENSAJE"],'error' );
                               }
                           };
                             $('#table_entregable').dataTable()._fnAjaxUpdate();
                         }
                      });
                  });

          //evento para expandir un panel
          $("div.x_panel ul.panel_toolbox li a.panel-expand").click(function () {
              var panel = $(this).parent().parent().parent().parent().parent();
              //var cerrar = panel.find('.close-link');
              panel.find('.close-link').hide();
              panel.find('.panel-expand').parent().parent().append( '<li class="custom-cerrar"><a ><i class="fa fa-close"></i></a></li>' );
              //attr('class','cerrar');
              panel.css({'background' : '#0f0',
                        'position' : 'absolute',
                        'top': '0px',
                        'left': '0px',
                        'z-index': '99999',
                        'display': 'block',
                        'width': '100%',
                        'height': '100%',
                      });
              /*$('#ventanagant').find('.x_content').html('');
              $('#ventanagant').find('.x_content').html(panel.html());
              $('#ventanagant').modal('show'); */
          })
          $("ul.panel_toolbox li.custom-cerrar").click(function () {
            alert();
            //location.reload();
          });
});

//refrescar gant
var refrescarGantt=function()
{
  gantt.refreshData();
  gantt.init('gantt_here');
  gantt.load(window.location.href);
}

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
                                           return '<a type="button" class="editar btn btn-link" data-toggle="modal" data-target="#VentanaAsignacionPersonalActividad" title="Añadir Responsable" ><i class="glyphicon glyphicon-user" aria-hidden="true"></i></a><font size="1"></br>' +data+ '</font>'
                                          }else{
                                             return '<a type="button" class="editar btn btn-link" data-toggle="modal" data-target="#VentanaAsignacionPersonalActividad" title="Añadir Responsable" ><i class="glyphicon glyphicon-user" aria-hidden="true"></i></a><font size="1"></br>' +data+ '</font>'
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
                                    {"defaultContent":"<button type='button' class='edit btn btn-primary btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-pencil'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });
              DataActividadResponsable("#datatable-actividadesV",table);//para listar y asignar responsables

  }

 var  DataActividadResponsable=function(tbody,table){
                    $(tbody).on("click","a.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_ctividad=data.id;
                        //alert(id_ctividad);
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
                                    {"data":"id_entregable","visible":false},
                                    {"data":"nombre_entregable"},
                                    {"data":"responsable",
                                    "mRender": function ( data, type, full ) {
                                      var i=data;
                                          if(i==null)
                                          {
                                           return '<a  type="button" class="AsignacionPersonaEntregables btn btn-link" data-toggle="modal" data-target="#VentanaAsignacionPersonalEntregable" title="Añadir Responsable" ><i class="glyphicon glyphicon-user" aria-hidden="true"></i></a><font size="1"></br>' +data+ '</font>'
                                          }else{
                                             return '<a type="button" class="AsignacionPersonaEntregables btn btn-link" data-toggle="modal" data-target="#VentanaAsignacionPersonalEntregable" title="Añadir Responsable" ><i class="glyphicon glyphicon-user" aria-hidden="true"></i></a><font size="1"></br> '+data+ '</font>'
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
                       
                                    {"defaultContent":"<button type='button' class='actividad btn btn-warning btn-xs' title='Agregar actividad al entregable' data-toggle='modal' data-target='#VentanaActividades'><i class='glyphicon glyphicon-plus-sign' aria-hidden='true'></i></button></br><button type='button'  class='ListarActividad btn btn-info btn-xs' title='Mostar Calendario de Actividades' ><i class='glyphicon glyphicon-calendar' aria-hidden='true'></i></button></br><button type='button'  class='ListarResponsablesEntregable btn btn-primary btn-xs' data-toggle='modal' data-target='#VentenaResponsablesEntregable' title='Mostrar los responsables del entregable' ><i class='glyphicon  glyphicon-user' title='Ver Responsable' aria-hidden='true'></i></button>"}                            

                                ],

                                "language":idioma_espanol
                    });

                     addActividades("#table_entregable",table);  
                     getActividad("#table_entregable",table);   
                     AsignacionPersonaEntregables("#table_entregable",table);  
                     ListaResponsableEntregable("#table_entregable",table);           
              }

                  var AsignacionPersonaEntregables=function(tbody,table){
                           $(tbody).on("click","a.AsignacionPersonaEntregables",function(){
                              var data=table.row( $(this).parents("tr")).data();
                              $('#txt_identregable').val(data.id_entregable);
                             });
                  }
                  //listar responsables de cada entregable
                   var ListaResponsableEntregable=function(tbody,table){
                           $(tbody).on("click","button.ListarResponsablesEntregable",function(){
                                  var data=table.row( $(this).parents("tr")).data();
                                  id_entregable=data.id_entregable;
                                  $("#LabelEntregable").html(data.nombre_entregable);
                                  ListaResponsableEntregableT(id_entregable);//listar responsable de los entregables
                             });
                  }
                  //fin listar responsables de cada entregable

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
                        function ListaResponsableEntregableT(id_entregable){
                          var table=$("#table_responsableEntregable").DataTable({
                               "processing":true,
                                "serverSide":false,
                                destroy:true,

                                   "ajax":{
                                              "url":base_url+"index.php/FEentregableEstudio/get_ResponsableEntregableE",//lista de entregables
                                              "method":"POST",
                                               data:{"id_entregable":id_entregable},
                                              "dataSrc":"",
                                              },
                                          "columns":[
                                              {"data":"nombre"},
                                              {"data":"dni"},
                                              {"data":"fecha_asignacion_entregable"}   
                                          ],

                                          "language":idioma_espanol
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
