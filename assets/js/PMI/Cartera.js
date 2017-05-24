 /*$(document).on("ready" ,function(){
              
              listaCarteraActual(); //LLAMAR AL METODO LISTAR MODALIDAD DE EJECUCION
              

            });

//-------------- MANTENIMIENTO MODALIDAD DE EJECUCION--------------------------

/*LISTAR CARTERA ACTUAL*/
         // TRAER DATOS DE LA CARTERA ACTUAL PARA SU PROGRAMACION
            /*    var  listaCarteraActual=function()
                {
                    html="";
                    $("#cbxCartera").html(html); //nombre del selectpicker Cartera de Inversion
                    $.ajax({
                        "url":base_url +"index.php/CarteraInversion/GetCarteraInvFechAct",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_cartera"]+"> "+ registros[i]["año_apertura_cartera"]+" </option>";   
                            };
                            $("#cbxCartera").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS DE LA CARTERA ACTUAL PARA SU PROGRAMACION 
/*FIN DE LISTAR MODALIDAD EJECUCION EN UN DATATABLE*/

//-------------- FIN MANTENIMIENTO MODALIDAD DE EJECUCION----------------------

