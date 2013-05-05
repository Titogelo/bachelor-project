$(document).ready(function(){
	$("#imprimir").click(function() {
		printElem({overrideElementCSS: ['../css/coolblue.css','../css/reset.css','../css/screen.css'] },"#datos");
	});
	
	$("#imprimircomparacion").livequery("click", function() {
		printElem({overrideElementCSS: ['../css/coolblue.css','../css/reset.css','../css/compara_equipos.css'] },"#estadisticas_datos");
	});
});

function printElem(options,div){
	$(div).printElement(options);
}
