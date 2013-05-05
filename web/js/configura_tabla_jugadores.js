var oTable;
/* Formating function for row details */
function fnFormatDetails ( nTr )
{
	var aData = oTable.fnGetData( nTr );
	var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; width:100%;">';
	sOut += '<tr><td class="lista_jugadores" ><img src="'+aData[5]+'"/></td><td>Nombre: '+aData[1]+'</td><td>Edad: '+aData[2]+'</td><td>Equipo: <a href="equipo/show/id/'+aData[10]+'">'+aData[3]+'</a></td></tr>';
	sOut += '<tr><td>Goles: '+aData[4]+'</td><td>Puesto: '+aData[8]+'</td><td><a href="jugadores/PDF/id/'+aData[9]+'"></a></td><td><a href="jugador/show/id/'+aData[9]+'">Más detalles</a></td></tr>';
	sOut += '<tr><td>Amarillas: '+aData[6]+'</td><td>Rojas: '+aData[7]+'</td><td>Convocado esta jornada: </td><td><a href="jugador/reporte/id/'+aData[9]+'">PDF</a></td></tr>';
	sOut += '</table>';
	
	return sOut;
}

$(document).ready(function() {
	
	oTable = $('#example').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sPaginationType": "full_numbers",
		"sAjaxSource": "jugador/listadodejugadores",
		"aoColumnDefs": [
					{ "sClass": 'center', "aTargets": [ 0, 1, 2, 3, 4 ] },
					{ "bVisible": false,  "aTargets": [ 5, 6, 7, 8, 9, 10] }
				],
		"aaSorting": [[1, 'asc']],

	} );
	
	$('#example tbody td img').live( 'click', function () {
		var nTr = this.parentNode.parentNode;
		if ( this.src.match('details_close') )
		{
			/* This row is already open - close it */
			this.src = "../images/details_open.png";
			oTable.fnClose( nTr );
		}
		else
		{
			/* Open this row */
			this.src = "../images/details_close.png";
			oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
		}
	} );
} );