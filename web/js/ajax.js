$(document).ready(function(){
	
	$(document).mousemove(function(e){
		$('#status').html(e.pageX +', '+ e.pageY);
	});

	
	$("#acciones").val(2);
	$("#categorias").val(1);
	$("#temporadas").val(1);
	
	accion = 2;
	jornada = 1;
	categoria = 1;
	temporada = 1;
	
	changeClas(accion, temporada, categoria, jornada);
	
	// Elegir accion
	$("select#acciones").change(function () {
		accion = $("#acciones").val();
	});
	
	// Limitar categorias
	$("select#temporadas").change(function () {
		temporada = $("#temporadas").val();
		$.post("contenido/temporadas", { temporada: temporada }, function(data){
			options_de_categoria = data;
			$.post("contenido/index", { }, function(){
				$("#categorias").html(options_de_categoria);
			});
		});
	});
	
	// Limitar Jornadas
	$("select#categorias").change(function () {
		categoria = $("#categorias").val();
		$.post("contenido/categorias", { temporada: temporada, categoria: categoria }, function(data){
			options_de_jornada = data;
			$.post("contenido/index", { }, function(){
				$("#jornadas").html(options_de_jornada);
			});
		});
	});
	
	// Procesar accion
	$("select#jornadas").change(function () {
		jornada = $("#jornadas").val();
		changeClas(accion, temporada, categoria, jornada);
	});
	
	$("img#boton").click(function () {
		accion = $("#acciones").val();
		jornada = $("#jornadas").val();
		categoria = $("#categorias").val();
		temporada = $("#temporadas").val();
		changeClas(accion, temporada, categoria, jornada);
	});
	
	$("img#limpiar").click(function () {
		$("#acciones").val(1);
		$("#categorias").val(1);
		$("#temporadas").val(1);
		$("#jornadas").val(1);

		accion = 1;
		jornada = 1;
		categoria = 1;
		temporada = 1;

		changeClas(accion, temporada, categoria, jornada);
	});
	

	
	$('a.equipo-clasificacion').livequery('click', function() {
		$(this).parent().parent().addClass('selecciona_fila').siblings().removeClass('selecciona_fila');
		
		$.ajax({
			type: "POST",
			url: this.href,
			success: function(data){
				datos_procesados = data;
				$.post("contenido/index", { }, function(){
					$("#detalle_datos").html(datos_procesados);
				});
			}
		});
		return false;
	});
	
	$('a.estadisticas-clasificacion').livequery('click', function() {
		$(this).parent().parent().addClass('selecciona_fila').siblings().removeClass('selecciona_fila');
		var aux = $(this);
		$.ajax({
			type: "POST",
			url: this.href,
			success: function(data){
				datos_procesados = data;
				$.post("contenido/index", { }, function(){
					/*aux.mousemove(function(e){
						$("#detalle_datos").css("margin-top",e.pageY/2);
					});*/
					$("#detalle_datos").html(datos_procesados);
				});
			}
		});
		
		return false;
	});

	// Avanzar una jornada en la clasificacion
	$('#siguiente').livequery('click', function() {
		stepSelect('jornadas', 'up');
		return false;
	});

	// Retroceder una jornada en la clasificacion
	$('#anterior').livequery('click', function() {
		stepSelect('jornadas', 'down');
		return false;
	});

	// Funcionalidad de avanzado y retroceso
	function stepSelect( id, direction ){ 
		if( direction == 'up'){ 
			$('#'+id+' option:selected').next().attr('selected','selected');
			
			accion = $("#acciones").val();
			jornada = $("#jornadas").val();
			categoria = $("#categorias").val();
			temporada = $("#temporadas").val();
			
			changeClas(accion, temporada, categoria, jornada);

		} 
		if( direction == 'down'){ 
			$('#'+id+' option:selected').prev().attr('selected','selected'); 
			
			accion = $("#acciones").val();
			jornada = $("#jornadas").val();
			categoria = $("#categorias").val();
			temporada = $("#temporadas").val();

			changeClas(accion, temporada, categoria, jornada);
		} 
	}	
	// Funcion para cambiar la jornada que se esta mostrando en funcion de los parametros que se le pasan.
	function changeClas( accion, temporada, categoria, jornada ){
		$('#clasificacion > tbody > tr').each(function(){
			$(this).removeClass('selecciona_fila');
		});
		
		$.post("contenido/acciones", { temporada: temporada, categoria: categoria, jornada: jornada, accion: accion }, function(data){
			datos_procesados = data;
			$.post("contenido/index", { }, function(){
				$("#datos").html(datos_procesados);
				$("#detalle_datos").animate('toogle').empty();
			});
		});
	}
	
	// Procesa comparacion 
	$(":checkbox").livequery('click',function() {
		// equipos seleccionados
		var equipos_seleccionados = $("input:checked").length;
		
		$(this).parent().parent().addClass('selecciona_fila');
	
		if( equipos_seleccionados == 2 ){
			// creamos array donde iran almacenados los dos ids
			var ids = [0,1];
			
			// recorremos los checbox que esta checked y almacenamos los ids en el array
			$(".opciones:checked").each(function(index, valor) {
				ids[index] = this.value;
			});
			
			// leemos las dos posiciones del array y se las pasamos a la accion donde procesaremos
			// los dos ids sacaremos la informacion y la enviaremos a la plantilla para ser
			// mostrado adecuadamente
			$.post("contenido/compara", { equipo1: ids[0], equipo2: ids[1] }, function(data){
				datos_procesados = data;
				$.post("contenido/index", { }, function(){
					$("#estadisticas_datos").html(datos_procesados);
					
					$( "#estadisticas_datos" ).dialog({
						height: 500,
						width: 700,
						modal: true,
						close: function() {
							$(".opciones").each(function(i) {
								$(this).attr('checked', false);
							});
							$('#clasificacion > tbody > tr').each(function(){
								$(this).removeClass('selecciona_fila');
							});
						}
					});
				});
			});
		}
		else{
			$("#estadisticas_datos").empty();
			$("#detalle_datos").empty();
		}
	});
	
/*
	$.history.init(function(hash){
		if(hash == "") {
		// initialize your app
		} else {
		// restore the state from hash
		}
		},'');

	
	$('a.link-history').live('click', function(e) {
		var url = $(this).attr('href');
		url = url.replace(/^.*#/, '');
		$.history.load(url);
	});
*/
	
});