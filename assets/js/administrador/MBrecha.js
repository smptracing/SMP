$(document).on("ready" ,function()
{
    listaBrecha();
    $("#btn-NuevaBrecha").click(function()//para que cargue el como una vez echo click sino repetira datos
    {
        listaSerPubAsocCombo();    
    });

    $("#frmAddBrecha").submit(function(event)
    {
        event.preventDefault();
        $('#validarBrecha').data('formValidation').resetField($('#cbxServPubAsoc'));
        $('#validarBrecha').data('formValidation').resetField($('#txt_NombreBrecha'));
        $('#validarBrecha').data('formValidation').resetField($('#txtArea_DescBrecha'));
        
        $('#validarBrecha').data('formValidation').validate();
        if(!($('#validarBrecha').data('formValidation').isValid()))
        {
            return;
        }

        $.ajax({
            url:base_url+"index.php/MantenimientoBrecha/AddBrecha",
            type:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(resp)
            {
                var registros = eval(resp);
                for (var i = 0; i < registros.length; i++) 
                {
                   if(registros[i]["VALOR"]==1)
                   {
                       swal("",registros[i]["MENSAJE"], "success");
                       $('#frmAddBrecha')[0].reset();
                       $("#VentanaRegistraBrecha").modal("hide");
                   }
                   else
                   {
                        swal('',registros[i]["MENSAJE"],'error' )
                   }
                };
                $('#table-brecha').dataTable()._fnAjaxUpdate();
            }
        });
    });
    
    $("#form-ActualizarBrecha").submit(function(event)
    {
        event.preventDefault();
        $('#ActualizarBrecha').data('formValidation').resetField($('#cbxSerPubAsocModificar'));
        $('#ActualizarBrecha').data('formValidation').resetField($('#txt_IdBrechaModif'));
        $('#ActualizarBrecha').data('formValidation').resetField($('#txtArea_DescBrechaU'));        
        $('#ActualizarBrecha').data('formValidation').validate();
        if(!($('#ActualizarBrecha').data('formValidation').isValid()))
        {
            return;
        }
        $.ajax({
            url:base_url+"index.php/MantenimientoBrecha/UpdateBrecha",
            type:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(resp)
            {
                swal("ACTUALIZADO!", resp, "success");
                $('#form-ActualizarBrecha')[0].reset();
                $("#VentanaModificarBrecha").modal("hide");
                $('#table-brecha').dataTable()._fnAjaxUpdate();
            }
        });
    });    
});

$(function()
{
    $('#validarBrecha').formValidation(
    {
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            cbxServPubAsoc:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Servicio Público asociado" es requerido.</b>'
                    }
                }
            },
            txt_NombreBrecha:
            {
                validators: 
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
                    }
                }
            },
            txtArea_DescBrecha:
            {
                validators: 
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Descripcion" es requerido.</b>'
                    }
                }
            }
        }
    });
    $('#ActualizarBrecha').formValidation(
    {
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            cbxSerPubAsocModificar:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Servicio Público Asociado" es requerido.</b>'
                    }
                }
            },
            txt_IdBrechaModif:
            {
                validators: 
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
                    }
                }
            },
            txtArea_DescBrechaU:
            {
                validators: 
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Descripcion" es requerido.</b>'
                    }
                }
            }
        }
    });
});


//TRAER DATOS EN UN COMBO DE SERVICIOS PUBLICO ASOCIADO
var listaSerPubAsocCombo=function(id_serv_pub_asoc) //PARA RECIR  PARAMETRO PARA MANTENER VALOR DEL CAMBO
{
    html="";
    $("#cbxServPubAsoc").html(html); //nombre del selectpicker RUBRO DE EJECUCION
    $("#cbxSerPubAsocModificar").html(html); 
    event.preventDefault(); 
    $.ajax({
        "url":base_url +"index.php/ServicioPublico/GetServicioAsociado",
        type:"POST",
        success:function(respuesta){
           // alert(respuesta);
         var registros = eval(respuesta);
            for (var i = 0; i <registros.length;i++) {
              html +="<option value="+registros[i]["id_serv_pub_asoc"]+"> "+ registros[i]["nombre_serv_pub_asoc"]+" </option>";   
            };
            $("#cbxServPubAsoc").html(html);//
            //MODIFICAR 
            $("#cbxSerPubAsocModificar").html(html);
            $('select[name=cbxSerPubAsocModificar]').val(id_serv_pub_asoc) // VALOR DEL COMBO SELECCIONADO
             $('select[name=cbxSerPubAsocModificar]').change();
             //FIN MODIFICAR
            $('.selectpicker').selectpicker('refresh'); 
        }
    });
}
   /*listar las brechas en el datatable*/
var listaBrecha=function() 
{
    var table=$("#table-brecha").DataTable({
    "processing":true,
    "serverSide":false,
    destroy:true,
        "ajax":{
            "url":base_url +"index.php/MantenimientoBrecha/GetBrecha",
            "method":"POST",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_brecha"},
            {"data":"id_serv_pub_asoc"},
            {"data":"nombre_serv_pub_asoc"}, //DATO DEL SERVICIO PUB ASOCIADO PARA ENVIAR DATO AL COMBO ACTUALIZAR Y SE MANTENGA EL VALOR
            {"data":"nombre_brecha"},
            {"data":"descripcion_brecha"},
            {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarBrecha'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
        ],

        "language":idioma_espanol
    });  
    BrechaData("#table-brecha",table); //TRAER LA DATA DE LAS BRECHAS PARA ACTUALIZAR
    EliminarBrechaLista("#table-brecha",table);//TRAER LA DATA DE LAS BRECHAS PARA ELIMINAR             
}
   /*fin de listar las brechas en el datatable*/

              

          // CAMPOS QUE SE ACTUALIZARAN DE LAS BRECHAS
                var BrechaData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_brecha=$('#txt_IdBrechaModif').val(data.id_brecha);
                        var id_serv_pub_asoc=data.id_serv_pub_asoc;
                        var nombre_brecha=$('#txt_NombreBrechaU').val(data.nombre_brecha);
                        var descripcion_brecha=$('#txtArea_DescBrechaU').val(data.descripcion_brecha);
                        listaSerPubAsocCombo(id_serv_pub_asoc);//llamar al evento de combo box para actualizar 
               
                    });
                }
          // FIN DE CAMPOS QUE SE ACTUALIZARAN DE LAS BRECHAS



  //ELIMINAR UNA BRECHA 
            var EliminarBrechaLista=function(tbody,table){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_brecha=data.id_brecha;
                        swal({
                                title: "Esta seguro que desea eliminar la brecha?",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "SI,ELIMINAR",
                                closeOnConfirm: false
                              },
                              function(){
                        $.ajax({
                        url:base_url+"index.php/MantenimientoBrecha/DeleteBrecha",
                        type:"POST",
                        data:{id_brecha:id_brecha},
                        success:function(respuesta)
                        {
                           swal("ELIMINADO!", "Se elimino correctamente la brecha.", "success");
                          $('#table-brecha').dataTable()._fnAjaxUpdate();
                        }//para actualizar mi datatablet datatablet
                    });
                  });
                 });
              }