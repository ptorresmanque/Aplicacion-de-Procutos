function sendValoration(id){
  var nota = $('#nota').val();
  $('#div-nota').removeClass('has-error');
  $('#help-nota').html('')
  if(!isNaN(nota)){
    if(nota != ""){
      if(nota.length == 1){
        if(nota >= 1 && nota <= 7){
          var parametros = {
      		 	"id_user_valorado" : id,
      		 	"nota": nota
      		 };
      		 $.ajax({
      	    	data: parametros,
      	    	url:'./ajax/enviar_valoracion.php',
      	    	type: 'post',
      				dataType: 'json',
      	    	success:  function (response) {
                if(response.status == "ok"){
                  $('#response-nota').html('Valorado Correctamente!');
                  $('#response-nota').addClass('text-success');
                  $('#nota-v').html(response.nota);
                  $('#nota-t').html('Nota de Valoración');
                  $('#div-nota').removeClass('has-error');
                  $('#nota').val('');
                  $('#help-nota').html('Es necesario ingresar un numero entre 1 y 7 sin decimales')
                  $('#myModal').modal('toggle');
                  setTimeout(function(){
                    $('#response-nota').html('');
                    $('#response-nota').removeClass('text-success');
                  }, 3000);
                }
      	    	}
      	 	});
        }else{
          $('#div-nota').addClass('has-error');
          $('#help-nota').html('Error: La nota tiene que encontrarse en el rango de 1 a 7')
        }
      }else{
        $('#div-nota').addClass('has-error');
        $('#help-nota').html('Error: La nota contiene decimales o es mayor a 9')
      }
    }else{
      $('#div-nota').addClass('has-error');
      $('#help-nota').html('Error: La nota se encuentra en blanco.')
    }
  }else{
    $('#div-nota').addClass('has-error');
    $('#help-nota').html('Error: Ingrese un valor numerico')
  }
}
