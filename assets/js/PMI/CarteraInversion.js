 $(document).on("ready" ,function(){

              listaCarteraInversion(); //LLAMAR AL METODO LISTAR MODALIDAD DE EJECUCION
             //creacion de cartera //
 /*
                      $("#form-RegistraCarteraInv").submit(function(event)//AÑADIR NUEVA CARTERA
                       {
                            event.preventDefault();
                            var formData=new FormData($("#form-RegistraCarteraInv")[0]);
                            $.ajax({
                                type:"POST",
                                enctype: 'multipart/form-data',
                                url:base_url+"index.php/CarteraInversion/AddCartera",
                                data: formData,
                                cache: false,
                                contentType:false,
                                processData:false,
                                success:function(resp){
                                 swal("",resp, "success");
                                 $('#table-CarteraInv').dataTable()._fnAjaxUpdate();
                               }

                            });
                                   $('#form-RegistraCarteraInv')[0].reset();
                                   $("#VentanaRegistraCarteraInv").modal("hide");

                       });

*/
            });

//-------------- MANTENIMIENTO MODALIDAD DE EJECUCION--------------------------

/*LISTAR CARTERA ACTUAL*/
         // TRAER DATOS DE LA CARTERA ACTUAL PARA SU PROGRAMACION
                /* listar y lista en tabla entidadr*/
var listaCarteraInversion=function()
{
	var table=$("#table-CarteraInv").DataTable(
	{
		"processing" : true,
		"serverSide" : false,
		"destroy" : true,
		"language" : idioma_espanol,
		"ajax" :
		{
			"url" : base_url+"index.php/CarteraInversion/GetCarteraInversion",
			"method" : "POST",
			"dataSrc" : ""
		},
		"columns" : [
    { "data" : "id_cartera" },
		{
			"data" : "anios", "mRender" : function(data, type, full)
			{
				return '<a  style="font-weight:normal;font-size:15,background-color: #d8da3d"  href="getCarteraAnio/' + data + '">' + data + '</a>';
			}
		},
		{ "data" : "fecha_inicio_cartera" },
		{ "data" : "fecha_cierre_cartera" },
		{
			"data" : "estado_cartera", "mRender" : function(value, type, object)
			{
				return (value==1 ? 'Activo' : 'Inactivo');
			}
		},
		{ "data" : "numero_resolucion_cartera" },
		//{ "data" : "url_resolucion_cartera" },
		{"data":'url_resolucion_cartera',render: function ( data, type, row )
			{
				if(row.url_resolucion_cartera=='' || row.url_resolucion_cartera==null)
				{
					return '<p>No hay archivo</p>';
				}
				else
					url= base_url+"uploads/cartera/"+row.url_resolucion_cartera;
					return "<a href='"+url+"' target='_blank'><i class='fa fa-file fa-2x'></i></a>";

			}
		},
		{"data":'anios',render: function ( data, type, row ) {
			   /* return "<button type='button'  data-toggle='tooltip'  class='editar btn btn-primary btn-xs' data-toggle='modal' onclick=paginaAjaxDialogo('null','Modificar',{id_cartera:"+row.id_cartera+"},'"+base_url+"index.php/CarteraInversion/itemCartera','GET',null,null,false,true);><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button'  data-toggle='tooltip'  class='editar btn btn-success btn-xs' data-toggle='modal' onclick=paginaAjaxDialogo('null','Modificar',{id_cartera:"+row.id_cartera+"},'"+base_url+"index.php/CarteraInversion/editarCartera','GET',null,null,false,true);><i class='ace-icon fa fa-pencil bigger-120'></i></button>";*/
				return "<button type='button'  data-toggle='tooltip'  class='editar btn btn-success btn-xs' data-toggle='modal' onclick=paginaAjaxDialogo('null','Modificar',{id_cartera:"+row.id_cartera+"},'"+base_url+"index.php/CarteraInversion/editarCartera','GET',null,null,false,true);><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>";
			}
		}

		],
	});

	$('#table-CarteraInv tbody').on('click', 'tr', function()
	{
		var data=table.row( this ).data();

		var txt_IdfuncionM=data.id_cartera;
	});

	CambioCartera("#table-CarteraInv",table);  //obtener data de funcion para agregar  AGREGAR
  EliminarCartera("#table-CarteraInv",table);
}
          //FIN TRAER DATOS DE LA CARTERA ACTUAL PARA SU PROGRAMACION
/*FIN DE LISTAR MODALIDAD EJECUCION EN UN DATATABLE*/
var EliminarCartera=function(tbody,table){
  $(tbody).on("click","button.eliminar",function(){
        var data=table.row( $(this).parents("tr")).data();
        var id_cartera=data.id_cartera;
         swal({
                title: "Desea eliminar el Registro ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                cancelButtonText:"Cerrar" ,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "SI,Eliminar",
                closeOnConfirm: false
              },
              function(){
                    $.ajax({
                          url:base_url+"index.php/CarteraInversion/EliminarCartera",
                          type:"POST",
                          data:{id_cartera:id_cartera},
                          success:function(respuesta){
                           var registros=jQuery.parseJSON(respuesta);
                           if(registros.flag==0){
                            swal("Elimando.",registros.msg, "success");
                            $('#table-CarteraInv').dataTable()._fnAjaxUpdate();
                           }
                           else{
                            swal("Error.",registros.msg, "error");
                            $('#table-CarteraInv').dataTable()._fnAjaxUpdate();
                           }
                           }
                        });
              });
    });
}
//-------------- FIN MANTENIMIENTO MODALIDAD DE EJECUCION----------------------
var CambioCartera=function(tbody,table){
                      $(tbody).on("click","a.CambioCartera",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var AnoCartera=data.anios;
                        $("#AnioCartera").val(AnoCartera);
                        console.log(AnioCartera);

                      });
}



function listarCarteraAnios()
{
	event.preventDefault();

	var htmlTemp='';

	var anioActualTemp=$('#Aniocartera').val();

	$.ajax(
	{
		"url" : base_url+"index.php/CarteraInversion/GetCarteraAnios",
		type : "POST",
		success : function(respuesta)
		{

			var registros=eval(respuesta);

			for(var i=0; i<registros.length;i++)
			{
				htmlTemp +="<option "+(anioActualTemp==registros[i]["anios"] ? "selected" : "")+" value="+registros[i]["anios"]+"> "+ registros[i]["anios"]+" </option>";
			}

			$("#cbCartera").html(htmlTemp);

			$('.selectpicker').selectpicker('refresh');
		}
	});
}
