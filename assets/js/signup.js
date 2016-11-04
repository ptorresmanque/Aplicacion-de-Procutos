function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function enviarDatosSignup(){
  var name = $('#name').val();
  var email = $('#email').val();
  var pass = $('#pass').val();
  var pass2 = $('#pass2').val();
  var pass2 = $('#pass2').val();
  $('#div-name').removeClass('has-error');
  $('#help-name').html('');
  $('#div-email').removeClass('has-error');
  $('#help-email').html('');
  $('#div-pass').removeClass('has-error');
  $('#help-pass').html('');
  $('#div-pass2').removeClass('has-error');
  $('#help-pass2').html('');
  if(name == ""){
    $('#div-name').addClass('has-error');
    $('#name').focus();
    $('#help-name').html('El nombre no puede estar en blanco...');
  }else if(email == ""){
    $('#div-email').addClass('has-error');
    $('#email').focus();
    $('#help-email').html('El correo electronico no puede estar en blanco...');
  }else if(!isEmail(email)){
    $('#div-email').addClass('has-error');
    $('#email').focus();
    $('#help-email').html('El correo electronico es invalido...');
  }else if(pass == ""){
    $('#div-pass').addClass('has-error');
    $('#pass').focus();
    $('#help-pass').html('La contaseña no puede estar en blanco...');
  }else if(pass.length < 8){
    $('#div-pass').addClass('has-error');
    $('#pass').focus();
    $('#help-pass').html('La contaseña es muy corta...');
  }else if(pass != pass2){
    $('#div-pass2').addClass('has-error');
    $('#pass2').focus();
    $('#help-pass2').html('Las contaseñas son diferentes...');
  }else{
    var parametros = {
		 	"name" : name,
		 	"email": email,
      "pass": pass
		 };
		 $.ajax({
	    	data: parametros,
	    	url:'./ajax/signup.php',
	    	type: 'post',
				dataType: 'json',
	    	success:  function (response) {
          if(response.status == "ok"){
            window.location.replace("./");
          }else if(response.status == "erroremail"){
             $('#div-email').addClass('has-error');
             $('#email').focus();
             $('#help-email').html('El correo electronico ya existe...');
          }
	    	}
	 	});
  }
}
