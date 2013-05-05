var oTable;
/* Formating function for row details */
function fnFormatDetails ( nTr )
{
	var aData = oTable.fnGetData( nTr );
	var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; width:100%;">';
	sOut += '<tr><td class="lista_jugadores" ><img src="'+aData[2]+'"/></td><td>Nombre: '+aData[1]+'</td><td>Numero de jugadores: '+aData[3]+'</td><td><a href="equipo/show/id/'+aData[5]+'">Mas detalle</a></td></tr>';
	sOut += '<tr><td>Puesto: '+aData[8]+'</td><td><a href="jugador/show/id/'+aData[6]+'">Club</a></td><td><a href="equipo/reporte/id/'+aData[5]+'">PDF</a></td></tr>';
	sOut += '</table>';
	
	return sOut;
}

$(document).ready(function() {
	
	oTable = $('#example').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sPaginationType": "full_numbers",
		"sAjaxSource": "equipo/listadodeequipos",
		"aoColumnDefs": [
					{ "sClass": 'center', "aTargets": [ 0, 1, 3, 4 ] },
					{ "bVisible": false,  "aTargets": [ 5 ,2, 6 ] }
				],
		"aaSorting": [[1, 'asc']]
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