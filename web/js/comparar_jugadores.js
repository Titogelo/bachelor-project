$(document).ready(function(){

	
	
	// Hacer que los jugadores sean arrastrables
	$( "#lista_jugadores li" ).draggable({
		cancel: "a.ui-icon", // clicking an icon won't initiate dragging
		revert: "invalid", // when not dropped, the item will revert back to its initial position
		helper: "clone"
	});

	// Hacer que los jugadores comparados sean arrastrables
	$( "#comparador_jugadores li" ).draggable({
		cancel: "a.ui-icon", // clicking an icon won't initiate dragging
		revert: "invalid", // when not dropped, the item will revert back to its initial position
		helper: "clone"
	});
	
	// Hacer que el comparador sea soltable y que acepte jugadores
	$( "#comparador_jugadores" ).droppable({
		accept: "#lista_jugadores  li",
		activeClass: "ui-state-default",
		drop: function( event, ui ) {
			$( this ).find( ".placeholder" ).remove();
			$( "<li></li>" ).text( ui.draggable.text() ).appendTo( this );
			ui.draggable.remove();
			$( "#comparador_jugadores li" ).draggable({
				cancel: "a.ui-icon", // clicking an icon won't initiate dragging
				revert: "invalid", // when not dropped, the item will revert back to its initial position
				helper: "clone"
			});
			
			if( $("#comparador_jugadores").children().length == "2" ){
				// Vamos a enviar los id's de cada jugador
				var params = { equipo1: 1, equipo2: 2 };

				$.ajax({
					type: "POST",
					url: 'jugador/comparar',
					data: jQuery.param(params),
					dataType: 'json',
					success: function(data){
						alert("SE ha env ");
					}
					
				});
				return false;
			}
		}
	});
	
	

	// Hacer que la lista de jugadores sea soltable tambien, aceptar elementos del comparador
	$( "#lista_jugadores" ).droppable({
		accept: "#comparador_jugadores li",
		activeClass: "ui-state-default",
		drop: function( event, ui ) {
			$( this ).find( ".placeholder" ).remove();
			$( "<li></li>" ).text( ui.draggable.text() ).appendTo( this );
			ui.draggable.remove();
			$( "#lista_jugadores li" ).draggable({
				cancel: "a.ui-icon", // clicking an icon won't initiate dragging
				revert: "invalid", // when not dropped, the item will revert back to its initial position
				helper: "clone"
			});
		}
	});
});