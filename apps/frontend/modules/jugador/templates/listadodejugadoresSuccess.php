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
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getPersona()->getNombre()).'",';		// 1
		$sOutput .= '"'.str_replace('"', '\"', date("Y")-$aRow->getPersona()->getEdad()).'",';	// 2
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getEquipo()->getClub()->getNombre()).'",';			// 3
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getGoles()->count()).'",';				// 4
		$sOutput .= '"'.str_replace('"', '\"', "../uploads/personas/".$aRow->getPersona()->getFoto()).'",';
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getAmarillas()).'",';			// 6
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getRojas()).'",';				// 7
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getPosicion()).'",';					// 8
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getIdjugador()).'",';			// 9
		$sOutput .= '"'.str_replace('"', '\"', $aRow->getIdequipo()).'"';			// 9
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
			return "edad";
		else if ( $i == 3 )
			return "equipo";
		else if ( $i == 4 )
			return "puesto";
	}
?>