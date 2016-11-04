function enviarDatosLogin(){
    //alert("Ingresaste");
	var user = $('#user').val();
	var pass = $('#pass').val();
	if(user == ""){
		$('#user').focus();
		$("#resultado").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Cuidado!</strong> Necesitas ingresar un usuario. </div>');
	}else if(pass == ""){
		$('#pass').focus();
		$("#resultado").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Cuidado!</strong> Necesitas ingresar una contraseña. </div>');
	}else{
		var parametros = {
		 	"user" : user,
		 	"pass": pass
		 };

		 $.ajax({
	    	data: parametros,
	    	url:'./ajax/login.php',
	    	type: 'post',
				dataType: 'json',
	    	beforeSend: function () {
	    		$("#resultado").html('<center><i class="fa fa-spinner fa-spin fa-x2" aria-hidden="true"></i></center><br/>');
		 		},
	    	success:  function (response) {
	          if(response.status == "error"){
	             $("#resultado").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error!</strong> Los datos son incorrectos. </div>');
	          }else{
				$(location).attr("href", './');
	          }

	    	}
	 	});
	}
}
