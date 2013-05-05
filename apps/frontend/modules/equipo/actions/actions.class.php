<?php

/**
* equipo actions.
*
* @package    proy
* @subpackage equipo
* @author     Your name here
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class equipoActions extends sfActions
{
	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex(sfWebRequest $request){
		
	}

	public function executeShow(sfWebRequest $request){
		$idequipo = $request->getParameter('id');
		
		$this->datos_equipo = Doctrine_Query::create()
		->select('*')
		->from('Equipo e')
		->where('e.idEquipo = ?', $idequipo)
		->limit('1')
		->execute();
		
		$this->datos_clasificacion = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion c')
		->innerjoin('c.Jornada j')
		->where('c.idEquipo = ?', $idequipo)
		->orderby('j.numjornada DESC')
		->limit('1')
		->execute();
		
		$this->entrenador = Doctrine_Query::create()
		->select('*')
		->from('Entrenador e')
		->where('e.idEquipo = ?', $idequipo)
		->limit('1')
		->execute();

		$this->jugadores = Doctrine_Query::create()
		->select('*')
		->from('Jugador j')
		->innerjoin('j.Equipo e')
		->where('j.idEquipo = ?', array($idequipo))
		->execute();

		
		$this->jugadores_delanteros = Doctrine_Query::create()
		->select('*')
		->from('Jugador j')
		->innerjoin('j.Equipo e')
		->where('j.idEquipo = ? and j.Posicion = ?', array($idequipo, 'Delantero'))
		->execute();
		
		$this->jugadores_porteros = Doctrine_Query::create()
		->select('*')
		->from('Jugador j')
		->innerjoin('j.Equipo e')
		->where('j.idEquipo = ? and j.Posicion = ?', array($idequipo, 'Portero'))
		->execute();
		
		$this->jugadores_medios = Doctrine_Query::create()
		->select('*')
		->from('Jugador j')
		->innerjoin('j.Equipo e')
		->where('j.idEquipo = ? and j.Posicion = ?', array($idequipo, 'Medio'))
		->execute();
		
		$this->jugadores_defensas = Doctrine_Query::create()
		->select('*')
		->from('Jugador j')
		->innerjoin('j.Equipo e')
		->where('j.idEquipo = ? and j.Posicion = ?', array($idequipo, 'Defensa'))
		->execute();
	}
	
	public function executeListadodeequipos(sfWebRequest $request)
	{
		$sWhere1 = "";
		$sWhere2 = "";
		$sWhere3 = "";
		$sWhere4 = "";
		$sWhere5 = "";

		if ( $request->getParameter('sSearch') != "" )
		{
			$sWhere = " e.idEquipo LIKE '%".mysql_real_escape_string( $request->getParameter('sSearch') )."%' OR ".
			"e.nombre LIKE '%".mysql_real_escape_string($request->getParameter('sSearch') )."%'";
			
			$rResult = Doctrine_Query::create()
			->select('*')
			->from('Equipo e')
			->where('e.idEquipo > ? ',$request->getParameter('iDisplayStart'))
			->addWhere($sWhere)
			->limit($request->getParameter('iDisplayLength'))
			->execute();
		}else{
			$rResult = Doctrine_Query::create()
			->select('*')
			->from('Equipo e')
			->where('e.idEquipo > ? ',$request->getParameter('iDisplayStart'))
			->limit($request->getParameter('iDisplayLength'))
			->execute();
		}

		$this->rResult = $rResult;	

		$this->iFilteredTotal = Doctrine_Query::create()
		->select('FOUND_ROWS()')
		->from('Equipo')
		->execute();

		$rResult1 = Doctrine_Query::create()
		->select('*')
		->from('Equipo')
		->execute();

		$this->iTotal = count($rResult1);

		$aux = intval($request->getParameter('sEcho'));
		$this->sEcho = $aux;
	}

	public function fnColumnToField( $i )
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
	
	public function executeReporte(sfWebRequest $request)
	{
		$config = sfTCPDFPluginConfigHandler::loadConfig();

		$pdf = new sfTCPDF();

		$pdf->SetFont('FreeSerif', '', 8);

		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', '13'));
		$pdf->SetHeaderData('', 2, 'Club Deportivo Vallobín', 'Temporada 2010/2011');
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		/*$this->html = '
		<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
		<i>This is the first example of TCPDF library.</i>
		<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
		<p>Please check the source code documentation and other examples for further information.</p>
		<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
		';
		*/
		
		$id = $request->getParameter('id');
		
		$datos = Doctrine_Query::create()
		->select('*')
		->from('Equipo j')
		->where('j.idEquipo = ? ',$id)
		->execute();
		
		
		
		foreach($datos as $dato){
			$pdf->Line(15, 60, 195, 60, ''); 
			$pdf->SetXY(20, 25);
			$pdf->Image('images/logo.png', '', '', 25, 25, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
			$pdf->SetFont('FreeSerif', 'I', 20);
			$pdf->MultiCell(150, 5, "Club Deportivo Vallobin" , 0, 'L', 0, 0, '60', '25', true);
			$pdf->SetFont('FreeSerif', '', 15);
			$pdf->MultiCell(150, 5, "C\ Doctor Solis Cajigal S/N" , 0, 'L', 0, 0, '60', '35', true);
		
			// Datos del equipo
			$pdf->SetFont('FreeSerif', '', 8);
			$pdf->SetXY(20, 70);
			if($dato->getImagen() == ""){
				$pdf->Image('images/foto_perfiles/negro.jpg', '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
			}
			else{
				$pdf->Image('uploads/foto_equipo/'.$dato->getImagen(), '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
			}

			$pdf->SetFont('FreeSerif', 'BU', 12);
			$pdf->MultiCell(100, 5, "Datos Personales" , 0, 'L', 0, 0, '70', '75', true);
			$pdf->SetFont('FreeSerif', 'B', 12);
			$pdf->MultiCell(100, 5, "Nombre: ".$dato->getNombre() , 0, 'L', 0, 0, '80', '85', true);
			$pdf->MultiCell(100, 5, "Club: ".$dato->getClub()->getNombre() , 0, 'L', 0, 0, '80', '92', true);
			$pdf->MultiCell(100, 5, "Entrenador: Daniel " , 0, 'L', 0, 0, '80', '99', true);
			$pdf->MultiCell(100, 5, "Delegado: Miguel" , 0, 'L', 0, 0, '80', '106', true);
			
			$pdf->SetFont('FreeSerif', 'BU', 12);
			$pdf->MultiCell(100, 5, "Plantilla" , 0, 'L', 0, 0, '20', '125', true);
			$pdf->SetFont('FreeSerif', 'BU', 12);
			
			$datos1 = Doctrine_Query::create()
			->select('*')
			->from('Jugador j')
			->where('j.idEquipo = ? ',$id)
			->execute();
			
			$posY = 135;
			//$posY = 240;
			
			$posY = $posY + 7;
			
			$pdf->MultiCell(70, 5,"Nombre" , 1, 'C', 0, 1, '40', $posY, true);
			$pdf->MultiCell(70, 5, "Posicion", 1, 'C', 0, 0, '110', $posY, true);
			$pdf->SetFont('FreeSerif', '', 12);
			
			$posY = $posY + 7;
			
			foreach($datos1 as $dato1){
				$pdf->MultiCell(70, 5, $dato1->getPersona()->getNombre()." ".$dato1->getPersona()->getApellidos() , 1, 'C', 0, 1, '40', $posY, true);
				$pdf->MultiCell(70, 5, $dato1->getPosicion()  , 1, 'C', 0, 0, '110', $posY, true);
				$posY = $posY + 7;
			}
			
			$posY = $posY + 40;
			
			if($posY >= 270){
				$pos1 = $posY-33;
				$pdf->MultiCell(50, 5, "Sello del club" , 0, 'C', 0, 0, '140', $posY, true);
				$pdf->MultiCell(50, 30, "" , 1, 'C', 0, 0, '140', $pos1, true);

				$pdf->MultiCell(50, 5, "Firma del jugador" , 0, 'C', 0, 0, '80', $posY, true);
				$pdf->MultiCell(50, 30, "" , 1, 'C', 0, 0, '80', $pos1, true);

				$pdf->MultiCell(50, 5, "Firma del Presidente" , 0, 'C', 0, 0, '20', $posY, true);
				$pdf->MultiCell(50, 30, "" , 1, 'C', 0, 0, '20', $pos1, true);
			}
			else{
				$pdf->MultiCell(50, 5, "Sello del club" , 0, 'C', 0, 0, '140', '270', true);
				$pdf->MultiCell(50, 30, "" , 1, 'C', 0, 0, '140', '237', true);

				$pdf->MultiCell(50, 5, "Firma del entrenador" , 0, 'C', 0, 0, '80', '270', true);
				$pdf->MultiCell(50, 30, "" , 1, 'C', 0, 0, '80', '237', true);

				$pdf->MultiCell(50, 5, "Firma del Presidente" , 0, 'C', 0, 0, '20', '270', true);
				$pdf->MultiCell(50, 30, "" , 1, 'C', 0, 0, '20', '237', true);
			}

			
			$pdf->ln();
			$pdf->Output($dato->getIdEquipo().'_'.$dato->getNombre().'.pdf', 'I');
		}


		throw new sfStopException();
	}	
}
