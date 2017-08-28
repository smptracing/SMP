 $(document).on("ready" ,function(){

                //añadir actividades al entregable
                $("#btn_Addactividad" ).on( "click", function() 
                  {
                      var txt_id_entregable=$("#txt_id_entregable").val();
                      var txt_nombre_act=$("#txt_nombre_act").val();
                      var txt_fechaActividadI=$("#txt_fechaActividadI").val();
                      var txt_fechaActividadf=$("#txt_fechaActividadf").val();
                      var txt_valoracionEAc=$("#txt_valoracionEAc").val();
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEActividadEntregable/Add_Actividades",
                          type:'POST',
                          data: {txt_id_entregable:txt_id_entregable,txt_nombre_act:txt_nombre_act,txt_fechaActividadI:txt_fechaActividadI,txt_fechaActividadf:txt_fechaActividadf,txt_valoracionEAc:txt_valoracionEAc},
                          success:function(resp)
                          {
                            var txt_id_entregable=parseInt($("#txt_id_entregable").val());
                            swal("","Se registro corectamente la actividad", "success");
                            generarActividadesVertical(txt_id_entregable);
                            $('#VentanaActividades').modal('hide');
                            refrescarGantt();
                            $("#calendarActividadesFE" ).remove();
                            generarCalendario(txt_id_entregable);//Generar calendario */
                 
                            var oTable = $('#datatable-actividadesV').dataTable( );
                            // to reload
                            oTable.api().ajax.reload();
                          }
                      });
                  });
                $("#txt_valoracionEAc").keyup(function(){//verificar si el actividades supera el o no el cien porciento para inavilitar el boton
                   var sumaValoracion=$("#txt_valoracionEAc").val();
                   var  txt_id_entregable =$("#txt_id_entregable").val();
                   var 	valoracionCompletada=0;

                  $.ajax({
                              url: base_url+"index.php/FEActividadEntregable/MostrarAvance",//MOSTRAR AVANCE EN UN CAJA DE TEXTO PARA HABILTAR O INHABILTAR
                              type:"POST",
                              data:{txt_id_entregable,txt_id_entregable},
                              success: function(data)
                              {
                             
                                var registros = eval(data); 
                               for (var i = 0; i <registros.length;i++) {
     
                                    valoracionCompletada=parseInt(valoracionCompletada)+parseInt(registros[i]["valoracion"]); //suma actividad

                                 };
                                 //alert(sumaValoracion);
                                 var valoracionRestanteAsignar=100-parseInt(valoracionCompletada);//77
                                 var valoracionCompletadaTemp=parseInt(sumaValoracion);//12//77+12=89

                                 if(valoracionCompletadaTemp<=valoracionRestanteAsignar  !=0 )
                                 {
          
                                    	document.getElementById('btn_actividadC').disabled=false;
                                   		$("#IdAsignadaActividad").html("Correcto");
                                    
                                 }else
                                 {
                                 	 document.getElementById('btn_actividadC').disabled=true;
                                   	 $("#IdAsignadaActividad").html("No es posible asignar esa valoracion");
                                 }
                               }
                        });
              });
                //fin añadir actividades al entregable
                //refrescar gant
                var refrescarGantt=function()
                {
                  gantt.refreshData();
                  gantt.init('gantt_here');
                  gantt.load(window.location.href);
                }


                //Sive para calcular el avance del entregable  asocido a una actividad cuando este actualizando en el calendario
                 $("#form-UpdateActividades_Entregable").submit(function(event)
                  {
                    refrescarGantt();
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEActividadEntregable/Update_Actividades",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                          // swal("",resp, "success");  
                           $("#modalEventoActividades").modal("hide");
                           $('#table_entregable').dataTable()._fnAjaxUpdate();  
                          var tx_IdActividad=$("#tx_IdActividad").val();//catura el id de la actividadd
                          var txt_idEntregable=$("#txt_idEntregable").val();//catura eñ id del entregable
                           $("#calendarActividadesFE" ).remove();
                          CalcularAvanceAc(tx_IdActividad,txt_idEntregable);//calcular elavance de los entregables
                         
                         }
                      });
                  });
                 //fin Sive para calcular el avance del entregable  asocido a una actividad
                  $("#form-AsignacionPersonalActividad").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEActividadEntregable/AsignacionPersonalActividad",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");              
                            $('#datatable-actividadesV').dataTable()._fnAjaxUpdate();
                         }
                      });
                  });

  });
function CalcularAvanceAc(txt_NombreActividadAc,txt_idEntregable){//calcula el avance de la actividada
                    event.preventDefault(); 
                  var suma=0;
                   $.ajax({
                           "url":base_url +"index.php/FEActividadEntregable/CalcularAvanceActividad",
                            type:"POST",
                            data:{txt_NombreActividadAc:txt_NombreActividadAc,txt_idEntregable:txt_idEntregable},//sirve para seleccionar el entregable y poder sumar su avance d
                            success:function(respuesta){
                               var registros = eval(respuesta);
                              for (var i = 0; i <registros.length;i++) 
                                {
                                    suma=((registros[i]['Avance']*registros[i]['Valoracion'])/100)+suma;
                                    var id_entregable=registros[i]['id_entregable'];
                               };
                               UpdateEntregableAvance(suma,id_entregable);//para enviar el avance al entregable cuando se actualiza la actividad
                               listarEntregablesFE();

                               generarCalendario(id_entregable);
                               generarActividadesVertical(id_entregable);
                            }
                          });
}
function UpdateEntregableAvance(sumaTotalAvance,id_entregable){//avance total del entregable 
          event.preventDefault(); 
                   $.ajax({
                           "url":base_url +"index.php/FEentregableEstudio/UpdateEntregableAvance",
                            type:"POST",
                            data:{sumaTotalAvance:sumaTotalAvance,id_entregable:id_entregable},
                            success:function(respuesta){
                             get_entregableId(id_entregable);//para traer el id de etapa de estudio
                      }
              });
}
  function get_entregableId(id_entregable){//para traer la etaapa de estudio el cual pertenece mi entregable y calcular 
            event.preventDefault();
            $.ajax({
              "url":base_url+"index.php/FEentregableEstudio/get_entregableId",
              type:"POST",
              data:{id_entregable:id_entregable},
              success:function(respuesta){
                var registros = eval(respuesta);  
                         for (var i = 0; i <registros.length;i++) {
                              id_etapa_estudio=registros[i]["id_etapa_estudio"];
                           };    
                    calcular_AvaceFisico(id_etapa_estudio);                   
              }
            });
  }
   function calcular_AvaceFisico(id_etapa_estudio){
       event.preventDefault();
            $.ajax({
              "url":base_url+"index.php/FEentregableEstudio/calcular_AvaceFisico",
              type:"POST",
              data:{id_etapa_estudio:id_etapa_estudio},
              success:function(respuesta){
              	var res  ="SE ACTUALIZO EL AVANCE DEL ENTREGABLE Y SU AVANCE FÍSICO"
              	swal("",res, "success"); 
              }
            });
  }

  //refrescar los entregables 
  









               


               