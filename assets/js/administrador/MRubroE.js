$(document).on("ready" ,function(){            
listaRubroE(); //LLAMAR AL METODO LISTAR RUBROS DE EJECUCION

listaFuenteCombo();//LISTAR EN EL COMBOBOX -- LISTA DE FUENTE FINANCIAMIENTO

//AGREGAR UN RUBRO DE EJECUCION
$("#form-addRubroE").submit(function(event)
{
	event.preventDefault();

	$.ajax(
	{
		url : base_url+"index.php/MRubroEjecucion/AddRubroE",
		type : $(this).attr('method'),
		data : $(this).serialize(),
		success : function(resp)
		{
			swal("REGISTRADO!", resp, "success");
			
			$('#table-Rubro').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 

			$('#VentanaRegistraRubroEjecucion').modal('hide');
		}
	});
});     
//FIN DE AGREGAR UN RUBRO DE EJECUCION 
});

//-------------- MANTENIMIENTO DE RUBRO DE  EJECUCION----------------------
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
                }
/*FIN DE LISTAR LOS RUBROS DE EJECUION EN UN DATATABLE*/


//ACTUALIZAR UN RUBRO DE EJECUCION
$("#form-ActualizarRubroE").submit(function(event)
{
	event.preventDefault();

	$.ajax(
	{
		url : base_url+"index.php/MRubroEjecucion/UpdateRubroE",
		type : $(this).attr('method'),
		data : $(this).serialize(),
		success : function(resp)
		{
			swal("MODIFICADO!", resp, "success");
			
			$('#table-Rubro').dataTable()._fnAjaxUpdate();

			$('#VentanaModificarRubroE').modal('hide');
		}
	});
});
//FIN ACTUALIZAR UN RUBRO DE EJECUCION

    // CAMPOS QUE SE ACTUALIZARAN EN EL RUBRO DE EJECUCION
        RubroEData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_rubro=$('#txt_IdRubroEModif').val(data.id_rubro);
                        var nombre_rubro=$('#txt_NombreRubroEU').val(data.nombre_rubro);
                    });
                }
    // FIN DE CAMPOS QUE SE ACTUALIZARAN EN EL RUBRO DE EJECUCION
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
                          //alert(respuesta);
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



       


