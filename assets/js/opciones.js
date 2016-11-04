function cambiarPassword(){
  var pass = $('#pass').val();
  var pass1 = $('#pass1').val();
  var pass2 = $('#pass2').val();
  $('#div-pass').removeClass('has-error');
  $('#help-pass').html('');
  $('#div-pass1').removeClass('has-error');
  $('#help-pass1').html('');
  $('#div-pass2').removeClass('has-error');
  $('#help-pass2').html('');

  if(pass == ""){
    $('#div-pass').addClass('has-error');
    $('#pass').focus();
    $('#help-pass').html('La contaseña no puede estar en blanco...');
  }else if(pass1 == ""){
    $('#div-pass1').addClass('has-error');
    $('#pass1').focus();
    $('#help-pass1').html('La contaseña no puede estar1 en blanco...');
  }else if(pass1.length < 8){
    $('#div-pass1').addClass('has-error');
    $('#pass1').focus();
    $('#help-pass1').html('La contaseña es muy corta...');
  }else if(pass1 != pass2){
    $('#div-pass2').addClass('has-error');
    $('#pass2').focus();
    $('#help-pass2').html('Las contaseñas son diferentes...');
  }else{
    var parametros = {
		 	"pass" : pass,
      "pass2": pass1
		 };
		 $.ajax({
	    	data: parametros,
	    	url:'./ajax/change_password.php',
	    	type: 'post',
				dataType: 'json',
	    	success:  function (response) {
          if(response.status == "ok"){
            $("#response").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Contraseña Cambiada!</strong> La contraseña se cambio con exito! </div>');
            $('#div-pass').removeClass('has-error');
            $('#help-pass').html('');
            $('#div-pass1').removeClass('has-error');
            $('#help-pass1').html('');
            $('#div-pass2').removeClass('has-error');
            $('#help-pass2').html('');
            $('#pass').val('');
            $('#pass1').val('');
            $('#pass2').val('');
          }else if(response.status == "errorpassword"){
            $('#div-pass').addClass('has-error');
            $('#pass').focus();
            $('#help-pass').html('La contaseña actual es incorrecta...');
          }
	    	}
	 	});
  }
}
