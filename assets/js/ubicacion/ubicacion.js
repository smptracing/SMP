$(document).on("ready",inicio);

function inicio(){
 
    html="";

    $("#btn-AddUbigeo").click(function(){//para  provincias en el combo
		    html="";
			   departamento();	 
		});
   
	    $("#departamento").change(function(){//para  provincias en el combo
		    html="";
			IdDepartamento= $("#departamento").val();
			MosProvincias(IdDepartamento);
		     $('.selectpicker').selectpicker('refresh');	 
		});
		 $("#provincia").change(function(){//para  distraitos en el combo
            
		    html="";
			 IdProvincia= $("#provincia").val();
			 MosDistritos(IdProvincia);
		});

}

function   MosDistritos(IdProvincia){
	 event.preventDefault();
		
		$.ajax({
		url:base_url+"index.php/MUbicacion/get_distritos",
		type:"POST",
		data:{IdProvincia:IdProvincia},
		success:function(respuesta){
			//alert(respuesta);
			var registros = eval(respuesta);
			for (var i = 0; i < registros.length; i++) {
              html +="<option value="+registros[i]["distritos"]+"> "+registros[i]["distritos"]+" </option>";   
			};
			$("#distrito").html(html);
             $('.selectpicker').selectpicker('refresh');
				
		}
	});
}
function  MosProvincias(IdDepartamento){
	 event.preventDefault();
		
		$.ajax({
		url:base_url+"index.php/MUbicacion/get_provincias",
		type:"POST",
		data:{IdDepartamento:IdDepartamento},
		success:function(respuesta){
			var registros = eval(respuesta);
			for (var i = 0; i < registros.length; i++) {
              html +="<option value="+registros[i]["provincias"]+"> "+registros[i]["provincias"]+" </option>";   
			};
			$("#provincia").html(html);
            $('.selectpicker').selectpicker('refresh');
		}
	});
}
function departamento()
{
 event.preventDefault();
		$.ajax({
		url:base_url+"index.php/MUbicacion/get_departamento",
		type:"POST",
		success:function(respuesta){
			//alert(respuesta);
			var registros = eval(respuesta);
			for (var i = 0; i < registros.length; i++) {
              html +="<option value="+registros[i]["departamentos"]+"> "+registros[i]["departamentos"]+" </option>";
			};
			
			$("#departamento").html(html);
			$('.selectpicker').selectpicker('refresh');			
		}
	});
}