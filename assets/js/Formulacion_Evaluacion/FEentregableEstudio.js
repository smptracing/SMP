 $(document).on("ready" ,function(){

              listarEntregablesFE();
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
                  generarCalendario(identregable);



                  //entregable_estudio = $(this).parent().parent().children("th:eq(0)").text();
                  //entregable_estudio = $(this).parent().parent().children("th:eq(0)").text();
                });

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
                      defaultDate: '2017-05-12',
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
            
               
});

  function listarEntregablesFE()
          {
            html1="";
            event.preventDefault();
            $.ajax({
              "url":base_url+"index.php/FEentregableEstudio/get_Entregables",
              type:"POST",
              success:function(respuesta){
                var registros = eval(respuesta);  
                          
                         html1+="<thead> <tr> <th  class='active'><h5>Entregable </h5></th> <th class='active'><h5>Responsable</h5></th><th  class='active'><h5>Valorización</h5></th> <th  class='active'><h5>Avance</h5></th><th  class='active'><h5>Actividad</h5></th></tr></thead>"
                         for (var i = 0; i <registros.length;i++) {
                              html1 +="<tbody> <tr><th>"+registros[i]["nombre_entregable"]+"</th><th> <a href='"+registros[i]["id_entregable"]+"' type='button' class='btn btn-link' data-toggle='modal' data-target='#VentanaAsignacionPersonal'><img src='"+base_url+"assets/images/user.png' class='avatar' title='"+registros[i]["nombre_entregable"]+"'></a></th><th><div class='progress progress_sm'> <div class='progress-bar bg-orange' role='progressbar' data-transitiongoal='45' style='width: "+registros[i]["valoracion"]+"%;'></div> </div> <small>"+registros[i]["valoracion"]+"% </small></th><th> <div class='progress progress_sm'> <div class='progress-bar bg-green' role='progressbar' data-transitiongoal='45' style='width: "+registros[i]["avance"]+"%;'></div> </div> <small>"+registros[i]["avance"]+"%</small></th><th> <a href='"+registros[i]["id_entregable"]+"' type='button' class='btn btn-link' data-toggle='modal' data-target='#VentanaActividades'><i class='fa fa-plus-square-o'></i></a> <a href='"+registros[i]["id_entregable"]+"' type='button' class='btn btn-link'><i class='fa fa-clock-o'></i></a></th></tr>";    
                          //alert(suma);
                           };               
                             html1 +="</tbody>";
                         $("#table_entregable").html(html1);

              }
            });
          }
               


               