$(document).on("ready",main);
function main(){
	$("#login").submit(function(event){
		event.preventDefault();
		$.ajax({
			url:$(this).attr("action"),
			type:$(this).attr("method"),
			data:$(this).serialize(),
			success:function(resp){
				if(resp=="error")
				{
					alert("Usuario y contrantraseña invalido");
				}
				else{
					window.location.href=base_url+"index.php/Inicio/"
				}
			}
		});
	});

	$("#Cerrar").on("click",function(event) {
	     event.preventDefault();
		$.ajax({
			"url":base_url+"index.php/Login/cerrar",
			type:"POST", 
			data:{},
			success:function(){
				window.location.href =base_url;
			}
		});


	});


}