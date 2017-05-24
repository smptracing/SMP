 $(document).on("ready" ,function(){           
            //Inicio cargar combo unidad ejecutora
            listaMontosTemporales();
            listaProyectoIprogramadoA();//para mostrar y actualizar
                listaProyectoIprogramado();/*llamar proyecto de inversion programado*/

             $("#btn-siguiente").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                    listaCarteraInversionFechaActual();//para llenar el combo de agregar division funcional  
                    listaUltimoProyectoInversion();
                    listaBrechaProgramar();//Se lista la brecha para su programcion
                    });
              //AGREGAR UNA NUEVA BRECHA
                $("#form-addProgramacion").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/Programacion/AddProgramacion",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                        swal("REGISTRADO!", resp, "success");
                          //$('#table-brecha').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                }); 
                //Actualizar programacion
                $("#form-ActualizarProgramacion").submit(function(event)
                    {
                    
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/Programacion/UpdateProgramacion",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         swal("ACTUALIZO!", resp, "success");
                         $('#table-modificarprogramacion').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                       });
                    });     
                //FIN ACTUALIZAR PROGRAMACION   
             // TRAER DATOS DE LA CARTERA ACTUAL PARA SU PROGRAMACION
                var  listaCarteraInversionFechaActual=function()
                {
                    $.ajax({
                        "url":base_url +"index.php/CarteraInversion/GetCarteraInvFechAct",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              id_cartera=registros[i]["id_cartera"];
                              fechaActual=registros[i]["AnioActual"];
                              $("#textidCartera").val(id_cartera);
                             $("#txtCartera").val(fechaActual);
                              
                            };
                        }
                    });
                }
                //GUARDAR LOS MONTOS PROGRAMADOS EN UNA TABLA TEMPORAL
                $("#btn-GuardarMontoProgramado").click(function()
                {
                   var AnioProgramado=$("#AnioProgramado").val();
                   var txt_MontoProgramado=$("#txt_MontoProgramado").val();
                   var monto_opera_mant_prog='';
                   event.preventDefault(); 
                   $.ajax({
                           "url":base_url +"index.php/Programacion/AddProgramacionTemp",
                            type:"POST",
                            data:{AnioProgramado:AnioProgramado,txt_MontoProgramado:txt_MontoProgramado,monto_opera_mant_prog:monto_opera_mant_prog},
                            success:function(respuesta){
                              alert(respuesta);     
                            }
                          });
                  $('#table-Programacion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                });
          //FIN GUARDAR LOS MONTOS PROGRAMADOS EN UNA TABLA TEMPORAL 

             //GUARDAR LOS MONTOS PROGRAMADOS DE OPERACION Y MANTENIMIENTO EN UNA TABLA TEMPORAL
                $("#btn-GuardarMontoOperaMant").click(function()
                {
                   var AnioProgramadoOpeMant=$("#AnioProgramadoOpeMant").val();
                   var txt_MontoProgramado='';
                   var txt_MontoOperacionMante=$("#txt_MontoOperacionMante").val();
                  
                   event.preventDefault(); 
                   $.ajax({
                           "url":base_url +"index.php/Programacion/AddProgramacionOperMantTemp",
                            type:"POST",
                            data:{AnioProgramadoOpeMant:AnioProgramadoOpeMant,txt_MontoProgramado:txt_MontoProgramado,txt_MontoOperacionMante:txt_MontoOperacionMante},
                            success:function(respuesta){
                              alert(respuesta);     
                            }
                          });
                  $('#table-Programacion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                });
          //FIN GUARDAR LOS MONTOS PROGRAMADOS DE OPERACION Y MANTENIMIENTO EN UNA TABLA TEMPORAL    
          // TRAER DATOS DEL ULTIMO PROYECTO DE INVERSION PARA SU PROGRAMACION
                var  listaUltimoProyectoInversion=function()
                {
                    $.ajax({
                        "url":base_url +"index.php/ProyectoInversion/GetProyectoInversionUltimo",
                        type:"POST",
                        success:function(respuesta){
                          // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              UltimoProyecto=registros[i]["nombre_pi"];
                              idpip=registros[i]["id_pi"];
                             $("#txtProyectoInversUlt").val(UltimoProyecto);
                             $("#textidpip").val(idpip);
                            };

                        }
                    });
                }
          //FIN TRAER DATOS DEL ULTIMO PROYECTO DE INVERSION PARA SU PROGRAMACION   */
			   //TRAER DATOS EN UN COMBO DE NATURALEZA DE INVERSION
           var listaBrechaProgramar=function()
                {
                    html="";
                    $("#cbxBrechaP").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/MantenimientoBrecha/GetBrecha",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_brecha"]+"> "+ registros[i]["nombre_brecha"]+" </option>";   
                            };
                            $("#cbxBrechaP").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATO

           $("#cbxEstadoCicloInv").change(function(){//para cargar en agregar division funcionañ
                    var opcion=$("#cbxEstadoCicloInv").val();
                    if(opcion<=5)
                    {
                      document.getElementById("btn-ProgramarOperacMante").disabled=true;
                      document.getElementById("btn-ProgramarMontos").disabled=false;

                    }
                    else
                    {
                       document.getElementById("btn-ProgramarOperacMante").disabled=false;
                       document.getElementById("btn-ProgramarMontos").disabled=true;

                    }
             });

           //AÑADIR 
 });


  var listaMontosTemporales=function()
  {
    var table=$("#table-Programacion").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/Programacion/GetMontosTemporales",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"monto_prog"},
                                    {"data":"año_prog"},
                                    {"data":"monto_opera_mant_prog"},
                                ],

                                "language":idioma_espanol
                    });
  }


 var listaProyectoIprogramado=function()
                {
                    var table=$("#table-ProyectoInversionProgramado").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/Programacion/GetProgramacion",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_pi"},
                                    {"data":"nombre_pi"},
                                    {"data":"codigo_unico_pi"},
                                    {"data":"costo_pi"},
                                    {"data":"devengado_ac_pi"},
                                    {"data":"fecha_registro_pi"},
                                    {"data":"fecha_viabilidad_pi"},
                                    {"data":"2018-01-01"},
                                    {"data":"2019-01-01"},
                                    {"data":"2020-01-01"},
                                    {"data":"nombre_tipo_inversion","visible":false},
                                    {"data":"nombre_tipologia_inv","visible":false},
                                    {"data":"nombre_naturaleza_inv","visible":false},
                                    {"data":"nombre_nivel_gob","visible":false},
                                    {"data":"prioridad_prog","visible":false},
                                    {"data":"nombre_ue","visible":false},
                                    {"data":"departamento","visible":false},
                                    {"data":"provincia","visible":false},
                                    {"data":"distrito","visible":false},
                                    {"data":"nombre_funcion","visible":false},
                                    {"data":"nombre_div_funcional","visible":false},
                                    {"data":"nombre_grup_funcional","visible":false},
                                    {"data":"devengado_ac_pi","visible":false},//QUE ES PIN AÑO ACTUAL PREGUNTAR
                                    {"data":"nombre_fuente_finan","visible":false},
                                    {"data":"nombre_rubro","visible":false},
                                    {"data":"nombre_fuente_finan","visible":false},//ACA VA FUENTE FINAN DOS Y ES CAMPO VACIO
                                    {"data":"nombre_rubro","visible":false},//ACA ES RUBRO 2 
                                    {"data":"nombre_modalidad_ejec","visible":false},
                                    {"data":"nombre_serv_pub_asoc","visible":false},
                                    {"data":"nombre_brecha","visible":false},
                                    {"data":"nombre_programa_pres","visible":false},

                                    {"data":"nombre_sector","visible":false},
                                    {"data":"nombre_entidad","visible":false},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#ModificarProgramacion'><i class='ace-icon fa fa-pencil  bigger-120'></i></button><button type='button' class='VerProyecto btn btn-success btn-xs' data-toggle='modal' data-target='#VerDetalleProyectoInversion'><i class='ace-icon fa fa-eye bigger-120'></i></button>"}
                                ],

                                "language":idioma_espanol
                    }); 

                     
                     ListaProyectoInversionData("#table-ProyectoInversionProgramado",table);  //obtener data de funcion para agregar  AGREGAR    

                      $('a.toggle-visVer').on( 'click', function (e) 
                        {
                                e.preventDefault();
                                var column =table.column( $(this).attr('data-column'));
                                console.log(column);
                                column.visible(!column.visible() );
                                for (var i =10; i <= 32; i++) {
                                  table.column(i).visible( true );
                                }
                              

                         } );
                      $('a.toggle-visRestablecer').on( 'click', function (e) 
                        {
                                e.preventDefault();
                                var column =table.column( $(this).attr('data-column'));
                                console.log(column);
                                column.visible(!column.visible() );
                               for (var i =10; i <= 32; i++) {
                                  table.column(i).visible( false );
                                }
                         } );

                      

                         
                }
var listaProyectoIprogramadoA=function()//para actualizar programacion
                {
                    var table=$("#table-modificarprogramacion").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/Programacion/GetProgramacionModificar",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_prog"},
                                    {"data":"id_cartera","visible":false},
                                    {"data":"año_apertura_cartera"},
                                    {"data":"id_brecha","visible":false},
                                    {"data":"nombre_brecha"},
                                    {"data":"id_pi","visible":false},
                                    {"data":"nombre_pi"},
                                    {"data":"monto_prog"},
                                    {"data":"año_prog"},
                                    {"data":"prioridad_prog"},
                                    {"data":"monto_opera_mant_prog"},
                                    {"data":"tipo_prog"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#ModificarProgramacion'><i class='ace-icon fa fa-pencil  bigger-120'></i></button><button type='button' class='VerProyecto btn btn-success btn-xs' data-toggle='modal' data-target='#VerDetalleProyectoInversion'><i class='ace-icon fa fa-eye bigger-120'></i></button>"}
                                ],

                                "language":idioma_espanol
                    }); 
               ActualizarProgramacionInversionData("#table-modificarprogramacion",table);  //ACTUALIZAR PROGRAMACION     
                

                
                }
                         
        /*fin listar proyecto de inversion  programado*/
                      var  ActualizarProgramacionInversionData=function(tbody,table){
                             $(tbody).on("click","button.editar",function(){
                              var data=table.row( $(this).parents("tr")).data();
                              var id_prog=$('#texIdeProyecto').val(data.id_prog);

                              var monto_prog=$('#txtMontoProgramado').val(data.monto_prog);
                              var AnioProgramado=$('#txtañoProgramado').val(data.año_prog);
                              var prioridad_prog=$('#txtPrioridad').val(data.prioridad_prog);
                              var monto_opera_mant_prog=$('#txtOperacioMantenimiento').val(data.monto_opera_mant_prog);
                              var tipo_prog=$('#txtTipoProgramacion').val(data.tipo_prog);

                              var año_apertura_cartera=data.año_apertura_cartera;
                              var id_brecha=data.id_brecha;
                             // console.log(data);
                             $("#txtCarteraM").val(año_apertura_cartera);
                          });
                      }

                /*fin listar proyecto de inversion  programado*/
                var ListaProyectoInversionData=function(tbody,table){
                       $(tbody).on("click","button.VerProyecto",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var Id_ProyectoInver=data.id_pi;
                        //para ver yodo envio opcion 1
                         var opcion=2;//para que me muestre todos los registros 
                        MostrarDetalleProyecto(Id_ProyectoInver,opcion);
                        /*var txt_codigofuncionM=$('#txt_codigofuncionM').val(data.codigo_funcion);
                        var txt_nombrefuncionM=$('#txt_nombrefuncionM').val(data.nombre_funcion);*/

                    });
                }
                var MostrarDetalleProyecto=function(Id_ProyectoInver,opcion){
                    event.preventDefault(); 
                    html="";
                    $("table-detalleProyectoInversion").html(html);
                    html1="";
                    $("table-detalleProyectoInversion").html(html1);
                    $.ajax({
                        "url":base_url +"index.php/Programacion/BuscarProyectoInversion",
                        type:"POST",
                        data:{Id_ProyectoInver:Id_ProyectoInver,opcion:opcion},
                        success:function(respuesta){
                            //alert(respuesta);
                         var registros = eval(respuesta);

                            html+="<thead> <tr> <th colspan='12' class='active'><h5>DATOS DEL PROYECTOS DE INVERSIÓN</h5></th>  </tr></thead>"
                            for (var i = 0; i <1;i++) {
                              $("#CodigoProgramacion").val(registros[i]['id_pi']); 
                              html +="<tbody> <tr><th class='success'>Nombre del proyeto </th><th  colspan='12'>"+registros[i]["nombre_pi"]+"</th></tr> <tr><th class='success'>Código único</th><th  colspan='5'>"+registros[i]["codigo_unico_pi"]+"</th></tr>";    
                              html +="<tr><th class='success'>Fecha de registro</th><th  colspan='5'>"+registros[i]["fecha_registro_pi"]+"</th></tr> <tr><th class='success'>Fecha de viabilidad</th><th  colspan='5'>"+registros[i]["fecha_viabilidad_pi"]+"</th></tr>";
                              
                              //localizacion geografica
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>LOCALIZACIOÓN GEOGRAFICA DEL PROYECTO DE INVERSIÓN</h5></th>  </tr></thead>";
                              html+="<thead> <tr> <th colspan='4' class='active'><h5>DEPARTAMENTO</h5></th> <th colspan='4' class='active'><h5>PROVINCIA</h5></th><th colspan='4' class='active'><h5>DISTRITO</h5></th> </tr></thead>";

                              html +="<tr>";
                              html +="<th th  colspan='4'> "+registros[i]["departamento"]+"</th><th  colspan='4'>"+registros[i]["provincia"]+"</th><th  colspan='4'>"+registros[i]["distrito"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN localizacon geografica
                              //RESPONSABILIDAD FUNCIONAL
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>RESPONSABILIDAD FUNCIONAL DEL PROGRAMA DE INVERSIÓN</h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Función</th><th  colspan='5'>"+registros[i]["codigo_funcion"]+":"+registros[i]["nombre_funcion"]+"</th></tr> <tr>";
                              html +="<th class='success'>Division Funcional</th><th colspan='5'>"+registros[i]["codigo_div_funcional"]+"</th></tr> <tr>";
                              html +="<th class='success'>Grupo Funcional</th><th colspan='5'>"+registros[i]["codigo_grup_funcional"]+":"+registros[i]["nombre_grup_funcional"]+"</th></tr> <tr>";
                              html +="<th class='success'>Sector</th><th colspan='5'>"+registros[i]["nombre_sector"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN RESPONSABILIDAD FUNCIONAL
                              //META PRESUPUESTAL
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>META PRESUPUESTAL<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre meta presupuestal</th><th  colspan='5'>"+registros[i]["nombre_meta_pres"]+"</th></tr> <tr>";
                              html +="<th class='success'>Año meta presupuestal</th><th colspan='5'>"+registros[i]["año_meta_pres"]+"</th></tr> <tr>";
                              html +="<th class='success'>PIM </th><th colspan='5'>"+registros[i]["pim_meta_pres"]+"</th></tr> <tr>";
                              html +="<th class='success'>N° Meta </th><th colspan='5'>"+registros[i]["numero_meta_pres"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN RESPONSABILIDAD FUNCIONAL
                               //UNIDAD EJECUTORA
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>UNIDAD EJECUTORA<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre Unidad ejecutora</th><th  colspan='5'>"+registros[i]["nombre_ue"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN UNIDAD EJECUTORA
                              //TIPO DE INVERSIÓN
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>TIPO DE INVERSIÓN<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre tipo inversion</th><th  colspan='5'>"+registros[i]["nombre_tipo_inversion"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN TIPO DE INVERSIÓN
                              //TIPO DE INVERSIÓN
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>NIVEL  DE GOBIERNO<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nivel de Gobierno</th><th  colspan='5'>"+registros[i]["nombre_nivel_gob"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN TIPO DE INVERSIÓN

                              //MODALIDAD DE EJECUCION
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>MODALIDAD DE EJECUCIÓN<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Modalidad Ejecucion</th><th  colspan='5'>"+registros[i]["nombre_modalidad_ejec"]+"</th></tr> <tr>";
                              html +="<th class='success'>Fecha</th><th  colspan='5'>"+registros[i]["fecha_modalidad_ejec_pi"]+"</th></tr> <tr>";

                              html +="</tr>";  
                              //MODALIDAD DE EJECUCION
                              //FUENTE DE FINANCIAMIENTO
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>FUENTE DE FINANCIAMIENTO<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre fuente de financiamiento</th><th  colspan='5'>"+registros[i]["nombre_fuente_finan"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //MODALIDAD DE EJECUCION


                              html+="<thead> <tr> <th class='active' colspan='12'>NATURALEZA DE INVERSIÓN</th>   </tr></thead>";
                              html +="<tr><th class='success'>Naturaleza de Inversion</th><th  colspan='5'>"+registros[i]["nombre_naturaleza_inv"]+"</th></tr> <tr></tr>";  

                              html +="</tbody>";
                            };    
                            $("#table-detalleProyectoInversion").html(html);

                            /*programacion*/
                            

                             for (var i = 0; i <registros.length;i++) {

                              
                              //PROGRAMACION
                              html1+="<thead> <tr> <th colspan='5' class='active'><h5>PROGRAMACIÓN</h5></th>  </tr></thead>";
                              html1 +="<tr>";
                              html1 +="<th class='success'>NOMBRE PIP</th><th  colspan='2'>"+registros[i]["nombre_pi"]+"</th></tr> <tr>";
                              html1 +="<th class='success'>COSTO PIP</th><th  colspan='2'>"+registros[i]["costo_pi"]+"</th></tr> <tr>";
                              html1 +="<th class='success'>AÑO PROGRAMADO</th><th colspan='5'>"+registros[i]["año_prog"]+"</th></tr> <tr>";
                              html1 +="<th class='success'>MONTO PROGRAMADO</th><th colspan='5'>"+registros[i]["monto_prog"]+"</th></tr> <tr>";
                              html1 +="<th class='success'>MONTO OPERACION Y MANTENIMIENTO</th><th colspan='5'>"+registros[i]["monto_opera_mant_prog"]+"</th></tr> <tr>";
                              html1 +="<th class='success'>TIPO DE PROGRAMACIÓN</th><th colspan='5'>"+registros[i]["tipo_prog"]+"</th></tr> <tr>";

                              html1 +="</tr>";  
                              //FIN PROGRAMACION

                                html1 +="</tbody>";
                            };    
                            $("#table-detalleProgramacion").html(html1);


                        }
                    });

                }
			   

               
       
