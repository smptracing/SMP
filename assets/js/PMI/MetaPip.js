$(document).on("ready" ,function()
{
    lista_formulacion_evaluacion();
    lista_ejecucion();
    lista_funcionamiento();
    $("#txt_pia").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });
    $("#txt_pim").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });
    $("#txt_certificado").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });
    $("#txt_compromiso").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });
    $("#txt_devengado").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });
    $("#txt_girado").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });

//agregar progrmacion para operacion y mantenimiento
      $("#form_AddProgramacion_operacion_mantenieminto").submit(function(event)
      {
          event.preventDefault();
          $.ajax({
              url:base_url+"index.php/programar_pip/AddProgramacion_operacion_mantenimiento",
              type:$(this).attr('method'),
              data:$(this).serialize(),
              success:function(resp){
               if (resp=='1') {
                 swal("REGISTRADO","Se regristró correctamente", "success");
               }
                if (resp=='2') {
                 swal("NO SE REGISTRÓ","NO se regristró ", "error");
               }
              $('#Table_Programar').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
              $('#table_formulacion_evaluacion').dataTable()._fnAjaxUpdate();
              $('#table_ejecucion').dataTable()._fnAjaxUpdate();
              $('#Table_funcionamiento').dataTable()._fnAjaxUpdate();
             }
          });
      });
     $("#form_AddProgramacion").submit(function(event)
      {
          event.preventDefault();
          $.ajax({
              url:base_url+"index.php/programar_pip/AddProgramacion",
              type:$(this).attr('method'),
              data:$(this).serialize(),
              success:function(resp){
               //alert(resp);
               if (resp=='1') {
                 swal("REGISTRADO","Se regristró correctamente", "success");
               //  formReset();
               }
                if (resp=='2') {
                 swal("NO SE REGISTRÓ","No se registró ", "error");
               }
              $('#Table_Programar').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
              $('#table_formulacion_evaluacion').dataTable()._fnAjaxUpdate();
              $('#table_ejecucion').dataTable()._fnAjaxUpdate();
              $('#Table_funcionamiento').dataTable()._fnAjaxUpdate();
             //    formReset();
             }
          });
      });
    $("#form_AddMeta_Pi").submit(function(event)
    {
        event.preventDefault();
        $('#validarAddMetaPip').data('formValidation').validate();
        if(!($('#validarAddMetaPip').data('formValidation').isValid()))
        {
          return;
        }
        $.ajax({
            url:base_url+"index.php/programar_pip/AddMeta_PI",
            type:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(resp)
            {
                if (resp=='1')
                {
                    swal("REGISTRADO","Se regristró correctamente", "success");
                    setTimeout("location.reload()", 5000);
                }
                if (resp=='2')
                {
                    swal("NO SE REGISTRÓ","NO se regristró ", "error");

                }
                $('#Table_meta_pi').dataTable()._fnAjaxUpdate();
                $('form_AddMeta_Pi')[0].reset();
                setTimeout("location.reload()", 5000);
            }
        });
    });
     function formReset()
     {
          //document.getElementById("form_AddProgramacion").reset();
          document.getElementById("form_AddMeta_Pi").reset();
     }

});
//listar proyectos de inversion en formulacion y evaluacion

 var lista_formulacion_evaluacion=function()
{
       var table=$("#table_formulacion_evaluacion").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/programar_pip/GetProyectosFormulacionEvaluacion",
                                    "method":"POST",
                                    "dataSrc":""
                                  },
                                "columns":[
                                    {"defaultContent":"<td>#</td>"},
                                    {"data":"codigo_unico_pi"},
                                    {"data":"nombre_pi"},
                                    {"data":"costo_pi"  , render: function (data, type, row) {
                    return "<div style='float:right;'>S/. "+data+"</div>";
                    }},
                                    {"data":"nombre_estado_ciclo"},
                                    /*
                                   {"data": function (data, type, dataToSet) {

                                      if (data.estado_programado !='0') //estap programado
                                      {
                                       // return '<a  href="#"><button type="button" class="btn btn btn-success btn-xs">Programado</button></a>';
                                       return '<h5><span class="label label-success"> Programado</span></h5>';
                                      }
                                      if (data.estado_programado =='0') //no esta progrmado
                                      {
                                        //return '<a  href="#"><button type="button" class="btn btn btn-danger btn-xs">No Programado</button></a>';
                                        return '<h5><span class="label label-danger">No Programado</span></h5>';
                                      }
                                   }},*/
                                    {"data": function (data, type, dataToSet) {
                                      //return "<button onclick=\"paginaAjaxDialogo(null,'Formulacion y Evaluacion',{codigo_unico_pi:"+data.codigo_unico_pi+"},base_url+'index.php/MetaPip/meta_pip_modal','GET',null,null,false,true)\"; class=\"meta_pip btn btn-primary btn-xs\"><span class=\"fa fa-edit\"></span>  Editar</button>"
                                      return "<a href='#Ventana_Meta_Presupuestal_PI' onclick='meta_pi_cup("+data.codigo_unico_pi+")'  class='meta_pip btn btn-success btn-xs' data-toggle='modal' data-id='"+data.codigo_unico_pi+"'><i class='fa fa-usd' aria-hidden='true'></i></a>"
                                      }
                                    }
                                ],
                               "language":idioma_espanol
                    });
        AddProgramacion("#table_formulacion_evaluacion",table);
        AddMeta_Pi("#table_formulacion_evaluacion",table);
}
//fin de proyectos de inversion en formulacion y evaluacion
//listar programación por cada proyecto
 var listar_programacion=function(id_pi)
                {
                    var table=$("#Table_Programar").DataTable({
                      "processing": true,
                      "serverSide":false,
                       destroy:true,
                         "ajax":{
                                     url:base_url+"index.php/programar_pip/listar_programacion",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                    {"data":"id_pi","visible": false},
                                    {"data":"cartera"},
                                    {"data":"nombre_brecha"},
                                    {"data":"año_prog"},
                                    {"data":"monto_prog"},
                                    {"data":"prioridad_prog"},
                                    {"defaultContent":"<button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                    EliminarProgramacion("#Table_Programar",table);
                }
//fin listar programación por cada proyecto
//Eliminar programacion
var EliminarProgramacion=function(tbody,table){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_pi=data.id_pi;
                        var id_cartera=data.id_cartera;
                      //  console.log(data);
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
                                          url:base_url+"index.php/programar_nopip/EliminarProgramacion",
                                          type:"POST",
                                          data:
                                          {id_cartera:id_cartera,id_pi:id_pi},
                                          success:function(respuesta){
                                            //alert(respuesta);
                                            swal("Se eliminó corectamente", ".", "success");
                                            $('#Table_Programar').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet
                                            $('#table_formulacion_evaluacion').dataTable()._fnAjaxUpdate();
                                            $('#table_ejecucion').dataTable()._fnAjaxUpdate();
                                            $('#Table_Programar_operacion_mantenimiento').dataTable()._fnAjaxUpdate();
                                            $('#Table_funcionamiento').dataTable()._fnAjaxUpdate();

                                          }
                                        });
                              });
                    });
                }
//listar prioridad con su cartera
 var lista_prioridad=function(anio)
                {
                    var table=$("#lista_prioridad_validar").DataTable({
                     // alert(anio);
                      "processing": true,
                      "serverSide":false,
                       destroy:true,
                         "ajax":{
                                     url:base_url+"index.php/programar_pip/listar_prioridad",
                                     type:"POST",
                                     data :{anio:anio}
                                    },
                                "columns":[
                                    {"data":"id_pi","visible": false},
                                    {"data":"cartera"},
                                    {"data":"prioridad"}
                                  ],
                               "language":idioma_espanol
                       });

                }
//fin listar prioridad
$("#Cbx_AnioCartera").change(function() {
                          var anio=$("#Cbx_AnioCartera").val();
                          lista_prioridad(anio);
                            //lista_ejecucion(anio);
                           //listar carteran de proyectos
                        });

//listar programación para operacion y manteniemitno
 var listar_programacion_operacion_mantenimiento=function(id_pi)
                {
                    var table=$("#Table_Programar_operacion_mantenimiento").DataTable({
                      "processing": true,
                      "serverSide":false,
                       destroy:true,
                         "ajax":{
                                     url:base_url+"index.php/programar_pip/listar_programacion_operacion_mantenimiento",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                  "columns":[
                                    {"data":"id_pi","visible": false},
                                    {"data":"cartera"},
                                    {"data":"nombre_brecha"},
                                    {"data":"año_prog"},
                                    {"data":"monto_opera_mant_prog"},
                                    {"data":"prioridad_prog"},
                                    {"defaultContent":"<button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                    EliminarProgramacion("#Table_Programar_operacion_mantenimiento",table);
                }
//fin listar programación  para operacion y manteniemitno
//listar proyectos de inversion en Ejecucion
 var lista_ejecucion=function()
{
       var table=$("#table_ejecucion").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/programar_pip/GetProyectosEjecucion",
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
                                  /*  {"data": function (data, type, dataToSet) {

                                      if (data.estado_programado !='0') //estap programado
                                      {
                                       // return '<a  href="#"><button type="button" class="btn btn btn-success btn-xs">Programado</button></a>';
                                       return '<h5><span class="label label-success"> Programado</span></h5>';
                                      }
                                      if (data.estado_programado =='0') //no esta progrmado
                                      {
                                        //return '<a  href="#"><button type="button" class="btn btn btn-danger btn-xs">No Programado</button></a>';
                                        return '<h5><span class="label label-danger">No Programado</span></h5>';
                                      }
                                   }},*/
                                    {"defaultContent":"<center><button type='button' title='Programar' class='meta_pip btn btn-success btn-xs' data-toggle='modal' data-target='#Ventana_Meta_Presupuestal_PI'><i class='fa fa-usd' aria-hidden='true'></i></button></center>"}
                                ],
                               "language":idioma_espanol
                    });
        AddProgramacion("#table_ejecucion",table);
        AddMeta_Pi("#table_ejecucion",table);
}
//fin de proyectos de inversion en Ejecucion

//listar proyectos de inversion en Funcionamiento
 var lista_funcionamiento=function() //operacion y mantenimiento
{
       var table=$("#Table_funcionamiento").DataTable({
                     "processing": true,
                      "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/programar_pip/GetProyectosFuncionamiento",
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
                                 /*   {"data": function (data, type, dataToSet) {

                                      if (data.estado_programado !='0') //estap programado
                                      {
                                       // return '<a  href="#"><button type="button" class="btn btn btn-success btn-xs">Programado</button></a>';
                                       return '<h5><span class="label label-success"> Programado</span></h5>';
                                      }
                                      if (data.estado_programado =='0') //no esta progrmado
                                      {
                                        //return '<a  href="#"><button type="button" class="btn btn btn-danger btn-xs">No Programado</button></a>';
                                        return '<h5><span class="label label-danger">No Programado</span></h5>';
                                      }
                                   }},*/
                                       {"defaultContent":"<center><button type='button' title='Programar' class='meta_pip btn btn-success btn-xs' data-toggle='modal' data-target='#Ventana_Meta_Presupuestal_PI'><i class='fa fa-usd' aria-hidden='true'></i></button></center>"}
                                ],
                               "language":idioma_espanol
                    });
     AddProgramacion_oper_man("#Table_funcionamiento",table);
     AddMeta_Pi("#Table_funcionamiento",table);
}
//fin de proyectos de inversion en Funcionamiento
//listar meta proyecto
 var listar_meta_pi=function(id_pi)
                {
                    var table=$("#Table_meta_pi").DataTable({
                      "processing": true,
                      "serverSide":false,
                      destroy:true,
                      "ajax":{
                                     url:base_url+"index.php/programar_nopip/listar_metas_pi",
                                     type:"POST",
                                     data :{id_pi:id_pi}
                                    },
                                "columns":[
                                    {"data":"id_meta_pi","visible": false},
                                    {"data":"anio"},
                                    {"data":"pia_meta_pres"},
                                    {"data":"pim_acumulado"},
                                    {"data":"certificacion_acumulado"},
                                    {"data":"compromiso_acumulado"},
                                    {"data":"devengado_acumulado"},
                                    {"data":"girado_acumulado"},
                                    {"defaultContent":"<button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                               "language":idioma_espanol
                    });
                    EliminarMetaPresupuestalPi("#Table_meta_pi",table);
                }
var EliminarMetaPresupuestalPi=function(tbody,table){
                  $(tbody).on("click","button.eliminar",function(){
                      var data=table.row( $(this).parents("tr")).data();
                        var id_meta_pi=data.id_meta_pi;
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
                                          url:base_url+"index.php/programar_pip/Eliminar_meta_prepuestal_pi",
                                          type:"POST",
                                          data:{id_meta_pi:id_meta_pi},
                                          success:function(respuesta){
                                            //alert(respuesta);
                                            swal("Se eliminó corectamente", ".", "success");
                                            $('#Table_meta_pi').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet
                                            $('#table_formulacion_evaluacion').dataTable()._fnAjaxUpdate();
                                            $('#table_ejecucion').dataTable()._fnAjaxUpdate();
                                            $('#Table_funcionamiento').dataTable()._fnAjaxUpdate();
                                          //location.reload();
                                          setTimeout("location.reload()", 5000);
                                          }
                                        });
                              });
                    });
                }
//Agregar META PIP
/* var  AddMeta_Pi=function(tbody,table){
                    $(tbody).on("click","button.meta_pip",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                       $("#txt_codigo_unico_pi_mp").val(data.codigo_unico_pi);
                      $("#txt_id_pip_programacion_mp").val(data.id_pi);
                      $("#txt_costo_proyecto_mp").val(data.costo_pi);
                      $("#txt_nombre_proyecto_mp").val(data.nombre_pi);
                       listar_Meta();
                       listar_meta_pi(id_pi);
                      $('#Table_meta_pi').dataTable()._fnAjaxUpdate();
                      refresh();

                  });
                }
*/
var  AddMeta_Pi=function(tbody,table)
{
    $(tbody).on("click","a.meta_pip",function()
    {
        var data=table.row( $(this).parents("tr")).data();
        var  id_pi=data.id_pi;
        $("#txt_codigo_unico_pi_mp").val(data.codigo_unico_pi);
        $("#txt_id_pip_programacion_mp").val(data.id_pi);
        $("#txt_costo_proyecto_mp").val("S/. "+data.costo_pi);
        $("#txt_nombre_proyecto_mp").val(data.nombre_pi);
        //meta_pi_cup(data.codigo_unico_pi);
        listar_Meta();
        listar_meta_presupuestal();
        listar_meta_pi(id_pi);
    });
}

var  meta_pi_cup=function(codigo_unico_pi)
{
      $.ajax(
      {
          url : base_url+'index.php/MetaPip/meta_pip',
          type : 'GET',
          data : {codigo_unico_pi: codigo_unico_pi},
          cache : false,
          async : true
      }).done(function(pagina)
      {
        //console.log(pagina);
      }).fail(function()
      {

      });
}

//add programar para formulacion y evaluacion
   var  AddProgramacion=function(tbody,table){
                    $(tbody).on("click","button.programar_pip",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                       $("#txt_codigo_unico_pi").val(data.codigo_unico_pi);
                      $("#txt_id_pip_programacion").val(data.id_pi);
                      $("#txt_costo_proyecto").val(data.costo_pi);
                      $("#txt_nombre_proyecto").val(data.nombre_pi);

                        listar_aniocartera();
                        listar_programacion(id_pi);

                    });
                }
                //add programar para operacion y manteniemito
   var  AddProgramacion_oper_man=function(tbody,table){
                    $(tbody).on("click","button.programar_pip_operacion_mantenimiento",function(){
                      var data=table.row( $(this).parents("tr")).data();
                       var  id_pi=data.id_pi;
                       $("#txt_codigo_unico_pi_").val(data.codigo_unico_pi);
                      $("#txt_id_pip_programacion_").val(data.id_pi);
                      $("#txt_costo_proyecto_").val(data.costo_pi);
                      $("#txt_nombre_proyecto_").val(data.nombre_pi);
                        listar_aniocartera_();
                        listar_programacion_operacion_mantenimiento(id_pi);
                  });
                }
                var listar_aniocartera_=function(valor){ //listar ani cartera operacion y mantenimiento
                     html="";
                    $("#Cbx_AnioCartera_").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/programar_pip/GetAnioCartera",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_cartera"]+"> "+registros[i]["anio"]+" </option>";
                            };
                            $("#Cbx_AnioCartera_").html(html);
                            $('select[name=Cbx_AnioCartera_]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_AnioCartera_]').change();
                            $('.selectpicker').selectpicker('refresh');
                            listar_Brecha_();//listar brecha
                        }
                    });
                }
                var listar_Brecha_=function(valor){
                     html="";
                    $("#cbxBrecha_").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/MantenimientoBrecha/GetBrecha",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_brecha"]+"> "+registros[i]["nombre_brecha"]+" </option>";
                            };
                            $("#cbxBrecha_").html(html);
                            $('select[name=cbxBrecha_]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxBrecha_]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                 var listar_aniocartera=function(valor){
                    var html="";
                    $("#Cbx_AnioCartera").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/programar_pip/GetAnioCartera",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_cartera"]+"> "+registros[i]["anio"]+" </option>";
                            };
                            $("#Cbx_AnioCartera").html(html);
                            $('select[name=Cbx_AnioCartera]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=Cbx_AnioCartera]').change();
                            $('.selectpicker').selectpicker('refresh');

                            listar_Brecha();//listar brecha
                             var anio=$("#Cbx_AnioCartera").val();
                             lista_prioridad(anio);
                            // alert(anio);

                        }
                    });
                }

                var listar_Brecha=function(valor){
                     html="";
                    $("#cbxBrecha").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/MantenimientoBrecha/GetBrecha",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_brecha"]+"> "+registros[i]["nombre_brecha"]+" </option>";
                            };
                            $("#cbxBrecha").html(html);
                            $('select[name=cbxBrecha]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbxBrecha]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                var listar_Meta=function(valor){
                    var html="";
                    $("#cbx_Meta").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Meta/listar_correlativo",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_correlativo_meta"]+"> "+registros[i]["cod_correlativo"]+" </option>";
                            };
                            $("#cbx_Meta").html(html);
                            $('select[name=cbx_Meta]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbx_Meta]').change();
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                }
                 /*para listar nombres de las metas*/
                var listar_meta_presupuestal=function(valor){
                     var html="";
                    $("#cbx_meta_presupuestal").html(html);
                    event.preventDefault();
                    $.ajax({
                        "url":base_url +"index.php/Meta/listar_meta_presupuestal",
                        type:"POST",
                        success:function(respuesta3){
                         //  alert(respuesta);
                         var registros = eval(respuesta3);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option  value="+registros[i]["id_meta_pres"]+"> "+registros[i]["nombre_meta_pres"]+" </option>";
                            };
                            $("#cbx_meta_presupuestal").html(html);
                            $('select[name=cbx_meta_presupuestal]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=cbx_meta_presupuestal]').change();
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
    $('#validarAddMetaPip').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            txt_anio_meta:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Año" es requerido.</b>'
                    }
                }
            },
            cbx_meta_presupuestal:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Meta Presupuestal" es requerido.</b>'
                    }
                }
            },
            cbx_Meta:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Correlativo Meta" es requerido.</b>'
                    }
                }
            },
            txt_pia:
            {
                validators:
                {

                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "PIA" debe ser númerico.</b>'
                    }
                }
            },
            txt_pim:
            {
                validators:
                {

                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "PIM" debe ser númerico.</b>'
                    }
                }
            },
            txt_certificado:
            {
                validators:
                {

                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Certificado" debe ser númerico.</b>'
                    }
                }
            },
            txt_compromiso:
            {
                validators:
                {

                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Compromiso" debe ser númerico.</b>'
                    }
                }
            },
            txt_devengado:
            {
                validators:
                {
                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Devengado" debe ser númerico.</b>'
                    }
                }
            },
            txt_girado:
            {
                validators:
                {
                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Girado" debe ser númerico.</b>'
                    }
                }
            }
        }
    });

    /*$('#validarEditarPip').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúreseeee que realmente no necesita este valor.</b>',
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
                    }
                }
            },
            cbx_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Tipo de inversión" es requerido.</b>'
                    }
                }
            },
            cbxEstCicInv_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Ciclo de inversión" es requerido.</b>'
                    }
                }
            },
            txtNombrePip_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre de inversión" es requerido.</b>'
                    }
                }
            },
            cbxNatI_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Naturaleza" es requerido.</b>'
                    }
                }
            },
            cbxNivelGob_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nivel de Gobierno" es requerido.</b>'
                    }
                }
            },
            cbxUnidadEjecutora_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Unidad Ejecutora" es requerido.</b>'
                    }
                }
            },
            cbxFuncion_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Función" es requerido.</b>'
                    }
                }
            },
            cbxDivFunc_inicio:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "División Funcional" es requerido.</b>'
                    }
                }
            },
            cbxGrupoFunc_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Grupo Funcional" es requerido.</b>'
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
                        message: '<b style="color: red;">El campo "Beneficiarios" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
                        message: '<b style="color: red;">El campo "Beneficiarios" debe ser un número.</b>'
                    }
                }
            },
            cbxTipologiaInversion_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Tipologia de inversión" es requerido.</b>'
                    }
                }
            },
            cbxProgramaPresupuestal_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Programa Presupuestal" es requerido.</b>'
                    }
                }
            },
            lista_unid_form_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Unidad Formuladora" es requerido.</b>'
                    }
                }
            },
            cbx_estado_pi_m:
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

    $('#validarAddOperacionMantenimiento').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúreseeee que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            txt_monto_operacion:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Monto de Operación" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Monto de Operación" debe ser númerico.</b>'
                    }
                }
            },
            txt_responsable_operacion:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Responsable de Operación" es requerido.</b>'
                    }
                }
            },
            txt_monto_mantenimiento:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Monto de Mantenimiento" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Monto de Mantenimiento" debe ser númerico.</b>'
                    }
                }
            },
            txt_responsable_mantenimiento:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Responsable de Mantenimiento" es requerido.</b>'
                    }
                }
            }
        }
    });*/
});
