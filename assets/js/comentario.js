function enviarComentario(id){
	var c = $('#comentario').val();
  $('#div-comentario').removeClass('has-error');;
  $("#comentarioHelp").html('');
	if(c == ""){
    $('#div-comentario').addClass('has-error');
		$('#comentario').focus();
		$("#comentarioHelp").html('Ingrese un texto en la reseña...');
	}else{
		var parametros = {
		 	"id_user_comentado" : id,
		 	"comentario": c
		 };
		 $.ajax({
	    	data: parametros,
	    	url:'./ajax/enviar_comentario.php',
	    	type: 'post',
				dataType: 'json',
	    	success:  function (response) {
          if(response.status == "ok"){
            $('#sin-rese').remove();
            var ins = `
            <hr/>
            <li class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object img-rounded" src="./assets/images/users/`+response.avatar+`" width="48px">
                </a>
              </div>
              <div class="media-body">
                <h5 class="media-heading">`+response.nombre+` <small class="text-muted pull-right">`+response.fecha+`</small></h5>
                <p>`+response.descripcion+`</p>
              </div>
            </li>
            `;
            $("#ul-comentarios").prepend(ins);
          }
	    	}
	 	});
	}
}
