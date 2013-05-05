	
	/*
	 	*	Fecha: 2010-07-17 Titogelo
		*	
	 	*	Actualizar
	*/
	
	function ActualizarDatos(){
		var noticia_id = $('#noticia_id').attr('value');
		var titulo = $('#titulo').attr('value');
		var fecha = $('#fecha').attr('value'); 
		var descripcion = $("#descripcion").attr("value");
		
		$.ajax({
			url: 'modulos/Noticias/actualizar.php',
			type: "POST",
			data: "submit=&titulo="+titulo+"&fecha="+fecha+"&descripcion="+descripcion+"&noticia_id="+noticia_id,
			success: function(datos){
				$("#formulario").hide();
				$("#tabla").show();
				$("#muestra_mensaje_corroboracion_accion").html("<span>Actualizando noticia...</span> <img class='imagen_cargando' src='img/cargando.gif' />").fadeTo(4000,1,function(){
					$(this).html(datos).fadeTo(2000,1,function(){
						ConsultaDatos();
					});
				});
			}
		});
		return false;
	}
	
	function ActualizarUsuarioPass(){
		var usuario_id = $('#usuario_id').attr('value');
		var usuario = $('#usuario').attr('value');
		var oldpass = $('#oldpass').attr('value');
		var newpass1 = $('#newpass1').attr('value'); 
		var newpass2 = $("#newpass2").attr("value");
		
		$.ajax({
			url: 'modulos/SistemaUsuarios/actualiza_password.php',
			type: "POST",
			data: "submit=&oldpass="+oldpass+"&usuario="+usuario+"&newpass1="+newpass1+"&newpass2="+newpass2+"&usuario_id="+usuario_id,
			success: function(datos){
				$("#cambio_pass_datos_usuario").load('includes/mensaje_actualizacion.php').fadeTo(4000,1,function(){
					$("#cambio_pass_datos_usuario").html(datos).fadeTo(2000,1,function(){
						ConsultaDatosUsuario();
					});
				});
			}
		});
		return false;
	}
	
	function ActualizarUsuarioPerfil(){
		var usuario_id = $('#usuario_id').attr('value');
		var usuario = $('#user').attr('value');
		var email = $('#email').attr('value');
		
		$.ajax({
			url: 'modulos/SistemaUsuarios/actualiza_perfil.php',
			type: "POST",
			data: "submit=&email="+email+"&user="+usuario+"&usuario_id="+usuario_id,
			success: function(datos){
				$("#cambio_datos_usuario").load('includes/mensaje_actualizacion.php').fadeTo(4000,1,function(){
					$("#cambio_datos_usuario").html(datos).fadeTo(2000,1,function(){
						ConsultaDatosUsuario();
					});
				});
			}
		});
		return false;
	}
	
	function ActualizarUsuarioPassAdmin(){
		var usuario_id = $('#usuario_id').attr('value');
		var usuario = $('#usuario').attr('value');
		var oldpass = $('#oldpass').attr('value');
		var newpass1 = $('#newpass1').attr('value'); 
		var newpass2 = $("#newpass2").attr("value");
		
		$.ajax({
			url: 'modulos/SistemaUsuarios/actualiza_password.php',
			type: "POST",
			data: "submit=&oldpass="+oldpass+"&usuario="+usuario+"&newpass1="+newpass1+"&newpass2="+newpass2+"&usuario_id="+usuario_id,
			success: function(datos){
				$("#cambio_pass_datos_usuario").load('includes/mensaje_actualizacion.php').fadeTo(4000,1,function(){
					$("#cambio_pass_datos_usuario").html(datos).fadeTo(2000,1, function(){
						ConsultaDatosUsuarioAdmin(usuario_id);
					});
				});
			}
		});
		return false;
	}
	
	function ActualizarCargo(){
		var id = $('#valor_id').attr('value');
		var cargo = $('#valor_cargo').attr('value');
		var nombre = $('#valor_nombre').attr('value');
		var descripcion = $('#valor_descripcion').attr('value'); 
		var foto = $('#valor_foto').attr("value");
		var precedido = $('#valor_precedido').attr('value'); 
		var edad = $('#valor_edad').attr("value");
		
		$.ajax({
			url: 'modulos/SistemaClub/actualizar.php',
			type: "POST",
			data: "submit=&valor_id="+id+"&valor_nombre="+nombre+"&valor_descripcion="+descripcion+"&valor_foto="+foto+"&valor_precedido="+precedido+"&valor_cargo="+cargo+"&valor_edad="+edad,
			success: function(datos){
				$(".formulario_usuario").load('includes/mensaje_actualizacion.php').fadeTo(4000,1,function(){
					$(".formulario_usuario").html(datos).fadeTo(2000,1, function(){
						ConsultaDatosCargo();
					});
				});
			}
		});
		return false;
	}
	
	function ActualizarUsuarioPerfilAdmin(){
		var usuario_id = $('#usuario_id').attr('value');
		var usuario = $('#user').attr('value');
		var email = $('#email').attr('value');
		var nivel = $('#nivel').attr('value');
		
		$.ajax({
			url: 'modulos/SistemaUsuarios/actualiza_perfil.php',
			type: "POST",
			data: "submit=&email="+email+"&user="+usuario+"&usuario_id="+usuario_id+"&nivel="+nivel,
			success: function(datos){
				$("#cambio_datos_usuario").load('includes/mensaje_actualizacion.php').fadeTo(4000,1,function(){
					$("#cambio_datos_usuario").html(datos).fadeTo(2000,1, function(){
						ConsultaDatosUsuarioAdmin(usuario_id);
					});
				});
			}
		});
		return false;
	}
	
	function ActualizarCronica(){
		var cronica_id = $('#cronica_id').attr('value');
		var titulo = $('#titulo').attr('value');
		var nombre = $('#nombre').attr('value');
		var fecha = $('#fecha').attr('value'); 
		var contenido = $("#contenido").attr("value");
		
		var port = $('#port1').attr('value');
		
		var def1 = $('#def1').attr('value');
		var def2 = $('#def2').attr('value');
		var def3 = $('#def3').attr('value');
		var def4 = $('#def4').attr('value');
		
		var med1 = $('#med1').attr('value');
		var med2 = $('#med2').attr('value');
		var med3 = $('#med3').attr('value');
		var med4 = $('#med4').attr('value');
		
		var del1 = $('#del1').attr('value');
		var del2 = $('#del2').attr('value');
		
		var res1 = $('#res1').attr('value');
		var res2 = $('#res2').attr('value');
		var res3 = $('#res3').attr('value');
		var res4 = $('#res4').attr('value');
		var res5 = $('#res5').attr('value');
		
		if( cronica_id == "" | titulo == "" || fecha == "" || contenido == ""  || port == "" || def1 == "" || def2 == "" || def3 == "" || def4 == "" || med1 == "" || med2 == "" || med3 == "" || med4 == "" || del1 == ""|| del2 == "" || res1 == ""|| res2 == "" || res3 == ""|| res4 == "" || res5 == "" ){
			alert("Necesita meter algun dato.");
		}
		else{
			$.ajax({
				url: 'modulos/SistemaCronicas/actualizar.php',
				type: "POST",
				data: "submit=&titulo="+titulo+"&cronica_id="+cronica_id+"&nombre="+nombre+"&fecha="+fecha+"&contenido="+contenido+"&port1="+port+"&def1="+def1+"&def2="+def2+"&def3="+def3+"&def4="+def4+"&med1="+med1+"&med2="+med2+"&med3="+med3+"&med4="+med4+"&del1="+del1+"&del2="+del2+"&res1="+res1+"&res2="+res2+"&res3="+res3+"&res4="+res4+"&res5="+res5,
				success: function(datos){
					ConsultaDatosCronica();
					alert(datos);
					$("#formulario").hide();
					$("#tabla").show();
				}
			});
			return false;
		}
	}	
	
	function ActualizarDatosJugador(){
		var jugador_id = $('#jugador_id').attr('value');
		var nombre = $('#nombre').attr('value');
		var puesto = $('#puesto').attr('value'); 
		var equipo = $("#equipo").attr("value");
		var amarillas = $("#amarillas").attr("value");
		var rojas = $("#rojas").attr("value");
		var equipos = $("#eequipos").attr("value");
		var goles = $("#goles").attr("value");
		var estado = $("#estado").attr("value");
		var edad = $("#edad").attr("value");
		var dorsal = $("#dorsal").attr("value");
		var puntosliga = $("#puntosliga").attr("value");
		var apodo = $("#apodo").attr("value");
		var convo = $("#convo").attr("value");

		$.ajax({
			url: 'modulos/JugadoresBusqueda/actualizar_jugador.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&edad="+edad+"&puesto="+puesto+"&goles="+goles+"&equipo="+equipo+"&amarillas="+amarillas+"&rojas="+rojas+"&eequipos="+equipos+"&estado="+estado+"&dorsal="+dorsal+"&jugador_id="+jugador_id+"&puntosliga="+puntosliga+"&apodo="+apodo+"&convo="+convo,
			success: function(datos){
				$("#cambio_datos_usuario").html("<fieldset id='modidifica_pserfil' class='negro'><span>Actualizando datos del jugador...</span> <img class='imagen_cargando' src='img/cargando.gif' /></fieldset>").fadeTo(4000,1,function(){
					ConsultaDatosJugador(jugador_id);
				});
			}
		});
		return false;
	}
	
	function ActualizarDatosGoleador(){
		var jugador_id = $('#jugador_id').attr('value');
		var nombre = $('#nombre').attr('value');
		var puesto = $('#puesto').attr('value'); 
		var goles = $("#goles").attr("value");
		$.ajax({
			url: 'modulos/SistemaGoleadores/actualizar.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&puesto="+puesto+"&goles="+goles+"&jugador_id="+jugador_id,
			success: function(datos){
				alert(datos);
				ConsultaDatosGoleador();
				$("#formularioGoles").hide();
				$("#tablaGoles").show();
			}
		});
		return false;
	}
	
	function ActualizarClasificacion()
	{
		var clasificacion_id = $('#id').attr('value');
		var equipo = $('#equipo').attr('value');
		var puntos = $('#puntos').attr('value'); 
		var favor = $("#favor").attr("value");
		var contra = $("#contra").attr("value");
		var jugados = $("#jugados").attr("value");
		var ganados = $("#ganados").attr("value");
		var empatados = $("#empatados").attr("value");
		var perdidos = $("#perdidos").attr("value");	
		
		var puntoscasa = $('#puntoscasa').attr('value'); 
		var favorcasa = $("#favorcasa").attr("value");
		var contracasa = $("#contracasa").attr("value");
		var jugadoscasa = $("#jugadoscasa").attr("value");
		var ganadoscasa = $("#ganadoscasa").attr("value");
		var empatadoscasa = $("#empatadoscasa").attr("value");
		var perdidoscasa = $("#perdidoscasa").attr("value");
		
		var puntosfuera = $('#puntosfuera').attr('value'); 
		var favorfuera = $("#favorfuera").attr("value");
		var contrafuera = $("#contrafuera").attr("value");
		var jugadosfuera = $("#jugadosfuera").attr("value");
		var ganadosfuera = $("#ganadosfuera").attr("value");
		var empatadosfuera = $("#empatadosfuera").attr("value");
		var perdidosfuera = $("#perdidosfuera").attr("value");
		var diferencia = $("#diferencia").attr("value");

		$.ajax({
			url: 'modulos/SistemaDeportivo/actualizar.php',
			type: "POST",
			data: "submit=&equipo="+equipo+"&puntos="+puntos+"&favor="+favor+"&contra="+contra+"&jugados="+jugados+"&ganados="+ganados+"&empatados="+empatados+"&perdidos="+perdidos+"&puntoscasa="+puntoscasa+"&favorcasa="+favorcasa+"&contracasa="+contracasa+"&jugadoscasa="+jugadoscasa+"&ganadoscasa="+ganadoscasa+"&empatadoscasa="+empatadoscasa+"&perdidoscasa="+perdidoscasa+"&puntosfuera="+puntosfuera+"&favorfuera="+favorfuera+"&contrafuera="+contrafuera+"&jugadosfuera="+jugadosfuera+"&ganadosfuera="+ganadosfuera+"&empatadosfuera="+empatadosfuera+"&perdidosfuera="+perdidosfuera+"&diferencia="+diferencia+"&id="+clasificacion_id,
			success: function(datos){
				ConsultaDatosClasi();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}
	
	/*
	 	*	Fecha: 2010-07-17 Titogelo
		*	
	 	*	Consultar
	*/
	
	function ConsultaDatos(){
		$.ajax({
			url: 'modulos/Noticias/consulta.php',
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}
	
	function ConsultaDatosAdministraUser(){
		$.ajax({
			url: 'modulos/SistemaUsuarios/administra_usuarios.php',
			type: "GET",
			success: function(datos){
				$("#content").html(datos);
			}
		});
	}

	function ConsultaDatosJugador(jugador_id){
		$.ajax({
			url: 'modulos/JugadoresBusqueda/info.php?id='+jugador_id,
			type: "GET",
			success: function(datos){
				$('.cuerpo').html(datos);
			}
		});
	}
	
	function ConsultaDatosLeccion(){
		$.ajax({
			url: 'modulos/SistemaAula/consulta.php',
			type: "GET",
			success: function(datos){
				$('.cuerpo').html(datos);
			}
		});
	}
	
	function ConsultaDatosCargo(){
		$.ajax({
			url: 'modulos/SistemaClub/club.php',
			type: "GET",
			success: function(datos){
				window.location.href='index.php?page=club';
			}
		});
	}
	
	function ConsultaDatosUsuario(){
		$.ajax({
			url: 'modulos/SistemaUsuarios/perfil.php',
			type: "GET",
			success: function(datos){
				$('.cuerpo').html(datos);
			}
		});
	}
	
	function ConsultaDatosUsuarioAdmin(id_usuario){
		$.ajax({
			url: 'modulos/SistemaUsuarios/administra_usuarios.php?modifica_usuario='+id_usuario,
			type: "GET",
			success: function(datos){
				$('.cuerpo').html(datos);
			}
		});
	}	
	
	function ConsultaDatosJugadorNuevo(){
		$.ajax({
			url: 'modulos/JugadoresBusqueda/consulta.php',
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}

	function ConsultaDatosGoleador(){
		$.ajax({
			url: 'modulos/SistemaGoleadores/consulta.php',
			type: "GET",
			success: function(datos){
				$("#tablaGoles").html(datos);
			}
		});
	}
	
	function ConsultaDatosJornada(temporada, codigo){
		$.ajax({
			url: 'index.php?page=deportivo&temporada='+temporada+'&equipo='+codigo,
			type: "GET",
			success: function(datos){
				$("#clasifica").html(datos);
			}
		});
	}
	
	function ConsultaDatosJornadaNuevo(){
		$.ajax({
			url: 'modulos/SistemaResultadosClasificacion/muestra_goleadores.php',
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}
	
	function ConsultaDatosEntrevista(){
		$.ajax({
			url: 'modulos/SistemaEntrevistas/consulta.php',
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}	

	function ConsultaDatosAlineacion(){
		$.ajax({
			url: 'modulos/SistemaCronicas/consulta.php',
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}
	
	function ConsultaDatosCronica(){
		$.ajax({
			url: 'modulos/SistemaCronicas/consulta.php',
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}
	
	function ConsultaDatosClasi()
	{
		$.ajax({
			url: 'modulos/SistemaDeportivo/deportivo.php',
			type: "GET",
			success: function(datos){
				//$('.cuerpo').html(datos);
			}
		});
	}

	/*
	 	*	Fecha: 2010-07-17 Titogelo
		*	
	 	*	Eliminar
	*/
	
	function EliminarDato(noticia_id){
		var msg = confirm("Desea eliminar esta noticia?")
		//alert(msg);
		if ( msg == true ) {
			$.ajax({
				url: 'modulos/Noticias/eliminar.php',
				type: "GET",
				data: "id="+noticia_id,
				success: function(datos){
					$("#tabla").show();
					$("#muestra_mensaje_corroboracion_accion").html("<span>Eliminando noticia de la base de datos...</span> <img class='imagen_cargando' src='img/cargando.gif' />").fadeTo(1000,1,function(){
						$(this).html(datos).fadeTo(200,1,function(){
							ConsultaDatos();
						});
					});
					//$("#fila-"+noticia_id).remove();
				}
				
			});
		}
		else{
			$("#muestra_mensaje_corroboracion_accion").html("<span>La noticia no ha sido eliminada. </span>").fadeTo(2000,1, function(){
				ConsultaDatos();
			});
		}
		return false;
	}
	
	function EliminarUsuario(id_usuario){
		
		var msg = confirm("¿Desea eliminar este usuario?")
		
		if ( msg == true ) {
			$.ajax({
				url: 'modulos/SistemaUsuarios/eliminar_usuario.php',
				type: "GET",
				data: "usuario="+id_usuario,
				success: function(datos){
					$("#tabla").show();
					$("#"+id_usuario).html("<td colspan='6'><span>Eliminando usuario de la base de datos...</span> <img class='imagen_cargando' src='img/cargando.gif' /></td>").fadeTo(4000,1,function(){
						$(this).html(datos).fadeTo(2000,0,function(){
							$("#"+id_usuario).hide();
						});
					});
				}
				
			});
		}
		return false;
	}
	
	function EliminarComentario(comentario_id)
	{
		var msg = confirm("¿Desea eliminar este comentario?")
		if ( msg == true )
		{
			$.ajax({
				url: 'modulos/Noticias/eliminar_comentario.php',
				type: "GET",
				data: "id="+comentario_id,
				success: function(datos){
					$("#tabla").show();
				
					$("#VerComent"+comentario_id).html("<span>Eliminando comentario de la base de datos...</span> <img class='imagen_cargando_negro' src='img/ico_cargando2.gif' />").fadeTo(1000,1,function(){
						$(this).html(datos).fadeTo(200,1,function(){
							ConsultaDatos();
						});
					});
				}
				
			});
		}
		else
		{
			$("#VerComent"+comentario_id).html("<span>La noticia no ha sido eliminada. </span>").fadeTo(2000,1, function(){
				ConsultaDatos();
			});
		}
		return false;
	}
	
	function EliminarCargo(id_miembro)
	{
		var msg = confirm("¿Desea eliminar este miembro del club?")
		if ( msg == true )
		{
			$.ajax({
				url: 'modulos/SistemaClub/eliminar.php',
				type: "GET",
				data: "id="+id_miembro,
				success: function(datos){
					$("#cargo"+id_miembro).html("<h3>Eliminando miembro...</h3>").load('includes/mensaje_eliminacion.php').fadeTo(4000,1,function(){
						$(this).html(datos).fadeTo(2000,1,function(){
							ConsultaDatosCargo();
						});
					});
				}
				
			});
		}
		else
		{
			$("#cargo"+id_miembro).load('includes/mensaje_no_accion.php').fadeTo(2000,1, function(){
				ConsultaDatosCargo();
			});
		}
		return false;
	}

	function EliminarCronica(cronica_id){
		var msg = confirm("Desea eliminar esta cronica?")
		if ( msg == true ) {
			$.ajax({
				url: 'modulos/SistemaCronicas/eliminar.php',
				type: "GET",
				data: "id="+cronica_id,
				success: function(datos){
					//$("#tabla").show();
					//ConsultaDatosCronica();
					$("#fila-"+cronica_id).remove();
					$("#muestra_mensaje_corroboracion_accion").html(datos);
					
				}	
			});
		}
		else{
			$("#muestra_mensaje_corroboracion_accion").html("<span class='borradoOk No'>La noticia no ha sido borrada.</span>");
		}
		return false;
	}

	function EliminarComentarioCronica(comentario_id)
	{
		var msg = confirm("Desea eliminar este comentario?")
		//alert(msg);
		if ( msg == true ) {
			$.ajax({
				url: 'modulos/SistemaCronicas/eliminar_comentario.php',
				type: "GET",
				data: "id="+comentario_id,
				success: function(datos){
					$("#muestra_mensaje_corroboracion_accion").html(datos);
					ConsultaDatosCronica();
					$("#VerComent"+comentario_id).remove();
					$("#tabla").show();
				}
				
			});
		}
		else{
			$("#muestra_mensaje_corroboracion_accion").html("<span class='borradoOk No'>El comentario no ha sido borrada.</span>").fadeTo(1000,1).fadeTo(1000,0);
		}
		return false;
	}
	
	function EliminarJugador(jugador_id)
	{
		var msg = confirm("Desea eliminar este jugador?")
		if ( msg == true) {
			$.ajax({
				url: 'modulos/jugadoresBusqueda/eliminar.php',
				type: "GET",
				data: "id="+jugador_id,
				success: function(datos){
					$("fieldset.negro").html("<span class='mensaje'>Elminando jugador de la base de datos ...</span> <img class='imagen_cargando_negro' src='img/cargando.gif' />").fadeTo(4000,1,function(){
						$("fieldset.negro").html(datos).fadeTo(2000,1,function(){
							parent.document.location="index.php?page=jugadores";
						});
					});
				}
			});
		}
		return false;
	}

	/*
	 	*	Fecha: 2010-07-17 Titogelo
		*	
	 	*	Grabar
	*/
	function GrabarDatos()
	{
		var noticia_id = $('#noticia_id').attr('value');
		var titulo = $('#titulo').attr('value');
		var fecha = $('#fecha').attr('value'); 
		var descripcion = $("#descripcion").attr("value");
		if( noticia_id == "" || titulo == "" || fecha == "" || descripcion == "" ){
			alert("Necesita meter algun dato.");
		}
		else{
			$.ajax({
				url: 'modulos/Noticias/nuevo.php',
				type: "POST",
				data: "submit=&titulo="+titulo+"&titulo="+titulo+"&fecha="+fecha+"&descripcion="+descripcion,
				success: function(datos){
					$("#formulario").hide();
					$("#tabla").show();
					$("#muestra_mensaje_corroboracion_accion").html("<span>Enviando noticia...</span> <img class='imagen_cargando' src='img/cargando.gif' />").fadeTo(4000,1,function(){
						$(this).html(datos).fadeTo(2000,1,function(){
							ConsultaDatos();
						});
					});
				}
			});
			return false;
		}
	}
	
	function GrabarLeccion()
	{
		var titulo = $('#titulo').attr('value');
		var contenido = $("#contenido").attr("value");
		var autor = $("#autor").attr("value");
		
		$.ajax({
			url: 'modulos/SistemaAula/nueva_leccion.php',
			type: "POST",
			data: "submit=&titulo="+titulo+"&autor="+autor+"&contenido="+contenido,
			success: function(datos){
				$(".formulario_usuario").load('includes/mensaje_inserccion.php').fadeTo(4000,1,function(){
					$(".formulario_usuario").html(datos).fadeTo(3000,1,function(){
						ConsultaDatosLeccion();
					});
				});
			}
		});
		return false;
		
	}
	
	function GrabarCargo()
	{	
		var nombre = $('#nombre').attr('value');
		var cargo = $("#cargo").attr("value");
		var descripcion = $("#descripcion").attr("value");
		var edad = $('#edad').attr('value');
		var precedido = $("#precedido").attr("value");
		var foto = $("#valor_foto").attr("value");
		
		$.ajax({
			url: 'modulos/SistemaClub/nuevo_cargo.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&cargo="+cargo+"&descripcion="+descripcion+"&edad="+edad+"&precedido="+precedido+"&foto="+foto,
			success: function(datos){
				$(".formulario_usuario").load('includes/mensaje_inserccion.php').fadeTo(4000,1,function(){
					$(".formulario_usuario").html(datos).fadeTo(3000,1,function(){
						ConsultaDatosCargo();
						$('#nuevo_cargo').hide();
					});
				});
			}
		});
		return false;
		
	}
	
	function GrabarDatosComentario()
	{
		var id_noticia = $('#id_noticia').attr('value');
		var nombre = $('#nombre').attr('value');
		var avatar = $('#avatar').attr('value');
		var fecha = $('#fecha').attr('value'); 
		var comentario = $("#comentario").attr("value");

		$.ajax({
			url: 'modulos/Noticias/nuevo_comentario.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&id_noticia="+id_noticia+"&fecha="+fecha+"&comentario="+comentario+"&avatar="+avatar,
			success: function(datos){
				$("#formulario").hide();
				$("#tabla").show();
				$("#HacerComent"+id_noticia).html("<span>Enviando comentario...</span> <img class='imagen_cargando_negro' src='img/ico_cargando2.gif' />").fadeTo(1000,1,function(){
					$(this).html(datos).fadeTo(200,1,function(){
						ConsultaDatos();
					});
				});
				
			}
		});
		return false;
	}
		
	function GrabarEntrevista()
	{
		var titulo = $('#titulo').attr('value');
		var nombre = $('#nombre').attr('value');
		var fecha = $('#fecha').attr('value'); 
		var contenido = $("#contenido").attr("value");
		if( nombre == "" || titulo == "" || fecha == "" || contenido == "" ){
			alert("Necesita meter algun dato.");
		}
		else{
			$.ajax({
				url: 'modulos/SistemaEntrevistas/nuevo.php',
				type: "POST",
				data: "submit=&titulo="+titulo+"&nombre="+nombre+"&fecha="+fecha+"&contenido="+contenido,
				success: function(datos){
					ConsultaDatosEntrevista();
					alert(datos);
					$("#formulario").hide();
					$("#tabla").show();
				}
			});
			return false;
		}
	}
	
	function GrabarDatosJugador()
	{
		var nombre = $('#nombre').attr('value');
		var puesto = $('#puesto').attr('value'); 
		var equipo = $("#equipo").attr("value");
		var amarillas = $("#amarillas").attr("value");
		var rojas = $("#rojas").attr("value");
		var equipos = $("#equipos").attr("value");
		var goles = $("#goles").attr("value");
		var estado = $("#estado").attr("value");
		var edad = $("#edad").attr("value");
		var dorsal = $("#dorsal").attr("value");
		var puntosliga = $("#puntosliga").attr("value");
		var apodo = $("#apodo").attr("value");
		var convo = $("#convo").attr("value");

		$.ajax({
			url: 'modulos/jugadoresBusqueda/nuevo.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&puesto="+puesto+"&equipo="+equipo+"&amarillas="+amarillas+"&rojas="+rojas+"&equipos="+equipos+"&goles="+goles+"&estado="+estado+"&edad="+edad+"&dorsal="+dorsal+"&puntosliga="+puntosliga+"&apodo="+apodo+"&convo="+convo,
			success: function(datos){
				$("#formulario").hide();
				$("#tabla").show();
				$("#muestra_mensaje_corroboracion_accion").html("<span>Creando nuevo jugador ...</span> <img class='imagen_cargando' src='img/cargando.gif' />").fadeTo(4000,1,function(){
					$("#muestra_mensaje_corroboracion_accion").html(datos).fadeTo(3000,0,function(){
						ConsultaDatosJugadorNuevo();
					});
				});
			}
		});
		return false;
	}
	
	function GrabarCronica()
	{
		var titulo = $('#titulo').attr('value');
		var nombre = $('#nombre').attr('value');
		var fecha = $('#fecha').attr('value'); 
		var contenido = $("#contenido").attr("value");
		
		var port = $('#port1').attr('value');
		
		var def1 = $('#def1').attr('value');
		var def2 = $('#def2').attr('value');
		var def3 = $('#def3').attr('value');
		var def4 = $('#def4').attr('value');
		
		var med1 = $('#med1').attr('value');
		var med2 = $('#med2').attr('value');
		var med3 = $('#med3').attr('value');
		var med4 = $('#med4').attr('value');
		
		var del1 = $('#del1').attr('value');
		var del2 = $('#del2').attr('value');
		
		var res1 = $('#res1').attr('value');
		var res2 = $('#res2').attr('value');
		var res3 = $('#res3').attr('value');
		var res4 = $('#res4').attr('value');
		var res5 = $('#res5').attr('value');
		
		if( titulo == "" || fecha == "" || contenido == ""  || port == "" || def1 == "" || def2 == "" || def3 == "" || def4 == "" || med1 == "" || med2 == "" || med3 == "" || med4 == "" || del1 == ""|| del2 == "" || res1 == ""|| res2 == "" || res3 == ""|| res4 == "" || res5 == "" ){
			alert("Necesita meter algun dato.");
		}
		else{
			$.ajax({
				url: 'modulos/SistemaCronicas/nuevo.php',
				type: "POST",
				data: "submit=&titulo="+titulo+"&nombre="+nombre+"&fecha="+fecha+"&contenido="+contenido+"&port1="+port+"&def1="+def1+"&def2="+def2+"&def3="+def3+"&def4="+def4+"&med1="+med1+"&med2="+med2+"&med3="+med3+"&med4="+med4+"&del1="+del1+"&del2="+del2+"&res1="+res1+"&res2="+res2+"&res3="+res3+"&res4="+res4+"&res5="+res5,
				success: function(datos){
					ConsultaDatosCronica();
					alert(datos);
					$("#formulario").hide();
					$("#tabla").show();
				}
			});
			return false;
		}
	}
	
	function GrabarAlineacion()
	{
	
		var id = $('#id').attr('value');
		var port = $('#port').attr('value');
		
		var def1 = $('#def1').attr('value');
		var def2 = $('#def2').attr('value');
		var def3 = $('#def3').attr('value');
		var def4 = $('#def4').attr('value');
		
		var med1 = $('#med1').attr('value');
		var med2 = $('#med2').attr('value');
		var med3 = $('#med3').attr('value');
		var med4 = $('#med4').attr('value');
		
		var del1 = $('#del1').attr('value');
		var del2 = $('#del2').attr('value');
		
		if( id == "" || port == "" || def1 == "" || def2 == "" || def3 == "" || def4 == "" || med1 == "" || med2 == "" || med3 == "" || med4 == "" || del1 == ""|| del2 == "" ){
			alert("Necesita meter algun dato.");
		}
		else{
			$.ajax({
				url: 'modulos/SistemaCronicas/creaAlineacion.php',
				type: "POST",
				data: "submit=&port="+port+"&id="+id+"&def1="+def1+"&def2="+def2+"&def3="+def3+"&def4="+def4+"&med1="+med1+"&med2="+med2+"&med3="+med3+"&med4="+med4+"&del1="+del1+"&del2="+del2,
				success: function(datos){
					//ConsultaDatosAlineacion();
					alert(datos);
					$("#formulario").hide();
					$("#tabla").show();
					//$("#HacerComent"+id_noticia).html(datos).fadeTo(400,0.8);
				}
			});
			return false;
		}
	}
	
	function GrabarDatosComentarioCronica()
	{
		var id_cronica = $('#id_cronica').attr('value');
		var nombre = $('#nombre').attr('value');
		var avatar = $('#avatar').attr('value');
		var fecha = $('#fecha').attr('value'); 
		var comentario = $("#comentario").attr("value");

		$.ajax({
			url: 'modulos/SistemaCronicas/nuevo_comentario.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&id_cronica="+id_cronica+"&fecha="+fecha+"&comentario="+comentario+"&avatar="+avatar,
			success: function(datos){
				ConsultaDatosCronica();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}
	
	function GrabarDatosComentarioEntrevista()
	{
		var id_entrevista = $('#id_entrevista').attr('value');
		var nombre = $('#nombre').attr('value');
		var avatar = $('#avatar').attr('value');
		var fecha = $('#fecha').attr('value'); 
		var comentario = $("#comentario").attr("value");

		$.ajax({
			url: 'modulos/SistemaEntrevistas/nuevoComentario.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&id_entrevista="+id_entrevista+"&fecha="+fecha+"&comentario="+comentario+"&avatar="+avatar,
			success: function(datos){
				ConsultaDatosEntrevista();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}

	/*
	 	*	Fecha: 2010-07-17 Titogelo
		*	
	 	*	Obtener
	*/
	
	function ObtenerJornada()
	{
		var jornada = $('#jornada').attr('value');
		
		$.ajax({
			url: 'modulos/SistemaQuiniela/jornada.php',
			type: "POST",
			data: "submit=&jornada="+jornada,
			success: function(datos){
				$("#nueva_quiniela").html("<h3>Enviando...</h3>").fadeTo(1000,1,function(){
					$(this).html(datos).fadeTo(2000,1);
				});
			}
			
		});
		return false;
	}
	
	/*
	 	*	Fecha: 2010-07-17 Titogelo
		*	
	 	*	Procesar
	*/
	function ProcesaJornadaQuiniela(){
		var numero_checked = $("input:checked").length;
		var jornada = $('#jornada').attr('value');
		var correcta = $('input:radio:checked').attr('value');
		var miarray = new Array();
		
		$(".opciones").each(function(i) {
			if(this.checked)
			{
				miarray += this.value + "/";
			}
		});
		
		if( numero_checked == 9 || numero_checked == 8 ){
			$.ajax({
				type: "POST",
				data: "submit=&miarray="+miarray+"&jornada="+jornada+"&combinacion_correcta="+correcta,
				url: 'modulos/SistemaQuiniela/procesa_jornada_quiniela.php',
				success: function(datos){
					$("#nueva_quiniela").html(datos);
				}
			});
			return false;
		}
	}
		
	function ProcesaEquiposTemporadaNueva(){
		var lista_equipos = $('#lista2').attr('value');
		var temporada = $('#temporada').attr('value');
		var equipo = $('#equipo').attr('value');
		
		$.ajax({
			type: "POST",
			data: "submit=&lista2="+lista_equipos+"&temporada="+temporada+"&equipo="+equipo,
			url: 'modulos/SistemaDeportivo/procesa_temporada.php',
			success: function(datos){
				$("#nueva_quiniela").html("<h3>Enviando...</h3>").fadeTo(1000,1,function(){
					$(this).html(datos).fadeTo(2000,1);
				});
			}
		});
	}
	
	/*
		*	Fecha: 2010-07-20 Autor: Angel Suárez
		*	
		*	En ProcesaEncuentrosTemporadaNueva, se trata de ir recogiendo los datos que hemos formado
		*	dinamicamente en crea_calendario_temporada.php. El form ha sido creado de tal manera que 
		*	los id's de los inputs van identificados con un numero, ese numero se obtiene del numero 
		*	de partido de cada jornada. Simplemente enviando dicho numero ya sabemos cuantas veces tenemos
		*	que iterar en esta funcion y de esta manera iremos recibiendo cada uno de los datos.
		*	
		*	El envio por ajax se hace de manera simple como se haria cualquier otro envio con la salvedad
		*	de que se hace 'partidos_jornada' veces.
		*	
		*	Lo que puede resultar un poco mas complicado es entender que hay que iterar para recorrer todos
		*	los id's (=inque hemos generado dinamicamente con los drag and drop.
	*/
	function ProcesaEncuentrosTemporadaNueva () {
		
		var partidos_jornada = $('#partido_por_jornada').val();
		
		for (var i = 1 ; i <= partidos_jornada; i++)
		{
			var equipo_local = $('#equipo_local'+i+'').val();
			var equipo_visitante = $('#equipo_visitante'+i+'').val();
			var temporada = $('#temporada'+i+'').val();
			var codigo = $('#codigo'+i+'').val();
			var jornada = $('#jornada'+i+'').val();
			
			$.ajax({
				type: "POST",
				url: 'modulos/SistemaDeportivo/procesa_calendario_temporada.php',
				data: "submit=&equipo_visitante="+equipo_visitante+"&equipo_local="+equipo_local+"&temporada="+temporada+"&codigo="+codigo+"&jornada="+jornada,
				success: function(datos) {
					$("#calendario").html("<p>Los partidos de la jornada "+jornada+" fueron enviados.</p>").fadeTo(5000,1,function(){
						window.location.reload();
					});
				}
			});
		};
		
	
	}
	
	function enviaNumeroGoleadoresVallobin () {

	}
	
	function recarga_crea_temporada(){
		
	}
	
	/*
		*	Fecha: 2010-07-17 Titogelo
		*	
		*	Cancelar
	*/
	function Cancelar()
	{
		$("#formulario").toggle();
		$("#tabla").show();
		return false;
	}
	
	function CancelarGoles()
	{
		$("#formularioGoles").hide();
		$("#tablaGoles").show();
		return false;
	}
	
	function CancelarSesion()
	{
		$("#formularioSesiones").hide();
		$("#MisDatos").show();
		return false;
	}
	
	function Cancelar_volver()
	{
		window.location.href='index.php';
	}
	
	function Volver_atras_quiniela()
	{
		window.location.href='index.php?page=quiniela';
	}
	
	function Cancelar_club () {
		window.location.href='index.php?page=club';
	}
	
	function Limpiar()
	{
		$('#frmNoticiaNueva').each (function(){
  		this.reset();
		});		
		$('#frmJugadorNuevo').each (function(){
  		this.reset();
		});
		$('.partido').each (function(){
  		this.reset();
		});
	}
	
	/*
	 	*	Fecha: 2010-07-17 Titogelo
		*	
	 	*	Crear
	*/
	
	function CrearTemporada () {
		var temporada = $('#temporada').attr('value');
		var equipo = $('#equipo').attr('value');

		$.ajax({
			url: 'modulos/SistemaDeportivo/crea_temporada.php',
			type: "POST",
			data: "submit=&temporada="+temporada+"&equipo="+equipo,
			success: function(datos){
				$("#nueva_quiniela").html("<h3>Enviando...</h3>").fadeTo(1000,1,function(){
					$(this).html(datos).fadeTo(2000,1);
				});
			}

		});
		return false;
	}