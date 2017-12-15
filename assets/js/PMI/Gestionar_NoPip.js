$(document).on("ready" ,function()
{
    $("#btn_nuevoNoPip").click(function(){
        listarCicloInver();
        listar_TipologiaNoPipRegistro();
    });
     listar_no_pip();
    $("#txtCostoPip_m").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });
    $("#txtCostoPip").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });

   $("#form_Edit_no_pip").submit(function(event)
    {
        event.preventDefault();
        $('#validarEdicionNoPip').data('formValidation').validate();
        if(!($('#validarEdicionNoPip').data('formValidation').isValid()))
        {
          return;
        }
        $.ajax({
            url:base_url+"index.php/bancoproyectos/update_no_pip",
            type:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(resp)
            {
                if (resp=='1')
                {
                    swal("ACTUALIZADO","Se actualizó correctamente", "success");
                }
                if (resp=='2')
                {
                    swal("NO SE ACTUALIZÓ","No se actualizó ", "error");
                }
                $('#table_no_pip').dataTable()._fnAjaxUpdate();
                $('#form_Edit_no_pip')[0].reset();
                $('#venta_editar_proyecto').modal('hide');
            }
        });
    });

    $("#form-AddProyectosInversion").submit(function(event)
    {
        event.preventDefault();
        $('#validarRegistroNoPip').data('formValidation').validate();
        if(!($('#validarRegistroNoPip').data('formValidation').isValid()))
        {
          return;
        }
        $.ajax({
            url:base_url+"index.php/bancoproyectos/AddNoPip",
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
                $('#table_no_pip').dataTable()._fnAjaxUpdate();
                $('#form-AddProyectosInversion')[0].reset();
                $('#VentanaRegistraPIP').modal('hide');
            }
        });
    });
          //REGISTARAR OPERACION Y MANTENIMIENTO
     $("#form_AddOperacionMantenimiento").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/bancoproyectos/AddOperacionMantenimiento",
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
                          $('#Table_OperacionMantenimiento').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                             formReset();
                         }
                      });
                  });
        //REGISTARAR rubro pi
     $("#form_AddTipoNoPip").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/bancoproyectos/AddTipoNoPip",
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
                          $('#Table_TipoNoPip').dataTable()._fnAjaxUpdate();
                          //para actualizar mi datatablet datatablet   funcion
                          $('#table_no_pip').dataTable()._fnAjaxUpdate();
                             formReset();
                         }
                      });
                  });
      //REGISTARAR rubro pi
     $("#form_AddModalidadEjec").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/bancoproyectos/AddModalidadEjecPI",
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
                          $('#Table_ModalidadPI').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                             formReset();
                         }
                      });
                  });
       //REGISTARAR rubro pi
     $("#form_AddRubro").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/bancoproyectos/AddRurboPI",
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
                          $('#Table_RubroPI').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                             formReset();
                         }
                      });
                  });
  //REGISTARAR ESTADO ETAPA
     $("#form_AddEstadoCiclo").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/bancoproyectos/AddEstadoCicloPI",
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
                          $('#Table_Estado_Ciclo').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                          $('#table_no_pip').dataTable()._fnAjaxUpdate();
                             formReset();
                         }
                      });
                  });

  //registar nuevo ubigeo con latitud y longitud

    $("#form_AddUbigeo").submit(function(event)
    {
        event.preventDefault();
        var formData=new FormData($("#form_AddUbigeo")[0]);
        $.ajax({
            type:"POST",
            enctype: 'multipart/form-data',
            url:base_url+"index.php/bancoproyectos/Add_ubigeo_proyecto",
            data: formData,
            cache: false,
            contentType:false,
            processData:false,
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
                $('#TableUbigeoProyecto_x').dataTable()._fnAjaxUpdate();
                //formReset();
                //$('#venta_ubicacion_geografica').modal('hide');
            }
        });
    });
                //registar proyectos en banco de proyectos

        //limpiar campos
          function formReset()
          {
          document.getElementById("form_AddEstadoCiclo").reset();
         document.getElementById("form_AddUbigeo").reset();
         document.getElementById("form-AddProyectosInversion").reset();
         document.getElementById("form_AddRubro").reset();
         document.getElementById("form_AddModalidadEjec").reset();
         document.getElementById("form_AddTipoNoPip").reset();
         document.getElementById("form_AddOperacionMantenimiento").reset();
          }
      });
//listar operacion y mantenimiento de un proyecto
 var listar_pip_OperMant=function(id_pi)
                {
                    var table=$("#Table_OperacionMantenimiento").DataTable({
                      "processing": true,
                      "serverSide":false,
                       destroy:true,
                         "ajax":{
                                     url:base_url+"index.php/bancoproyectos/Get_OperacionMantenimiento",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                    {"data":"id_operacion_mantenimiento_pi","visible": false},
                                    {"data":"monto_operacion"},
                                    {"data":"responsable_operacion"},
                                    {"data":"monto_mantenimiento"},
                                    {"data":"responsable_mantenimiento"},
                                    {"data":"fecha_registro"}
                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaupdateEstadoFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                }
 //listar tipo no pip
 var listar_TipoNoPip=function(id_pi)
                {
                    var table=$("#Table_TipoNoPip").DataTable({
                      "processing": true,
                      "serverSide":false,
                       destroy:true,
                         "ajax":{
                                     url:base_url+"index.php/bancoproyectos/Get_TipoNoPip",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                    {"data":"id_nopip","visible": false},
                                    {"data":"desc_tipo_nopip"},
                                    {"data":"fecha_nopip"},
                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaupdateEstadoFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });

                }
 //listar ubigeo de un proyecto en le modal
 var listar_ubigeo_pi=function(id_pi)
                {
                    var table=$("#TableUbigeoProyecto_x").DataTable({
                      "processing": true,
                      "serverSide":false,
                       destroy:true,
                         "ajax":{
                                     url:base_url+"index.php/bancoproyectos/Get_ubigeo_pip",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                    {"data":"provincia"},
                                    {"data":"distrito"},
                                    {"data":"latitud"},
                                    {"data":"longitud"},
                                    {"data":"url_img",
                                    "render" : function ( data, type, row, meta) {
                                      url= base_url+"uploads/ImgUbicacionProyecto/"+data;
                                      return '<img height="20" width="20" src="'+url+'" />';
                                    }},
                                    {"data":'id_ubigeo_pi',render:function(data,type,row){
                                        return "<button type='button'  data-toggle='tooltip'  class='editar btn btn-primary btn-xs' data-toggle='modal' onclick=ModificarUbigeoPi("+data+")><i class='ace-icon fa fa-pencil bigger-120'></i></button> <button type='button'  data-toggle='tooltip'  class='editar btn btn-danger btn-xs' data-toggle='modal' onclick=eliminarUbigeo("+data+",this)><i class='ace-icon fa fa-trash-o bigger-120'></i></button>";
                                    }}
                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaupdateEstadoFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                }
var eliminarUbigeo=function(id_ubigeo_pi,element)
{
    if(!confirm('Se esta seguro de eliminar. ¿Realmente desea proseguir con la operaición?'))
    {
      return;
    }

    paginaAjaxJSON({ "id_ubigeo_pi" : id_ubigeo_pi }, base_url+'index.php/bancoproyectos/eliminarUbigeo', 'POST', null, function(objectJSON)
    {
      objectJSON=JSON.parse(objectJSON);

      swal(
      {
        title: '',
        text: objectJSON.mensaje,
        type: (objectJSON.proceso=='Correcto' ? 'success' : 'error')
      },
      function(){});

      $(element).parent().parent().remove();

    }, false, true);

}

var ModificarUbigeoPi=function(id_ubigeo_pi)
{
  paginaAjaxDialogo(2, 'Edición de Ubicación Geografica', { id_ubigeo_pi : id_ubigeo_pi }, base_url+'index.php/bancoproyectos/editarUbicacionGeografica', 'GET', null, null, false, true);
}
//listar el estado ciclo de los proyectos
 var listar_estado_ciclo=function(id_pi)
                {
                    var table=$("#Table_Estado_Ciclo").DataTable({
                      "processing": true,
                      "serverSide":false,
                       destroy:true,
                         "ajax":{
                                     url:base_url+"index.php/bancoproyectos/listar_estados",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                    {"data":"nombre_estado_ciclo"},
                                    {"data":"fecha_estado_ciclo_pi"},
                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaupdateEstadoFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                }
                //listar rubro pi
 var listarRubroPI=function(id_pi)
                {
                    var table=$("#Table_RubroPI").DataTable({
                      "processing": true,
                      "serverSide":false,
                      destroy:true,
                      "ajax":{
                                     url:base_url+"index.php/bancoproyectos/listar_rubro_pi",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                      {"data":"nombre_rubro"},
                                    {"data":"fecha_rubro_pi"}
                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaupdateEstadoFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                }
                                //listar modalidad de ejecucion PI
 var listarModalidadPI=function(id_pi)
                {
                    var table=$("#Table_ModalidadPI").DataTable({
                      "processing": true,
                      "serverSide":false,
                      destroy:true,
                      "ajax":{
                                     url:base_url+"index.php/bancoproyectos/listar_modalidad_ejec",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                    {"data":"nombre_modalidad_ejec"},
                                    {"data":"fecha_modalidad_ejec_pi"}
                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaupdateEstadoFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                }

//fin de table de lista de proyectos
//listar no PIP
 var listar_no_pip=function()
{
       var table=$("#table_no_pip").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/bancoproyectos/GetNOPIP",
                                    "method":"POST",
                                    "dataSrc":""
                                  },
                                "columns":[
                                    {"defaultContent":"<center><button type='button' title='Editar' class='Editar_proyecto btn btn-primary btn-xs' data-toggle='modal' data-target='#venta_editar_proyecto'><i class='fa fa-edit' aria-hidden='true'></i></button></center>"},
                                   //{"defaultContent":"<center>#</center>"},
                                    {"data":"id_pi" ,"visible": false},
                                    {"data":"codigo_unico_pi"},
                                    {"data":"nombre_pi"},
                                    {"data":"costo_pi"},
                                    {"data":"desc_tipo_nopip"},
                                    {"defaultContent":"<div class='btn-group'><button data-toggle='dropdown' class='btn btn-default dropdown-toggle' type='button' aria-expanded='false'>Opciones <span class='caret'></span></button><ul class='dropdown-menu'><li><button type='button' title='Ubicación' class='ubicacion_geografica btn btn-primary btn-xs' data-toggle='modal' data-target='#venta_ubicacion_geografica'><i class='fa fa-map-marker' aria-hidden='true'></i> Ubicación</button></li><li><button type='button' title='Ver Rubro PI' class='RegistarNuevoRubro btn btn-info btn-xs' data-toggle='modal' data-target='#venta_registar_rubro'><i class='fa fa-spinner' aria-hidden='true'></i> Ver Rubro PI</button></li><li><button type='button' title='Modalidad de Ejecución' class='nueva_modalidad_ejec btn btn-warning btn-xs' data-toggle='modal' data-target='#ventanaModalidadEjecucion'><i class='fa fa-flag' aria-hidden='true'> Modalidad de Ejecución</i></button></li><li><button type='button' title='Ver Estado Ciclo' class='ver_estado_ciclo btn btn-success btn-xs' data-toggle='modal' data-target='#ventana_ver_estado_ciclo'><i class='fa fa-paw' aria-hidden='true'> Ver Estado Ciclo</i></button></li><li><button type='button' title='Operación y Mantenimiento' class='ver_operacion_mantenimiento btn btn-info btn-xs' data-toggle='modal' data-target='#ventana_ver_operacion_mantenimeinto'><i class='fa fa-building' aria-hidden='true'> Operación y Mantenimiento</i></button></li></ul></div>"
                                    }
                                   //{"defaultContent":"<center><button type='button' title='Ubicación' class='ubicacion_geografica btn btn-primary btn-xs' data-toggle='modal' data-target='#venta_ubicacion_geografica'><i class='fa fa-map-marker' aria-hidden='true'></i></button><button type='button' title='Ver Rubro PI' class='RegistarNuevoRubro btn btn-info btn-xs' data-toggle='modal' data-target='#venta_registar_rubro'><i class='fa fa-spinner' aria-hidden='true'></i></button><button type='button' title='Modalidad de Ejecución' class='nueva_modalidad_ejec btn btn-warning btn-xs' data-toggle='modal' data-target='#ventanaModalidadEjecucion'><i class='fa fa-flag' aria-hidden='true'></i></button><button type='button' title='Ver Estado Ciclo' class='ver_estado_ciclo btn btn-success btn-xs' data-toggle='modal' data-target='#ventana_ver_estado_ciclo'><i class='fa fa-paw' aria-hidden='true'></i></button><button type='button' title='Ver Tipología No PIP' class='ver_tipologia_nopip btn btn-danger btn-xs' data-toggle='modal' data-target='#ventana_ver_tipologia'><i class='fa fa-random' aria-hidden='true'></i></button><button type='button' title='Operación y Mantenimiento' class='ver_operacion_mantenimiento btn btn-info btn-xs' data-toggle='modal' data-target='#ventana_ver_operacion_mantenimeinto'><i class='fa fa-building' aria-hidden='true'></i></button></center>"}

                                ],
                               "language":idioma_espanol
                    });
      AddListarUbigeo("#table_no_pip",table);
      AddEstadoCiclo("#table_no_pip",table);
      AddRubroPI("#table_no_pip",table);
      AddModalidadEjecucion("#table_no_pip",table);
      AddTipologiaNOPIP("#table_no_pip",table);
      AddMantOperacion("#table_no_pip",table);
      EditNoPip("#table_no_pip",table);
}
//fin de table de lista NO PIP
//editar proyecto de inversion ingresado en el banco de pi.

   var  EditNoPip=function(tbody,table){
                    $(tbody).on("click","button.Editar_proyecto",function(){

                var data=table.row( $(this).parents("tr")).data();
                var  id_estado_ciclo=data.id_estado_ciclo;
                var  id_naturaleza_inv=data.id_naturaleza_inv;
                var id_nivel_gob=data.id_nivel_gob;
                var id_ue=data.id_ue;
                var id_funcion=data.id_funcion;
                var id_div_funcional=data.id_div_funcional;
                var id_grupo_funcional=data.id_grupo_funcional;
               var id_fuente_finan=data.id_fuente_finan;
               var id_rubro=data.id_rubro;
               var id_modalidad_ejec=data.id_modalidad_ejec;
               var id_tipologia_inv=data.id_tipologia_inv;
               var id_programa_pres=data.id_programa_pres;
               var id_tipo_nopip=data.id_tipo_nopip;
               var estado_pi=data.estado_pi;




                      $("#txtCodigoUnico_m").val(data.codigo_unico_pi);
                      $("#txtNombrePip_m").val(data.nombre_pi);
                      listarCicloInver(id_estado_ciclo);
                      listarNaturalezaInver(id_naturaleza_inv);
                      listarNivelGobierno(id_nivel_gob);
                      listarUnidadEjecutora(id_ue);
                      listarFuncion(id_funcion);
                      listarDivisionFuncional(id_funcion,id_div_funcional);
                      listarGrupoFuncional(id_grupo_funcional);
                      $("#txtCostoPip_m").val(data.costo_pi);
                      $("#txt_beneficiarios_m").val(data.num_beneficiarios);
                      listarFuenteFinanciamiento(id_fuente_finan);
                      listarRubroEjecucion(id_rubro);
                      listarModalidadEjecucion(id_modalidad_ejec);
                      listarTipologiaInversion(id_tipologia_inv);
                      listarProgramaPresupuestal(id_programa_pres);
                      listar_TipologiaNoPipRegistro(id_tipo_nopip); 
                      $("#txt_idNo_Pip").val(data.id_pi);

                      $("#cbx_estado_m").val(estado_pi);



                    });
                }

/**************** editar los proyecto ********************************/
    /*listar ciclo de inversión*/

    var listarCicloInver=function(valor){
                     var html="";
                    $("#cbxEstCicInv_").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/EstadoCicloInversion/get_EstadoCicloInversion",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_estado_ciclo"]+"> "+registros[i]["nombre_estado_ciclo"]+" </option>";
                            };
                            $("#cbxEstCicInv_").html(html);
                             $("#cbxEstCicInv_m").html(html);//para modificar las entidades
                            $('select[name=cbxEstCicInv_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxEstCicInv_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
var listarNaturalezaInver=function(valor){

                    var html="";
                    $("#cbxInicio").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/TipologiaInversion/get_NaturalezaInversion",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_naturaleza_inv"]+"> "+registros[i]["nombre_naturaleza_inv"]+" </option>";
                            };
                            $("#cbxInicio").html(html);
                             $("#cbxNatI_m").html(html);//para modificar las entidades
                            $('select[name=cbxNatI_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxNatI_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }

              var listarNivelGobierno=function(valor){

                    var html="";
                    $("#cbxNivelGob_Inicio").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/NivelGobierno/get_NivelGobierno",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_nivel_gob"]+"> "+registros[i]["nombre_nivel_gob"]+" </option>";
                            };
                            $("#cbxNivelGob_Inicio").html(html);
                             $("#cbxNivelGob_m").html(html);//para modificar las entidades
                            $('select[name=cbxNivelGob_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxNivelGob_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                  var listarUnidadEjecutora=function(valor){

                    var html="";
                    $("#cbxUnidadEjecutora_inicio").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/UnidadE/GetUnidadE",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_ue"]+"> "+registros[i]["nombre_ue"]+" </option>";
                            };
                            $("#cbxUnidadEjecutora_inicio").html(html);
                             $("#cbxUnidadEjecutora_m").html(html);//para modificar las entidades
                            $('select[name=cbxUnidadEjecutora_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxUnidadEjecutora_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
var listarFuncion=function(valor){

                    var html="";
                    $("#cbxFuncion_inicio").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/MFuncion/GetFuncion",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_funcion"]+"> "+registros[i]["nombre_funcion"]+" </option>";
                            };
                            $("#cbxFuncion_inicio").html(html);
                             $("#cbxFuncion_m").html(html);//para modificar las entidades
                            $('select[name=cbxFuncion_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxFuncion_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }


    $("#cbxFuncion_m").change(function()
       {
      var id_funcion=$("#cbxFuncion_m").val();
        listarDivisionFuncional(id_funcion,'');
       });
var listarDivisionFuncional=function(id_funcion,valor)
                {
                  //alert(id_funcion);
                 // alert(valor);
                   var html="";
                    $("#cbxDivFunc_inicio").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/DivisionFuncional/GetDivisioFuncuonaId",
                        type:"POST",
                        data:{id_funcion:id_funcion},
                        success : function(respuesta){
                           //alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_div_funcional"]+"> "+ registros[i]["nombre_div_funcional"]+" </option>";
                            }
                            $("#cbxDivFunc_inicio").html(html);
                           // $("#cbxDivFunc_m").html(html);//para modificar las entidades
                              $('select[name=cbxDivFunc_inicio]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            //$('select[name=cbxDivFunc_inicio]').change();
                            $('.selectpicker').selectpicker('refresh');

                        }
                    });
                }
  var listarGrupoFuncional=function(valor)
                {
                    html="";
                    $("#cbxGrupoFunc").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/GrupoFuncional/GetGrupoFuncional",
                        type:"POST",
                        success : function(respuesta)
                        {
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_grup_funcional"]+"> "+ registros[i]["nombre_grup_funcional"]+" </option>";
                            }
                            $("#cbxGrupoFunc").html(html);
                            $("#cbxGrupoFunc_m").html(html);//para modificar las entidades
                            $('select[name=cbxGrupoFunc_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxGrupoFunc_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
var listarFuenteFinanciamiento=function(valor){
                     var html="";
                    $("#cbxFuenteFinanciamiento").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/FuenteFinanciamiento/get_FuenteFinanciamiento",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_fuente_finan"]+"> "+registros[i]["nombre_fuente_finan"]+" </option>";
                            };
                            $("#cbxFuenteFinanciamiento").html(html);
                            $("#cbxFuenteFinanciamiento_m").html(html);//para modificar las entidades
                            $('select[name=cbxFuenteFinanciamiento_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxFuenteFinanciamiento_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }

                var listarRubroEjecucion=function(valor){
                var html="";
                    $("#cbxRubroEjecucion").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/bancoproyectos/listar_rubro",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_rubro"]+"> "+registros[i]["nombre_rubro"]+" </option>";
                            };
                            $("#cbxRubroEjecucion").html(html);
                            $("#cbxRubroEjecucion_m").html(html);//para modificar las entidades
                            $('select[name=cbxRubroEjecucion_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxRubroEjecucion_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                var listarTipologiaInversion=function(valor){
                var html="";
                    $("#cbxTipologiaInversion").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/TipologiaInversion/get_TipologiaInversion",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_tipologia_inv"]+"> "+registros[i]["nombre_tipologia_inv"]+" </option>";
                            };
                            $("#cbxTipologiaInversion").html(html);
                            $("#cbxTipologiaInversion_m").html(html);//para modificar las entidades
                            $('select[name=cbxTipologiaInversion_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxTipologiaInversion_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                var listarProgramaPresupuestal=function(valor){
                var html="";
                    $("#cbxProgramaPresupuestal").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/ProgramaPresupuestal/GetProgramaP",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_programa_pres"]+"> "+registros[i]["nombre_programa_pres"]+" </option>";
                            };
                            $("#cbxProgramaPresupuestal").html(html);
                            $("#cbxProgramaPresupuestal_m").html(html);//para modificar las entidades
                            $('select[name=cbxProgramaPresupuestal_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxProgramaPresupuestal_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                var listarModalidadEjecucion=function(valor){
                var html="";
                    $("#cbxModalidadEjecucion").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/ModalidadEjecucion/GetModalidadE",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_modalidad_ejec"]+"> "+registros[i]["nombre_modalidad_ejec"]+" </option>";
                            };
                            $("#cbxModalidadEjecucion").html(html);
                            $("#cbxModalidadEjecucion_m").html(html);//para modificar las entidades
                            $('select[name=cbxModalidadEjecucion_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxModalidadEjecucion_m]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }

 /**************************************************************************************/

//add operacion y manteniemito
   var  AddMantOperacion=function(tbody,table){
                    $(tbody).on("click","button.ver_operacion_mantenimiento",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                      $("#txt_id_pip_OperMant").val(data.id_pi);
                        listar_pip_OperMant(id_pi);
                    });
                }

  //listar y agregar Tipologia no Pip
          var  AddTipologiaNOPIP=function(tbody,table){
                    $(tbody).on("click","button.ver_tipologia_nopip",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                      $("#txt_id_pip_Tipologia").val(data.id_pi);
                      $("#nombreProyectoTipologia").val(data.nombre_pi);
                        listar_TipologiaNoPip();//combox
                        listar_TipoNoPip(id_pi);
                    });
                }
      //listar y agregar ubicacion geográfica
              var  AddListarUbigeo=function(tbody,table){
                    $(tbody).on("click","button.ubicacion_geografica",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                      $("#txt_id_pip").val(data.id_pi);
                      $("#nombreProyecto").val(data.nombre_pi);
                        listar_provincia();
                        listar_ubigeo_pi(id_pi);

                    });
                }
                //listar y agregar ubicacion geográfica
              var  AddEstadoCiclo=function(tbody,table){
                    $(tbody).on("click","button.ver_estado_ciclo",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                      $("#txt_id_pip_Ciclopi").val(data.id_pi);
                      $("#nombreProyectoCiclo").val(data.nombre_pi);
                      listarEstadoCiclo();
                      listar_estado_ciclo(id_pi);
                    });
                }
                   //listar y agregar nuevo rubro
              var  AddRubroPI=function(tbody,table){
                    $(tbody).on("click","button.RegistarNuevoRubro",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                      $("#txt_id_pip_RubroPI").val(data.id_pi);
                      $("#nombreProyectoRubro").val(data.nombre_pi);
                        ListarRubro();
                        listarRubroPI(id_pi);
                    });
                }
                //listar y agregar modalidad de ejecución
              var  AddModalidadEjecucion=function(tbody,table){
                    $(tbody).on("click","button.nueva_modalidad_ejec",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                      $("#txt_id_pip_ModalidadEjec").val(data.id_pi);
                      $("#nombreProyectoModalidad").val(data.nombre_pi);
                        ListarModalidad();
                        listarModalidadPI(id_pi);
                    });
                }
                 //combox listar modalidad de ejecucion
                var ListarModalidad=function(valor){
                     html="";
                    $("#Cbx_ModalidadEjec").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/ModalidadEjecucion/GetModalidadE",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_modalidad_ejec"]+"> "+registros[i]["nombre_modalidad_ejec"]+" </option>";
                            };
                            $("#Cbx_ModalidadEjec").html(html);
                            $('select[name=Cbx_ModalidadEjec]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_ModalidadEjec]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                     //combox listar estado ciclo
                var listarEstadoCiclo=function(valor){
                     html="";
                    $("#Cbx_EstadoCiclo").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/bancoproyectos/listar_estado",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_estado_ciclo"]+"> "+registros[i]["nombre_estado_ciclo"]+" </option>";
                            };
                            $("#Cbx_EstadoCiclo").html(html);
                            $('select[name=Cbx_EstadoCiclo]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_EstadoCiclo]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                //cambiar de provincia a distrito
                  $("#cbx_provincia").change(function(){//para cargar los distritos
                      var nombre_distrito=$("#cbx_provincia").val();
                      listar_distrito(nombre_distrito);
                  });
                //combox listar provincias
                var listar_provincia=function(valor){
                     html="";
                    $("#cbx_provincia").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/bancoproyectos/listar_provincia",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["provincia"]+"> "+registros[i]["provincia"]+" </option>";
                            };
                            $("#cbx_provincia").html(html);
                            $('select[name=cbx_provincia]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbx_provincia]').change();
                            $('.selectpicker').selectpicker('refresh');

                        }
                    });
                }
                var listar_distrito=function(nombre_distrito){
                    var html="";
                    $("#cbx_distrito").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/bancoproyectos/listar_distrito",
                        type:"POST",
                        data :{nombre_distrito:nombre_distrito},
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_ubigeo"]+"> "+registros[i]["distrito"]+" </option>";
                            };
                            $("#cbx_distrito").html(html);
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
//listar en el combox para registrar rubro
 var ListarRubro=function(valor){
                     html="";
                    $("#Cbx_RubroPI").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/bancoproyectos/listar_rubro",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_rubro"]+"> "+registros[i]["nombre_rubro"]+" </option>";
                            };
                            $("#Cbx_RubroPI").html(html);
                            $('select[name=Cbx_RubroPI]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_RubroPI]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
/*
    var listarCicloInver=function(){
                     html="";
                    $("#cbxEstCicInv_").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/EstadoCicloInversion/get_EstadoCicloInversion",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_estado_ciclo"]+"> "+registros[i]["nombre_estado_ciclo"]+" </option>";
                            };
                            $("#cbxEstCicInv_").html(html);
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }*/
                //listar en el combox para registrar rubro
 var listar_TipologiaNoPip=function(valor){
                    var html="";
                    $("#Cbx_TipoNoPip").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/TipologiaInversion/get_tipo_no_pip",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_tipo_nopip"]+"> "+registros[i]["desc_tipo_nopip"]+" </option>";
                            };
                            $("#Cbx_TipoNoPip").html(html);
                            $('select[name=Cbx_TipoNoPip]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_TipoNoPip]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                 var listar_TipologiaNoPipRegistro=function(valor){
                    var html="";
                    $("#Cbx_TipoNoPip_i").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/TipologiaInversion/get_tipo_no_pip",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_tipo_nopip"]+"> "+registros[i]["desc_tipo_nopip"]+" </option>";
                            };
                            $("#Cbx_TipoNoPip_i").html(html);
                            $("#Cbx_TipoNoPip_m").html(html);//para modificar las entidades
                            $('select[name=Cbx_TipoNoPip_m]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_TipoNoPip_m]').change();
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
var format = function(num){
    var str = num.replace("", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0)
    {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++)
    {
        if(str[j] != ",")
        {
            output.push(str[j]);
            if(i%3 == 0 && j < (len - 1))
            {
                output.push(",");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};


$(function()
{
    $('#validarRegistroNoPip').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúreseeee que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            txtCodigoUnico:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Código único" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[0-9]+$/,
                        message: '<b style="color: red;">El campo "Código único" debe contener solo números.</b>'
                    }
                }
            },
            cbx:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Tipo de inversión" es requerido.</b>'
                    }
                }
            },
            cbxEstCicInv_:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Ciclo de inversión" es requerido.</b>'
                    }
                }
            },
            txtNombrePip:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre de inversión" es requerido.</b>'
                    }
                }
            },
            fecha_registro:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Fecha de Registro" es requerido.</b>'
                    }
                }
            },
            cbxNivelGob:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nivel de Gobierno" es requerido.</b>'
                    }
                }
            },
            cbxUnidadEjecutora:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Unidad Ejecutora" es requerido.</b>'
                    }
                }
            },
            cbxFuncion:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Función" es requerido.</b>'
                    }
                }
            },
            cbxDivFunc:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "División Funcional" es requerido.</b>'
                    }
                }
            },
            cbxGrupoFunc:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Grupo Funcional" es requerido.</b>'
                    }
                }
            },
            txtCostoPip:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Costo de inversión" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Costo de Inversión" debe ser númerico.</b>'
                    }
                }
            },
            txt_beneficiarios:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Beneficiarios" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
                        message: '<b style="color: red;">El campo "Beneficiarios" debe ser un número.</b>'
                    }
                }
            },
            cbxFuenteFinanc:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Fuente de financiamiento" es requerido.</b>'
                    }
                }
            },
            cbxRubro:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Rubro" es requerido.</b>'
                    }
                }
            },
            cbxModalidadEjec:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Modalidad de Ejecución" es requerido.</b>'
                    }
                }
            },
            Cbx_TipoNoPip_i:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Tipo" es requerido.</b>'
                    }
                }
            },
            cbx_estado:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Estado" es requerido.</b>'
                    }
                }
            }
        }
    });

    $('#validarEdicionNoPip').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            txtCodigoUnico_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Código único" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[0-9]+$/,
                        message: '<b style="color: red;">El campo "Código único" debe contener solo números.</b>'
                    }
                }
            },
            cbx_tipo_no_pip_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Estado" es requerido.</b>'
                    }
                }
            },
            cbxEstCicInv_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Inversión" es requerido.</b>'
                    }
                }
            },
            txtNombrePip_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Fecha de registro" es requerido.</b>'
                    }
                }
            },
            cbxNivelGob_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Naturaleza" es requerido.</b>'
                    }
                }
            },
            cbxUnidadEjecutora_m:
            {
                validators:
                {
                    notEmpty:
                    {
                    message: '<b style="color: red;">El campo "Nivel de Gobierno" es requerido.</b>'
                    }
                }
            },
            cbxFuncion_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Unidad Ejecutora" es requerido.</b>'
                    }
                }
            },
            cbxDivFunc_inicio:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Función" es requerido.</b>'
                    }
                }
            },
            cbxGrupoFunc_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "División" es requerido.</b>'
                    }
                }
            },
            txtCostoPip_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Costo de inversión" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Costo de Inversión" debe ser númerico.</b>'
                    }
                }
            },
            txt_beneficiarios_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Número de beneficiarios" es requerido.</b>'
                    }
                }
            },
            cbxFuenteFinanciamiento_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Fuente de financiamiento" es requerido.</b>'
                    }
                }
            },
            cbxRubroEjecucion_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Rubro" es requerido.</b>'
                    }
                }
            },
            cbxModalidadEjecucion_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Modalidad de Ejecución" es requerido.</b>'
                    }
                }
            }
        }
    });


});
