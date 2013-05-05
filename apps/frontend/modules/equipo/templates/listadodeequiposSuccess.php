<?php
	$sOutput = '{';
	$sOutput .= '"sEcho": '.$sEcho.', ';
	$sOutput .= '"iTotalRecords": '.$iTotal.', ';
	$sOutput .= '"iTotalDisplayRecords": '.$iTotal.', ';
	$sOutput .= '"aaData": [ ';
	//while ( $aRow = mysql_fetch_array( $rResult ) )
	foreach($rResult as $aRow)
	{
		$sOutput .= "[";
		$sOutput .= '"<img src=\"../images/details_open.png\">",'; 				// 0
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getNombre()).'",';			// 1
		$sOutput .= '"'.str_replace('"', '\"', "../uploads/foto_equipo/".$aRow->getImagen()).'",';  // 2
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getNumjugadores()).'",';			// 3
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getClub()->getNombre()).'",';		// 4
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getIdequipo()).'",';			// 5
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getIdclub()).'"';				// 6

		$sOutput .= "],";
	}
	$sOutput = substr_replace( $sOutput, "", -1 );
	$sOutput .= '] }';
	echo $sOutput;
	
	function fnColumnToField( $i )
	{
		/* Note that column 0 is the details column */
		if ( $i == 0 ||$i == 1 )
			return "nombre";
		else if ( $i == 2 )
			return "numero";
		else if ( $i == 3 )
			return "club";
	}
?>