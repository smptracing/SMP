$(document).on("ready" ,function(){

 var listarpicombo=function(valor){
                     var htmlPip="";
                     //alert(valor);
                    $("#listaFuncionC").html(htmlPip);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_listaproyectos",
                        type:"POST",
                        data:{valor:valor},
                        success:function(respuesta1){
                           console.log(respuesta1);
                         var registrospi = eval(respuesta1);
                            for (var i = 0; i <registrospi.length;i++) {
                              htmlPip +="<option value="+registrospi[i]["id_pi"]+"> "+ registrospi[i]["nombre_estado_ciclo"]+":"+registrospi[i]["nombre_pi"]+" </option>";
                            };
                            $("#listaFuncionC").html(htmlPip);
                            $("#listaFuncionC").html(htmlPip);
                            $('select[name=listaFuncionC]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=listaFuncionC]').change();
                            $('.selectpicker').selectpicker('refresh');
                          // listarpicombotipo_inversion(id_pi);
                            // txt_tipoinversion.value=id_pi;
                        }
                    });
                }
/* listar tipo estudio*/
var listarestudiocombo=function(valor){
                     htmltipoE="";
                    $("#listaTipoInversion").html(htmltipoE);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_TipoEstudio",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              htmltipoE +="<option  value="+registros[i]["id_tipo_est"]+"> "+registros[i]["nombre_tipo_est"]+" </option>";
                            };
                            $("#listaTipoInversion").html(htmltipoE);
                            $("#listaTipoInversion").html(htmltipoE);
                            $('select[name=listaTipoInversion]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=listaTipoInversion]').change();
                            $('.selectpicker').selectpicker('refresh');
                         }
                    });
                }
/* listar nivel estudio*/
                var listarnivelcombo=function(valor){
                     htmlNivel="";
                    $("#listaNivelEstudio").html(htmlNivel);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_NivelEstudio",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              htmlNivel +="<option  value="+registros[i]["id_nivel_estudio"]+"> "+registros[i]["denom_nivel_estudio"]+" </option>";
                            };

                            $("#listaNivelEstudio").html(htmlNivel);
                            $("#listaNivelEstudio").html(htmlNivel);
                            $('select[name=listaNivelEstudio]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=listaNivelEstudio]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                 var listaruecombo=function(valor){
                     htmlUE="";
                    $("#lista_unid_ejec").html(htmlUE);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_UnidadEjecutora",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              htmlUE +="<option  value="+registros[i]["id_ue"]+"> "+registros[i]["nombre_ue"]+" </option>";
                            };

                            $("#lista_unid_ejec").html(htmlUE);
                            $("#lista_unid_ejec").html(htmlUE);
                            $('select[name=lista_unid_ejec]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=lista_unid_ejec]').change();
                            $('.selectpicker').selectpicker('refresh');

                        }
                    });
                }
                 var listarufcombo=function(valor){
                     htmlUF="";
                    $("#lista_unid_form").html(htmlUF);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Estudio_Inversion/get_UnidadFormuladora",
                        type:"POST",
                        success:function(respuesta2){
                          // alert(respuesta);
                         var registros = eval(respuesta2);
                            for (var i = 0; i <registros.length;i++) {
                              htmlUF +="<option  value="+registros[i]["id_uf"]+">"+registros[i]["nombre_uf"]+" </option>";
                            };
                            $("#lista_unid_form").html(htmlUF);
                            $("#lista_unid_form").html(htmlUF);
                            $('select[name=lista_unid_form]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=lista_unid_form]').change();//borrado
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }

                ListaEstudioInversion();/*llamar a mi datatablet listar funcion*/
                listarpicombo();
                listarnivelcombo();
                listarestudiocombo();
                listarufcombo();
                listaruecombo();
                listarEstadoCiclo();

            $("#comboEstadoFe").change(function(){
                var NombreEstadoFormulacionEvalu=$("#comboEstadoFe").val();
                listarpicombo(NombreEstadoFormulacionEvalu);
             });

              $("#listaNivelEstudio").change(function(){
             });

             $("#lista_unid_form").change(function(){

             });
              $("#lista_unid_ejec").change(function(){
                 listarpersonascombo();
             });
              $('#listaFuncionC').on('change', function()
               {
                   var id_Pi =$("#listaFuncionC").val();
                   if(id_Pi==null)
                   {
                   }else
                   {
                       $.ajax({
                            type:"POST",
                           "url":base_url+"index.php/Estudio_Inversion/get_listaproyectosCargar",
                            data:{"id_Pi":id_Pi},
                            dataType:"JSON",
                            success:function(resp){
                              $.each(resp,function(index,element)
                              {



                                   $("#txtnombres").val(element.nombre_pi);
                                   $("#txtCodigoUnico").val(element.codigo_unico_pi);

                                   var monto_Inversion=0;
                                   $("listaTipoInversion").val(element.nombre_tipo_inversion);

                                   $('select[name=listaTipoInversion]').val(element.id_tipo_inversion);
                                   $('select[name=listaTipoInversion]').change();
                                   $('.selectpicker').selectpicker('refresh');

                                    $('select[name=lista_unid_form]').val(element.id_uf);
                                   $('select[name=lista_unid_form]').change();
                                   $('.selectpicker').selectpicker('refresh');

                                   $('select[name=lista_unid_ejec]').val(element.id_ue);
                                   $('select[name=lista_unid_ejec]').change();
                                   $('.selectpicker').selectpicker('refresh');

                                   $("#txtMontoInversion").val(element.costo_pi);

                                   if(element.pim_acumulado==0)
                                   {
                                      $("#txtcostoestudio").val(element.pia_meta_pres);
                                   }
                                  else
                                   {
                                      $("#txtcostoestudio").val(element.pim_acumulado);
                                   }

                             });
                           // $("#txtCodigoUnico").va(resp);
                        }
                    });
                   }
              });

//REGISTARAR NUEVA
$("#form-AddEstudioInversion").submit(function(event)
{
    event.preventDefault();
    $('#form-AddEstudioInversion').data('formValidation').validate();
    if(!($('#form-AddEstudioInversion').data('formValidation').isValid()))
    {
        return;
    }
    $.ajax({
        url:base_url+"index.php/Estudio_Inversion/AddEstudioInversion",
        type:$(this).attr('method'),
        data:$(this).serialize(),
        success:function(resp)
        {
            if (resp=='1')
            {
                swal("REGISTRADO","Se regristró correctamente", "success");
            }
            if (resp=='2')
            {
                swal("NO SE REGISTRÓ","NO se regristró ", "error");
            }
            $('#dynamic-table-EstudioInversion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
            $('#form-AddEstudioInversion')[0].reset();
        }
    });
});

//Subida de documentos de inversion


                      $("#form-AddDocumentosEstudio").submit(function(event)//AÑADIR NUEVA CARTERA
                       {
                            event.preventDefault();
                            var formData=new FormData($("#form-AddDocumentosEstudio")[0]);
                            $.ajax({
                                type:"POST",
                                enctype: 'multipart/form-data',
                                url:base_url+"index.php/Estudio_Inversion/AddDocumentosEstudio",
                                data: formData,
                                cache: false,
                                contentType:false,
                                processData:false,
                                success:function(resp){
                                 if (resp=='true') {
                                     swal("REGISTRADO","DOCUMENTO DE INSERSIÓN", "success");
                                   }
                                    if (resp=='false') {
                                     swal("SE REGISTRÓ","DOCUMENTO DE INSERSIÓN ", "error");
                                   }
                                   var id_est_inv=$("#txt_id_est_invAdd").val();
                                   listarDocumentos(id_est_inv);

                               }

                            });
                                   //$('#form-AddDocumentosEstudio')[0].reset();
                                   //$("#VentanaDocumentosEstudio").modal("hide");
                       });

//fin de documentos de inversion

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
            document.getElementById("form-AddEtapaEstudio").reset();
            document.getElementById("form-AddEstudioInversion").reset();
            document.getElementById("form-AddResponsableEstudio").reset();
          }
//REGISTARAR NUEVA ETAPA DE ESTUDIO
   $("#form-AddResponsableEstudio").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/Estudio_Inversion/AddResponsableEstudio",
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




      });
//listar etapas estudio en el modal
  var listarEstadoCiclo=function(){
                    var comboEstadoFe;
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/EstadoCicloInversion/listarEstadoCicloNombre",
                        type:"POST",
                        dataType:"JSON",
                        success:function(respuesta){
                          $.each(respuesta,function(index, elemento) {
                              comboEstadoFe +="<option  value='"+elemento.nombre_estado_ciclo+"' >"+elemento.nombre_estado_ciclo+" </option>";

                          });
                            $("#comboEstadoFe").html(comboEstadoFe);
                            $('select[name=comboEstadoFe]').val(comboEstadoFe);
                            $('select[name=comboEstadoFe]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });

  }
 var listarEtapaEstudio=function(id_est_inv)
                {
                    var table=$("#table_etapas_estudio").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    url:base_url+"index.php/Estudio_Inversion/get_etapas_estudio",
                                    type:"POST",
                                    data:{id_est_inv:id_est_inv}
                                    },
                                "columns":[
                                    {"data":"id_est_inv","visible": false},
                                        {"data": function (data, type, dataToSet) {

                                      if (data.denom_etapas_fe =='Formulación')
                                      {
                                       //return '<i class="fa fa-spinner red fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
                                        return '<i class="fa fa-circle red fa-2x"></i>';
                                      }
                                        if (data.denom_etapas_fe =='Evaluación')
                                      {
                                       //return '<i class="fa fa-spinner orange fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
                                      return '<i class="fa fa-circle purple fa-2x"></i>';
                                     }
                                        if (data.denom_etapas_fe =='Aprobado')
                                      {
                                        //return '<i class="fa fa-spinner blue fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
                                      return '<i class="fa fa-circle light blue fa-2x"></i>';

                                      }
                                        if (data.denom_etapas_fe =='Viabilizado')
                                      {
                                      //return '<i class="fa fa-spinner green fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
                                      return '<i class="fa fa-circle light green fa-2x"></i>';
                                      }
                                      if (data.denom_etapas_fe ==null)
                                      {
                                      return '<button type="button" class=" btn-round btn-warning btn-xs" data-toggle="modal" data-target="#"><i class="fa fa-flag" aria-hidden="true"></i> Asignar</button"';

                                      }
                                   }},
                                    {"data":"denom_etapas_fe"},
                                    {"data":"recomendaciones"},
                                    {"data":"fecha_inicio"},
                                    {"data":"fecha_final"}

                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaupdateEstadoFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                }


         /*listra */
                var ListaEstudioInversion=function()
                {
                    var myTableUA=$("#dynamic-table-EstudioInversion").DataTable({
                     "processing":true,
                     "serverSide":false,
                     displayLength: 15,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/Estudio_Inversion/get_EstudioInversion",
                  "method":"POST",
                  "dataSrc":""
                                    },
                                "columns":[
                                      {"data":"codigo_unico_est_inv" ,"visible": true},
                                      {"data":"id_est_inv" ,"visible": true},
                                      { "data": function (data, type, dataToSet) {
                                         return "<strong>"+data.nombre_est_inv + "</strong><br/><i class='fa fa-calendar'>  " + data.fecha+"</i>";
                                       }},
                                      {"data":"nombre_funcion"},
                                      {"data":"coordinador"},
                                      {"data":"avance_fisico",
                                      "mRender":function (data,type, full) {
                                         return "<td class='project_progress'><div class='progress progress_sm'><div class='progress-bar bg-green' role='progressbar' data-transitiongoal='57' style='width: "+data+"%;'></div></div><small>"+data+" % Complete</small></td>";
                                    }},
                                    {"data": function (data, type, dataToSet) {

                                      if (data.denom_etapas_fe =='Formulación')
                                      {
                                        return '<a  href="../FEformulacion/Feformulacion?id_est_inv='+data.id_est_inv+'"><button type="button" class="btn btn btn-primary btn-xs">'+data.denom_etapas_fe +' </button></a>';
                                      }
                                        if (data.denom_etapas_fe =='Evaluación')
                                      {
                                     return '<a  href="../EvaluacionFE/FeEvaluacion?id_est_inv='+data.id_est_inv+'"><button type="button" class="btn btn btn-warning btn-xs">'+data.denom_etapas_fe +' </button></a>';
                                      }
                                        if (data.denom_etapas_fe =='Aprobado')
                                      {
                                     return '<a  href="../FEformulacion/FeAprobado?id_est_inv='+data.id_est_inv+'"><button type="button" class="btn btn btn-info btn-xs">'+data.denom_etapas_fe +' </button></a>';

                                      }
                                        if (data.denom_etapas_fe =='Viabilizado')
                                      {
                                      return '<a  href="../FEformulacion/FeViabilizado?id_est_inv='+data.id_est_inv+'"><button type="button" class="btn btn btn-success btn-xs">'+data.denom_etapas_fe +' </button></a>';

                                      }
                                      if (data.denom_etapas_fe ==null)
                                      {
                                      return '<button type="button" class="nuevaEtapaEstudio btn btn-warning btn-xs" data-toggle="modal" data-target="#ventanaEtapaEstudio"><i class="fa fa-flag" aria-hidden="true"></i> Asignar</button"';

                                      }
                                   }},
                                  {"defaultContent":" <div class='dropdown'>  <a class='btn btn-link dropdown-toggle' type='button' data-toggle='dropdown'> <span class='glyphicon glyphicon-option-vertical' aria-hidden='true'></span></a> <ul class='dropdown-menu pull-right' style=''>  <li><button type='button' title='Subir Resolución' class='DocumentosEstudio btn btn-link btn-xs' data-toggle='modal' data-target='#VentanaDocumentosEstudio'> Documento</button> </li> <li> <button title='Asignar Respondable' class='AsignarPersona btn btn-link btn-xs' data-toggle='modal' data-target='#ventanaasiganarpersona'>Asignar Coordinador</button></li> <li><button title='Nueva Etapa Estudio' class='nuevaEtapaEstudio btn btn-link btn-xs' data-toggle='modal' data-target='#ventanaEtapaEstudio'>Nueva Etapa de Estudio</button> </li> <li> <button type='button' title='Ver Etapas Estudio' class='ver_etapas_estudio btn btn-link btn-xs' data-toggle='modal' data-target='#ventana_ver_etapas_estudio'>Ver Etapas</button></li> </ul> </div>"}

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
       AddListarDocumentos("#dynamic-table-EstudioInversion",myTableUA);
       ver_etapas_estudio("#dynamic-table-EstudioInversion",myTableUA);
                }

  /*fin listar proyectos*/

              //listar y agregar Documentos al proyecto de invserion
              var  AddListarDocumentos=function(tbody,myTableUA){
                    $(tbody).on("click","button.DocumentosEstudio",function(){
                      var data=myTableUA.row( $(this).parents("tr")).data();
                      $("#txt_id_est_invAdd").val(data.id_est_inv);
                        var  id_est_inv=data.id_est_inv;
                        listarDocumentos(id_est_inv);
                    });
                }
                                  //para ver etapas de los estudios
                 var  ver_etapas_estudio=function(tbody,myTableUA){
                    $(tbody).on("click","button.ver_etapas_estudio",function(){
                        var data=myTableUA.row( $(this).parents("tr")).data();
                         var id_est_inv=data.id_est_inv;
                        var txtIdEtapaEstudio_v=$('#txtIdEtapaEstudio_v').val(data.id_est_inv);
                         listarEtapaEstudio(id_est_inv);
                  });
                }
                 var  listarpersonasdata=function(tbody,myTableUA){
                    $(tbody).on("click","button.AsignarPersona",function(){
                      var data=myTableUA.row( $(this).parents("tr")).data();
                      var id_persona=data.id_persona;
                       console.log(id_persona);
                        var id_est_inv=$('#id_est_inv').val(data.id_est_inv);
                       listarpersonascombo(id_persona);

                    });
                }
                var  listarDocumentos=function(id_est_inv)
                {

                    html="";
                    $("#table-Documento").html(html);
                      $.ajax({
                       type:"POST",
                       "url":base_url+"index.php/Estudio_Inversion/GetDocumentosEstudio",
                       data:{"id_est_inv":id_est_inv},
                       success:function(respuesta)
                                        {
                                           var registros = eval(respuesta);

                                           html+="<thead> <tr> <th><center>Nombre Documento</center></th> <th><center> Descripción </center></th><th> <center>Url</center></th> </tr></thead>";
                                           for (var i = 0; i <registros.length;i++) {
                                                html +="<tbody> <tr class='info'><th>"+registros[i]["nombre_documento"]+"</th><th>"+registros[i]["desc_documento"]+"</th><th> <a href='"+base_url+"uploads/DocumentosInversion/"+registros[i]["url_documento"]+" '  >"+registros[i]["url_documento"]+" <i class='fa fa-file-pdf-o'></i> </a></th></tr>";
                                            //alert(suma);
                                             };
                                               html +="</tbody>";
                                              $("#table-Documento").html(html);
                                        }
                              });
                }

              //fin listar y agregar documento


                /*fin listar unidad formulador*/

                 /*fin listar unidad formulador*/

              var  nuevaEtapaEstudioData=function(tbody,myTableUA){
                    $(tbody).on("click","button.nuevaEtapaEstudio",function(){
                   var data=myTableUA.row( $(this).parents("tr")).data();

                       var txt_id_est_inv=$('#txt_id_est_inv').val(data.id_est_inv);
                      // console.log(txt_id_est_inv);
                      listaretapasFE();
                    });
                }

                     var  EstadoCicloData=function(tbody,myTable){
                    $(tbody).on("click","button.editar",function(){
                        var data=myTable.row( $(this).parents("tr")).data();
                        var txt_IdEstadoCicloInversionM=$('#txt_IdEstadoCicloInversionM').val(data.id_estado_ciclo);
                        var txt_NombreEstadoCicloInversionM=$('#txt_NombreEstadoCicloInversionM').val(data.nombre_estado_ciclo);
                        var txt_DescripcionEstadoCicloInversionM=$('#txt_DescripcionEstadoCicloInversionM').val(data.descripcion_estado_ciclo);

                    });
                }


                var  listarpersonasdata=function(tbody,myTableUA){
                    $(tbody).on("click","button.AsignarPersona",function(){
                      var data=myTableUA.row( $(this).parents("tr")).data();
                      var id_persona=data.id_persona;
                       console.log(id_persona);
                        var id_est_inv=$('#id_est_inv').val(data.id_est_inv);
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

$(function()
{
    $('#form-AddEstudioInversion').formValidation(
    {
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            txtnombres:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Descripción" es requerido.</b>'
                    }
                }
            },
            txtcostoestudio:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Costo de estudio" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Costo de estudio" debe ser númerico.</b>'
                    }
                }
            },
            listaNivelEstudio:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Tipo de Estudio" es requerido.</b>'
                    }
                }
            }
        }
    });
});
