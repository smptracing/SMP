$(document).on("ready" ,function(){            
listaRubroE(); //LLAMAR AL METODO LISTAR RUBROS DE EJECUCION

listaFuenteCombo();//LISTAR EN EL COMBOBOX -- LISTA DE FUENTE FINANCIAMIENTO

//AGREGAR UN RUBRO DE EJECUCION
$("#form-addRubroE").submit(function(event)
{
	event.preventDefault();
  var formData=new FormData($("#form-addRubroE")[0]);
	$.ajax(
	{
    type:"POST",
    enctype:'multipart/form-data',
		url : base_url+"index.php/MRubroEjecucion/AddRubroE",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
		success : function(resp)
		{
      var registros=jQuery.parseJSON(resp);
      if(registros.flag==0)
      {
      swal("", registros.msg, "success");
      $('#form-addRubroE')[0].reset();
      $('#VentanaRegistraRubroEjecucion').modal('hide');
      }
      else{
      swal("", registros.msg, "error");
      }
    		
			$('#table-Rubro').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
		}
	});
});     
//FIN DE AGREGAR UN RUBRO DE EJECUCION 


//-------------- MANTENIMIENTO DE RUBRO DE  EJECUCION----------------------


//ACTUALIZAR UN RUBRO DE EJECUCION
$("#form-ActualizarRubroE").submit(function(event)
{
	event.preventDefault();
  var formData=new FormData($("form-ActualizarRubroE")[0]);
	$.ajax(
	{
      type:"POST",
      enctype:'multipart/form-data',
		  url : base_url+"index.php/MRubroEjecucion/UpdateRubroE",
      data: formData,
      cache: false,
      contentType:false,
      processData:false,
		success : function(resp)
		{
      var registros=jQuery.parseJSON(resp);
      if(registros.flag==0){
       swal("", registros.msg, "success");    
       $('#form-ActualizarRubroE')[0].reset();
       $('#VentanaModificarRubroE').modal('hide');
      }
      else{
       swal("",registros.msg,"error");
      }
			$('#table-Rubro').dataTable()._fnAjaxUpdate();
		}
	});

});


});
//FIN ACTUALIZAR UN RUBRO DE EJECUCION
/*LISTAR LOS RUBROS DE EJECUION EN UN DATATABLE*/
var listaRubroE=function() 
                {
                    var table=$("#table-Rubro").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/MRubroEjecucion/GetRubroE",
                                    "method":"POST",
                                     "dataSrc":""
                                    },
       //para llenado y busqueda por todo los campos
                                "columns":[
                                    {"data":"id_rubro" ,"visible": false},
                                    {"data":"nombre_fuente_finan"},
                                    {"data":"nombre_rubro"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarRubroE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],
                                "language":idioma_espanol
                    });  
                    RubroEData("#table-Rubro",table); //TRAER LA DATA RUBRO DE EJECUCION PARA ACTUALIZARLA
                    EliminarRubro("#table-Rubro",table);
                }
/*FIN DE LISTAR LOS RUBROS DE EJECUION EN UN DATATABLE*/

    // CAMPOS QUE SE ACTUALIZARAN EN EL RUBRO DE EJECUCION
       var RubroEData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_rubro=$('#txt_IdRubroEModif').val(data.id_rubro);
                        var nombre_rubro=$('#txt_NombreRubroEU').val(data.nombre_rubro);
                    });
                }
    // FIN DE CAMPOS QUE SE ACTUALIZARAN EN EL RUBRO DE EJECUCION
    // ELIMINAR
    var EliminarRubro=function(tbody,table){
      $(tbody).on("click","button.eliminar",function(){
        var data=table.row($(this).parents("tr")).data();
        var id_rubro=data.id_rubro;
        swal({
                     title: "Desea eliminar el Registro?",
                     text: "",
                     type: "warning",
                     showCancelButton: true,
                     confirmButtonColor: "#DD6B55",
                     confirmButtonText: "Yes,Eliminar",
                     closeOnConfirm: false           
          },
          function(){
            $.ajax({
              url:base_url+"index.php/MRubroEjecucion/EliminarRubroEjecucion",
              type:"POST",
              data:{id_rubro:id_rubro},
              success:function(resp){
                var registros=jQuery.parseJSON(resp);
                if(registros.flag==0)
                {
                  swal("",registros.msg,"success");
                  $('#table-Rubro').dataTable()._fnAjaxUpdate();
                }
                else{
                  swal("",registros.msg,"error");
                  $('#table-Rubro').dataTable()._fnAjaxUpdate();
                }
              }
            });
        });
      });
    }
    // 
    //Listar fuentes de financiamiento en el combobox
        listaFuenteCombo=function()
                 {
                    var htmlfuen="";
                    $("#listaFuenteFinanc").html(htmlfuen);
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/FuenteFinanciamiento/get_FuenteFinanciamiento",
                        type:"POST",
                        success:function(respuesta){
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              htmlfuen +="<option value="+registros[i]["id_fuente_finan"]+"> "+registros[i]["nombre_fuente_finan"]+" </option>";   
                            };
                            $("#listaFuenteFinanc").html(htmlfuen);
                            $('.selectpicker').selectpicker('refresh');       
                        }
                    });
                 }
 //Listar fuentes de financiamiento en el combobox  
//-------------- FIN MANTENIMIENTO DE RUBRO DE  EJECUCION----------------------



       


