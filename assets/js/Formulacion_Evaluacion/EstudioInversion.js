$(document).on("ready" ,function(){

                ListaEstudioInversion();/*llamar a mi datatablet listar funcion*/
              //abrir el modal para registrar
  $("#btn_nuevoEstInv").click(function(){
                // alert("hola");
                 listarpicombo();
             }); 
             $("#listaFuncionC").change(function(){//para cargar en agregar division funcionañ
                   listarestudiocombo(); 
             });
               $("#listaTipoInversion").change(function(){//para cargar en agregar division funcionañ
                  listarnivelcombo();
             });
              $("#listaNivelEstudio").change(function(){//para cargar en agregar division funcionañ
                  listarufcombo();
             }); 
 
             $("#lista_unid_form").change(function(){
                // alert("hola");
                 listaruecombo();
             });   
              $("#lista_unid_ejec").change(function(){
                // alert("hola");
                 listarpersonascombo();
             }); 
              $("#listaResponsable").change(function(){
                // alert("hola");
                 listarestudiocombo();
             });      

              
//REGISTARAR NUEVA 
   $("#form-AddEstudioInversion").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/Estudio_Inversion/AddEstudioInversion",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           //alert(resp);
                           if (resp=='1') {
                             swal("REGISTRADO","Se regristró correctamente", "success");
                             formReset();
                           }
                            if (resp=='2') {
                             swal("NO SE REGISTRÓ","NO se regristró ", "error");
                           }
                          $('#dynamic-table-EstudioInversion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                             formReset();
                         }
                      });
                  });
//REGISTARAR NUEVA ETAPA DE ESTUDIO 
   $("#form-AddEtapaEstudio").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/Estudio_Inversion/AddEtapaEstudio",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           //alert(resp);
                           if (resp=='1') {
                             swal("REGISTRADO","Se regristró correctamente", "success");
                             formReset();
                           }
                            if (resp=='2') {
                             swal("NO SE REGISTRÓ","NO se regristró ", "error");
                           }
                          $('#dynamic-table-EstudioInversion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                             formReset();
                         }
                      });
                  });
//limpiar campos
          function formReset()
          {
          document.getElementById("form-AddInstitucion").reset();
         document.getElementById("form-EditInstitucion").reset();
          }
 //formulario para ediotar
             $("#form-EditInstitucion").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                         url:base_url+"index.php/Institucion/UpdateInstitucion",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           //alert(resp);
                           swal(resp,"Registro Actualizado", "success");
                          $('#dynamic-table-Institucion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                             formReset();
                         }
                      });
                  }); 
    

      });
         /*listra */
                var ListaEstudioInversion=function()
                {
                    var myTableUA=$("#dynamic-table-EstudioInversion").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/Estudio_Inversion/get_EstudioInversion",
                  "method":"POST",
                  "dataSrc":""
                                    },
                                "columns":[
                                      {"defaultContent":"<td>#</td>"},
                                      { "data": function (data, type, dataToSet) {
                                         return "<strong>"+data.nombre_est_inv + "</strong><br/><i class='fa fa-calendar'>  " + data.fecha+"</i>";
                                       }},
                                    {"data":"nombres"},
                                    {"defaultContent":"<td class='project_progress'><div class='progress progress_sm'><div class='progress-bar bg-green' role='progressbar' data-transitiongoal='57'></div></div><small>57% Complete</small></td>"},
                                    {"defaultContent":"<td><button type='button' class='btn btn-success btn-xs'>Formulación</button></td>"},
                                  {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#ventanaasiganarpersona'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button><button type='button' class='eliminar btn btn-warning btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-flag' aria-hidden='true'></i></button><button type='button'  class='AsignarPersona btn btn-info btn-xs' data-toggle='modal' data-target='#ventanaasiganarpersona'><i class='glyphicon glyphicon-user' aria-hidden='true'></i></button><button type='button' class='nuevaEtapaEstudio btn btn-success btn-xs' data-toggle='modal' data-target='#ventanaEtapaEstudio'><i class='glyphicon glyphicon-pushpin' aria-hidden='true'></i></button>"}
                               ],

                                "language":idioma_espanol
                    }); 
$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.DataTable.Buttons( myTableUA, {
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
        myTableUA.buttons().container().appendTo( $('.tableTools-container-EstudioInversion') );
 listarpersonasdata("#dynamic-table-EstudioInversion",myTableUA);  //CARGAR LA DATA PARA MOSTRAR EN EL MODAL  
 nuevaEtapaEstudioData("#dynamic-table-EstudioInversion",myTableUA);
                }
   
  /*fin listar proyectos*/
                var listarpicombo=function(valor){
                     html="";
                    $("#listaFuncionC").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_listaproyectos",
                        type:"POST",
                        success:function(respuesta1){
                       //    alert(respuesta);
                         var registrospi = eval(respuesta1);
                            for (var i = 0; i <registrospi.length;i++) {
                              html +="<option value="+registrospi[i]["id_pi"]+"> "+ registrospi[i]["codigo_unico_pi"]+":"+registrospi[i]["nombre_pi"]+" </option>";   
                            };
                            $("#listaFuncionC").html(html);
                            $("#listaFuncionC").html(html);
                            $('select[name=listaFuncionC]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=listaFuncionC]').change();
                            $('.selectpicker').selectpicker('refresh'); 
                          // listarpicombotipo_inversion(id_pi);
                             txt_tipoinversion.value=id_pi;
                        }
                    });
                }
/* listar tipo estudio*/
                var listarestudiocombo=function(valor){
                     html="";
                    $("#listaTipoInversion").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_TipoEstudio",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_tipo_est"]+"> "+registros[i]["nombre_tipo_est"]+" </option>";   
                            };  
                            $("#listaTipoInversion").html(html);
                            $("#listaTipoInversion").html(html);
                            $('select[name=listaTipoInversion]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=listaTipoInversion]').change();
                            $('.selectpicker').selectpicker('refresh'); 
                         }
                    });
                }
/* listar nivel estudio*/
                var listarnivelcombo=function(valor){
                     html="";
                    $("#listaNivelEstudio").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_NivelEstudio",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_nivel_estudio"]+"> "+registros[i]["denom_nivel_estudio"]+" </option>";   
                            };
                              
                            $("#listaNivelEstudio").html(html);
                            $("#listaNivelEstudio").html(html);
                            $('select[name=listaNivelEstudio]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=listaNivelEstudio]').change();
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }

      
                /*fin listar unidad formulador*/
                var listarufcombo=function(valor){
                     html="";
                    $("#lista_unid_form").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_UnidadFormuladora",
                        type:"POST",
                        success:function(respuesta2){
                          // alert(respuesta);
                         var registros = eval(respuesta2);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_uf"]+">"+registros[i]["nombre_uf"]+" </option>";   
                            }; 
                            $("#lista_unid_form").html(html);
                            $("#lista_unid_form").html(html);
                            $('select[name=lista_unid_form]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=lista_unid_form]').change();
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }

                 /*fin listar unidad formulador*/
                var listaruecombo=function(valor){
                     html="";
                    $("#lista_unid_ejec").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_UnidadEjecutora",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_ue"]+"> "+registros[i]["nombre_ue"]+" </option>";   
                            };
                              
                            $("#lista_unid_ejec").html(html);
                            $("#lista_unid_ejec").html(html);
                            $('select[name=lista_unid_ejec]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=lista_unid_ejec]').change();
                            $('.selectpicker').selectpicker('refresh'); 

                        }
                    });
                }

                var  listarpersonasdata=function(tbody,myTableUA){
                    $(tbody).on("click","button.AsignarPersona",function(){
                      var data=myTableUA.row( $(this).parents("tr")).data();
                      var id_persona=data.id_persona;
                       console.log(id_persona); 
                       listarpersonascombo(id_persona);

                    });
                }

  /* listar personas*/
                var listarpersonascombo=function(valor){
                     html="";
                    $("#listaResponsable").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_persona",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_persona"]+"> "+registros[i]["nombres_apell"]+" </option>";   
                            };
                              
                            $("#listaResponsable").html(html);
                            $("#listaResponsables").html(html);
                            $('select[name=listaResponsables]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=listaResponsables]').change();
                            $('.selectpicker').selectpicker('refresh'); 

                        }
                    });
                }
      /* listar etapas fe*/
                var listaretapasFE=function(valor){
                     html="";
                    $("#listaetapas_fe").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_etapasFE",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_etapa_fe"]+"> "+registros[i]["denom_etapas_fe"]+" </option>";   
                            }; 
                            $("#listaetapas_fe").html(html);
                            $("#listaretapasFE_M").html(html);
                            $('select[name=listaretapasFE_M]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=listaretapasFE_M]').change();
                            $('.selectpicker').selectpicker('refresh'); 

                        }
                    });
                }

                var  nuevaEtapaEstudioData=function(tbody,myTableUA){
                    $(tbody).on("click","button.nuevaEtapaEstudio",function(){
                      var data=myTableUA.row( $(this).parents("tr")).data();
                       var id_est_inv=$('#id_est_inv').val(data.id_est_inv);
                        console.log(id_est_inv);
                       listaretapasFE(id_est_inv);

                    });
                }

              var EliminarInstitucion=function(tbody,myTableUA){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=myTableUA.row( $(this).parents("tr")).data();
                        var id_institucion=data.id_institucion;
                        console.log(data);
                         swal({
                                title: "Desea eliminar ?",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes,Eliminar",
                                closeOnConfirm: false
                              },
                              function(){
                                    $.ajax({
                                          url:base_url+"index.php/Institucion/EliminarInstitucion",
                                          type:"POST",
                                          data:{id_institucion:id_institucion
                                          },
                                          success:function(respuesta){
                                            //alert(respuesta);
                                            swal("ELIMINADO", "Registro Eliminado", "success");
                                            $('#dynamic-table-Institucion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

                                          }
                                        });
                              });
                    });
                }
        /*Idioma de datatablet table-sector */
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

