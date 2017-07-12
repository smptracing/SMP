$(document).on("ready",inicio);

function inicio()
{
	departamento();
   
	$("#departamento").change(function()
	{
		IdDepartamento=$("#departamento").val();

		MosProvincias(IdDepartamento);

		$('#provincia').removeAttr('disabled');
		$('#distrito').attr('disabled', 'disabled');

		$('#provincia').html('');
		$('#distrito').html('');

		$('.selectpicker').selectpicker('refresh');
	});

	$("#provincia").change(function()
	{
		$('#distrito').html('');
		
		if($("#provincia").val()==null)
		{
			$('#distrito').attr('disabled', 'disabled');
		}
		else
		{
			IdProvincia=$("#provincia").val();

			MosDistritos(IdProvincia);

			$('#distrito').removeAttr('disabled');
		}

		$('.selectpicker').selectpicker('refresh');
	});

	$("#distrito").change(function()
	{
		Iddistrito= $("#distrito").val();
		
		listarUbigeo(Iddistrito);
	});
}

function MosDistritos(IdProvincia)
{
	event.preventDefault();

	var htmlTemp='';

	$.ajax(
	{
		url:base_url+"index.php/MUbicacion/get_distritos",
		type:"POST",
		data: { IdProvincia : IdProvincia },
		success : function(respuesta)
		{
			var registros = eval(respuesta);

			for(var i=0; i<registros.length; i++)
			{
				htmlTemp +="<option value="+registros[i]["distritos"]+"> "+registros[i]["distritos"]+" </option>";   
			};

			$("#distrito").html(htmlTemp);

			$('.selectpicker').selectpicker('refresh');
		}
	});
}

function MosProvincias(IdDepartamento)
{
	event.preventDefault();

	var htmlTemp='';

	$.ajax(
	{
		url:base_url+"index.php/MUbicacion/get_provincias",
		type:"POST",
		data: { IdDepartamento : IdDepartamento },
		success : function(respuesta)
		{
			var registros=eval(respuesta);

			for(var i=0;i<registros.length; i++)
			{
				htmlTemp+="<option value="+registros[i]["provincias"]+"> "+registros[i]["provincias"]+" </option>";   
			};

			$("#provincia").html(htmlTemp);

			$('.selectpicker').selectpicker('refresh');
		}
	});
}

function departamento()
{
	event.preventDefault();

	var htmlTemp='';

	$.ajax(
	{
		url:base_url+"index.php/MUbicacion/get_departamento",
		type:"POST",
		success : function(respuesta)
		{
			var registros=eval(respuesta);

			for (var i=0; i< registros.length; i++)
			{
				htmlTemp+="<option value="+registros[i]["departamentos"]+"> "+registros[i]["departamentos"]+" </option>";
			};

			$("#departamento").html(htmlTemp);

			$('.selectpicker').selectpicker('refresh');			
		}
	});
}

//PARA OBTENER DATOS DE UBIGEO QUE ME SIRVAN PARA REGISTRAR
function listarUbigeo(Iddistrito){
	 $("#distritosM").val(Iddistrito);//para enviar la cadena de distrito en texbox
	 /*event.preventDefault();
		
		$.ajax({
		url:base_url+"index.php/MUbicacion/get_distritos",
		type:"POST",
		data:{IdProvincia:IdProvincia},
		success : function(respuesta){
			//alert(respuesta);
			var registros = eval(respuesta);
			for (var i = 0; i < registros.length; i++) {
              html+="<option value="+registros[i]["distritos"]+"> "+registros[i]["distritos"]+" </option>";   
			};
			$("#distrito").html(html);
             $('.selectpicker').selectpicker('refresh');
				
		}
	});*/
}