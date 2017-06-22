 $(document).on("ready" ,function(){

              //listarEntregablesFE();
                $("#form-AddActividades_Entregable").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEActividadEntregable/Add_Actividades",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");
                           $('#form-AddActividades_Entregable')[0].reset();
                           $("#VentanaActividades").modal("hide"); 
                         }
                      });
                  });

                 $("#form-UpdateActividades_Entregable").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEActividadEntregable/Update_Actividades",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");
                           $("#modalEventoActividades").modal("hide");
                          var tx_IdActividad=$("#tx_IdActividad").val();

                          var txt_idEntregable=$("#txt_idEntregable").val();
                          CalcularAvanceAc(tx_IdActividad,txt_idEntregable);//calcular elavance de los entregables              

                         }
                      });
                  });

                  $("#form-AsignacionPersonalActividad").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/FEActividadEntregable/AsignacionPersonalActividad",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");              

                         }
                      });
                  });
                


    
  });

function CalcularAvanceAc(txt_NombreActividadAc,txt_idEntregable){
                    event.preventDefault(); 
                  var suma=0;
                   $.ajax({
                           "url":base_url +"index.php/FEActividadEntregable/CalcularAvanceActividad",
                            type:"POST",
                            data:{txt_NombreActividadAc:txt_NombreActividadAc,txt_idEntregable:txt_idEntregable},
                            success:function(respuesta){
                               var registros = eval(respuesta);
                              for (var i = 0; i <registros.length;i++) 
                                {
                                    suma=((registros[i]['Avance']*registros[i]['Valoracion'])/100)+suma;
                                    var id_entregable=registros[i]['id_entregable'];
                               };
                               UpdateEntregableAvance(suma,id_entregable);//para enviar el avance al entregable
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
                              alert(respuesta);
                              listarEntregablesFFA();
                              get_entregableId(id_entregable);//para traer el id de etapa de estudio
                      }
              });

}

function listarEntregablesFFA()//listar los entregables actualizado
          {
            var SumaAvance=0;
            html1="";
            event.preventDefault();
            $.ajax({
              "url":base_url+"index.php/FEentregableEstudio/get_Entregables",
              type:"POST",
              success:function(respuesta){
                var registros = eval(respuesta);  
                         html1+="<thead> <tr> <th  class='active'><h5>Entregable </h5></th> <th class='active'><h5>Responsable</h5></th><th  class='active'><h5>Valorización</h5></th> <th  class='active'><h5>Avance</h5></th><th  class='active'><h5>Actividad</h5></th></tr></thead>"
                         for (var i = 0; i <registros.length;i++) {
                              html1 +="<tbody> <tr><th>"+registros[i]["nombre_entregable"]+"</th><th> <img src='"+base_url+"assets/images/user.png' class='avatar' title='"+registros[i]["nombre_entregable"]+"'> </th><th><div class='progress progress_sm'> <div class='progress-bar bg-orange' role='progressbar' data-transitiongoal='45' style='width: "+registros[i]["valoracion"]+"%;'></div> </div> <small>"+registros[i]["valoracion"]+"% </small></th><th> <div class='progress progress_sm'> <div class='progress-bar bg-green' role='progressbar' data-transitiongoal='45' style='width: "+registros[i]["avance"]+"%;'></div> </div> <small>"+registros[i]["avance"]+"%</small></th><th> <a href='"+registros[i]["id_entregable"]+"' type='button' class='btn btn-link' data-toggle='modal' data-target='#VentanaActividades'><i class='fa fa-plus-square-o'></i></a> <a href='"+registros[i]["id_entregable"]+"' type='button' class='btn btn-link'><i class='fa fa-clock-o'></i></a></th></tr>";    
                           };               
                             html1 +="</tbody>";
                         $("#table_entregable").html(html1);


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
              alert(respuesta) ; 
              listarEntregablesFFA();            
              }
            });
  }









               


               