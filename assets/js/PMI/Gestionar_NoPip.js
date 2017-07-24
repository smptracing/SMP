$(document).on("ready" ,function(){
     listar_no_pip(); //listar los no pip
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
                          $('#Table_TipoNoPip').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
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
                      $.ajax({
                          url:base_url+"index.php/bancoproyectos/Add_ubigeo_proyecto",
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
                          $('#TableUbigeoProyecto_x').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                             formReset();
                         }
                      });
                  });

                //registar proyectos en banco de proyectos
   $("#form-AddProyectosInversion").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/bancoproyectos/AddProyectos",
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
                          $('#table_no_pip').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
                             formReset();
                         }
                      });
                  });
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
                                    {"data":"longitud"}
                                    //{"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaupdateEstadoFE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
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
                                    {"defaultContent":"<td>#</td>"},
                                    {"data":"id_pi" ,"visible": false},
                                    {"data":"codigo_unico_pi"},
                                    {"data":"nombre_pi"},
                                    {"data":"costo_pi"},
                                    {"data":"nombre_estado_ciclo"},
                                    {"defaultContent":"<center><button type='button' title='Ubicación' class='ubicacion_geografica btn btn-primary btn-xs' data-toggle='modal' data-target='#venta_ubicacion_geografica'><i class='fa fa-map-marker' aria-hidden='true'></i></button><button type='button' title='Ver Rubro PI' class='RegistarNuevoRubro btn btn-info btn-xs' data-toggle='modal' data-target='#venta_registar_rubro'><i class='fa fa-spinner' aria-hidden='true'></i></button><button type='button' title='Modalidad de Ejecución' class='nueva_modalidad_ejec btn btn-warning btn-xs' data-toggle='modal' data-target='#ventanaModalidadEjecucion'><i class='fa fa-flag' aria-hidden='true'></i></button><button type='button' title='Ver Estado Ciclo' class='ver_estado_ciclo btn btn-success btn-xs' data-toggle='modal' data-target='#ventana_ver_estado_ciclo'><i class='fa fa-paw' aria-hidden='true'></i></button><button type='button' title='Ver Tipología No PIP' class='ver_tipologia_nopip btn btn-danger btn-xs' data-toggle='modal' data-target='#ventana_ver_tipologia'><i class='fa fa-random' aria-hidden='true'></i></button><button type='button' title='Operación y Mantenimiento' class='ver_operacion_mantenimiento btn btn-info btn-xs' data-toggle='modal' data-target='#ventana_ver_operacion_mantenimeinto'><i class='fa fa-building' aria-hidden='true'></i></button></center>"}
                                ],
                               "language":idioma_espanol
                    });
              AddListarUbigeo("#table_no_pip",table);
       AddEstadoCiclo("#table_no_pip",table);
       AddRubroPI("#table_no_pip",table);
      AddModalidadEjecucion("#table_no_pip",table);
      AddTipologiaNOPIP("#table_no_pip",table);
      AddMantOperacion("#table_no_pip",table);
}
//fin de table de lista NO PIP
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
                     html="";
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
                              html +="<option  value="+registros[i]["distrito"]+"> "+registros[i]["distrito"]+" </option>";
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
                //listar en el combox para registrar rubro
 var listar_TipologiaNoPip=function(valor){
                     html="";
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
