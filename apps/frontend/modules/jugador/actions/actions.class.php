<?php

/**
* jugador actions.
*
* @package    proy
* @subpackage jugador
* @author     Your name here
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class jugadorActions extends sfActions
{
	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex(sfWebRequest $request)
	{

	}
	
	public function executeComparar(sfWebRequest $request){
		$this->parametros = $request->getParameterHolder();
		
	}
	
	public function executeShow(sfWebRequest $request){
		$jugador = $request->getParameter('id');
		
		$this->datos_jugador = Doctrine_Query::create()
		->select('*')
		->from('Jugador e')
		->where('e.idJugador = ?', $jugador)
		->limit('1')
		->execute();
	}
	
	public function executeListadodejugadores(sfWebRequest $request)
	{
		$sWhere1 = "";
		$sWhere2 = "";
		$sWhere3 = "";
		$sWhere4 = "";
		$sWhere5 = "";
		
		if ( $request->getParameter('sSearch') != "" )
		{
			$sWhere = " j.idJugador LIKE '%".mysql_real_escape_string( $request->getParameter('sSearch') )."%' OR ".
			"p.nombre LIKE '%".mysql_real_escape_string($request->getParameter('sSearch') )."%' OR ".
			"j.posicion LIKE '%".mysql_real_escape_string( $request->getParameter('sSearch') )."%'";
			
			$rResult = Doctrine_Query::create()
			->select('*')
			->from('Jugador j')
			->innerjoin('j.Persona p')
			->where('j.idJugador > ? ',$request->getParameter('iDisplayStart'))
			->addWhere($sWhere)
			->limit($request->getParameter('iDisplayLength'))
			->execute();
		}else{
			$rResult = Doctrine_Query::create()
			->select('*')
			->from('Jugador j')
			->innerjoin('j.Persona p')
			->where('j.idJugador > ? ',$request->getParameter('iDisplayStart'))
			->limit($request->getParameter('iDisplayLength'))
			->execute();
		}
		
		$this->rResult = $rResult;	
		
		$this->iFilteredTotal = Doctrine_Query::create()
		->select('FOUND_ROWS()')
		->from('Jugador')
		->execute();

		$rResult1 = Doctrine_Query::create()
		->select('*')
		->from('Jugador')
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
		->from('Jugador j')
		->innerjoin('j.Persona p')
		->where('j.idJugador = ? ',$id)
		->execute();
		
		
		
		foreach($datos as $dato){
			$pdf->Line(15, 60, 195, 60, ''); 
			$pdf->SetXY(20, 25);
			$pdf->Image('images/logo.png', '', '', 25, 25, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
			$pdf->SetFont('FreeSerif', 'I', 20);
			$pdf->MultiCell(150, 5, "Club Deportivo Vallobin" , 0, 'L', 0, 0, '60', '25', true);
			$pdf->SetFont('FreeSerif', '', 15);
			$pdf->MultiCell(150, 5, "C\ Doctor Solis Cajigal S/N" , 0, 'L', 0, 0, '60', '35', true);
		
			$edad = date('Y') - $dato->getPersona()->getEdad();
		
			// Datos del jugador
			$pdf->SetFont('FreeSerif', '', 8);
			$pdf->SetXY(20, 70);
			if($dato->getPersona()->getFoto() == ""){
				$pdf->Image('images/foto_perfiles/negro.jpg', '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
			}
			else{
				$pdf->Image('uploads/personas/'.$dato->getPersona()->getFoto(), '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
			}

			$pdf->SetFont('FreeSerif', 'BU', 12);
			$pdf->MultiCell(100, 5, "Datos Personales" , 0, 'L', 0, 0, '70', '75', true);
			$pdf->SetFont('FreeSerif', 'B', 12);
			$pdf->MultiCell(100, 5, "Nombre: ".$dato->getPersona()->getNombre() , 0, 'L', 0, 0, '80', '85', true);
			$pdf->MultiCell(100, 5, "Apellidos: ".$dato->getPersona()->getApellidos() , 0, 'L', 0, 0, '80', '92', true);
			$pdf->MultiCell(100, 5, "Año de nacimientos: ".$dato->getPersona()->getEdad() , 0, 'L', 0, 0, '80', '99', true);
			$pdf->MultiCell(100, 5, "Edad: ".$edad , 0, 'L', 0, 0, '80', '106', true);
		
			$pdf->SetFont('FreeSerif', 'BU', 12);
			$pdf->MultiCell(100, 5, "Datos Deportivos" , 0, 'L', 0, 0, '20', '125', true);
			$pdf->SetFont('FreeSerif', 'B', 12);
			$pdf->MultiCell(100, 5, "Goles: ".$dato->getGoles()->count() , 0, 'L', 0, 0, '30', '135', true);
			$pdf->MultiCell(100, 5, "Amarillas: ".$dato->getAmarillas() , 0, 'L', 0, 0, '30', '142', true);
			$pdf->MultiCell(100, 5, "Rojas: ".$dato->getRojas() , 0, 'L', 0, 0, '30', '149', true);
			$pdf->MultiCell(100, 5, "Peso: ".$dato->getPeso() , 0, 'L', 0, 0, '30', '156', true);
			$pdf->MultiCell(100, 5, "Altura: ".$dato->getAltura() , 0, 'L', 0, 0, '30', '163', true);
			
			$pdf->SetFont('FreeSerif', 'BU', 12);
			$pdf->MultiCell(100, 5, "Trayectoria" , 0, 'L', 0, 0, '20', '180', true);
			$pdf->SetFont('FreeSerif', 'BU', 12);
			
			$pdf->MultiCell(50, 5, "Club" , 1, 'C', 0, 1, '50', '195', true);
			$pdf->MultiCell(50, 5, "Años" , 1, 'C', 0, 0, '100', '195', true);
			$pdf->SetFont('FreeSerif', '', 12);
			$pdf->MultiCell(50, 5, "Real Aviles" , 1, 'C', 0, 1, '50', '202', true);
			$pdf->MultiCell(50, 5, "1999 a 2003" , 1, 'C', 0, 0, '100', '202', true);
			$pdf->MultiCell(50, 5, "Real Oviedo" , 1, 'C', 0, 1, '50', '209', true);
			$pdf->MultiCell(50, 5, "2003 a 2007" , 1, 'C', 0, 0, '100', '209', true);
			$pdf->MultiCell(50, 5, "Vallobin" , 1, 'C', 0, 1, '50', '216', true);
			$pdf->MultiCell(50, 5, "2007 a 2011" , 1, 'C', 0, 0, '100', '216', true);
			
			$pdf->MultiCell(50, 5, "Sello del club" , 0, 'C', 0, 0, '140', '270', true);
			$pdf->MultiCell(50, 30, "" , 1, 'C', 0, 0, '140', '237', true);
			
			$pdf->MultiCell(50, 5, "Firma del jugador" , 0, 'C', 0, 0, '80', '270', true);
			$pdf->MultiCell(50, 30, "" , 1, 'C', 0, 0, '80', '237', true);
			
			$pdf->MultiCell(50, 5, "Firma del Presidente" , 0, 'C', 0, 0, '20', '270', true);
			$pdf->MultiCell(50, 30, "" , 1, 'C', 0, 0, '20', '237', true);
			
			$pdf->ln();
			$pdf->Output($dato->getIdJugador().'_'.$dato->getEquipo()->getNombre().'_'.$dato->getPersona()->getNombre().'_'.$dato->getPersona()->getApellidos().'.pdf', 'I');
		}
		
		/*$pdf->MultiCell(55, 5, '[RIGHT] '.$txt, 1, 'R', 0, 1, '', '', true);
		$pdf->MultiCell(55, 5, '[CENTER] '.$txt, 1, 'C', 0, 0, '', '', true);
		$pdf->MultiCell(55, 5, '[JUSTIFY] '.$txt."\n", 1, 'J', 1, 2, '' ,'', true);
		$pdf->MultiCell(55, 5, '[DEFAULT] '.$txt, 1, '', 0, 1, '', '', true);
		$pdf->Ln(4);
		// set color for background
		$pdf->SetFillColor(220, 255, 220);
		// Vertical alignment
		$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - TOP] '.$txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'T');
		$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - MIDDLE] '.$txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'M');
		$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - BOTTOM] '.$txt, 1, 'J', 1, 1, '', '', true, 0, false, true, 40, 'B');
		$pdf->Ln(4);
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// set color for background
		$pdf->SetFillColor(215, 235, 255);
		// set some text for example
		$txt = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.
		Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.';
		// print a blox of text using multicell()
		$pdf->MultiCell(80, 5, $txt."\n", 1, 'J', 1, 1, '' ,'', true);
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// AUTO-FITTING
		// set color for background
		$pdf->SetFillColor(255, 235, 235);
		// Fit text on cell by reducing font size
		$pdf->MultiCell(55, 60, '[FIT CELL] '.$txt."\n", 1, 'J', 1, 1, 125, 145, true, 0, false, true, 60, 'M', true);
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// CUSTOM PADDING
		// set color for background
		$pdf->SetFillColor(255, 255, 215);
		// set font
		$pdf->SetFont('helvetica', '', 8);
		// set cell padding
		$pdf->setCellPaddings(2, 4, 6, 8);
		$txt = "CUSTOM PADDING:\nLeft=2, Top=4, Right=6, Bottom=8\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue.\n";
		$pdf->MultiCell(55, 5, $txt, 1, 'J', 1, 2, 125, 210, true);
		// move pointer to last page
		$pdf->lastPage();
		*/
		/*$pdf->writeHTML($this->html);*/


		throw new sfStopException();
	}
	
	
	public function executeReporte2(sfWebRequest $request)
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
		

		
		$html = '
		<!-- EXAMPLE OF CSS STYLE -->
		<style>
		    h1 {
		        color: navy;
		        font-family: times;
		        font-size: 24pt;
		        text-decoration: underline;
		    }
		    p.first {
		        color: #003300;
		        font-family: helvetica;
		        font-size: 12pt;
		    }
		    p.first span {
		        color: #006600;
		        font-style: italic;
		    }
		    p#second {
		        color: rgb(00,63,127);
		        font-family: times;
		        font-size: 12pt;
		        text-align: justify;
		    }
		    p#second > span {
		        background-color: #FFFFAA;
		    }
		    table.first {
		        color: #003300;
		        font-family: helvetica;
		        font-size: 8pt;
		        border-left: 3px solid red;
		        border-right: 3px solid #FF00FF;
		        border-top: 3px solid green;
		        border-bottom: 3px solid blue;
		        background-color: #ccffcc;
		    }
		    td {
		        border: 2px solid blue;
		        background-color: #ffffee;
		    }
		    td.second {
		        border: 2px dashed green;
		    }
		    div.test {
		        color: #CC0000;
		        background-color: #FFFF66;
		        font-family: helvetica;
		        font-size: 10pt;
		        border-style: solid solid solid solid;
		        border-width: 2px 2px 2px 2px;
		        border-color: green #FF00FF blue red;
		        text-align: center;
		    }
		</style>

		<h1 class="title">Example of <i style="color:#990000">XHTML + CSS</i></h1>

		<p class="first">Example of paragraph with class selector. <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.</span></p>

		<p id="second">Example of paragraph with ID selector. <span>Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.</span></p>

		<div class="test">example of DIV with border and fill.<br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus.</div>

		<br />

		<table class="first" cellpadding="4" cellspacing="6">
		 <tr>
		  <td width="30" align="center"><b>No.</b></td>
		  <td width="140" align="center" bgcolor="#FFFF00"><b>XXXX</b></td>
		  <td width="140" align="center"><b>XXXX</b></td>
		  <td width="80" align="center"> <b>XXXX</b></td>
		  <td width="80" align="center"><b>XXXX</b></td>
		  <td width="45" align="center"><b>XXXX</b></td>
		 </tr>
		 <tr>
		  <td width="30" align="center">1.</td>
		  <td width="140" rowspan="6" class="second">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
		  <td width="140">XXXX<br />XXXX</td>
		  <td width="80">XXXX<br />XXXX</td>
		  <td width="80">XXXX</td>
		  <td align="center" width="45">XXXX<br />XXXX</td>
		 </tr>
		 <tr>
		  <td width="30" align="center" rowspan="3">2.</td>
		  <td width="140" rowspan="3">XXXX<br />XXXX</td>
		  <td width="80">XXXX<br />XXXX</td>
		  <td width="80">XXXX<br />XXXX</td>
		  <td align="center" width="45">XXXX<br />XXXX</td>
		 </tr>
		 <tr>
		  <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
		  <td width="80">XXXX<br />XXXX</td>
		  <td align="center" width="45">XXXX<br />XXXX</td>
		 </tr>
		 <tr>
		  <td width="80" rowspan="2" >XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
		  <td width="80">XXXX<br />XXXX</td>
		  <td align="center" width="45">XXXX<br />XXXX</td>
		 </tr>
		 <tr>
		  <td width="30" align="center">3.</td>
		  <td width="140">XXXX<br />XXXX</td>
		  <td width="80">XXXX<br />XXXX</td>
		  <td align="center" width="45">XXXX<br />XXXX</td>
		 </tr>
		 <tr bgcolor="#FFFF80">
		  <td width="30" align="center">4.</td>
		  <td width="140" bgcolor="#00CC00" color="#FFFF00">XXXX<br />XXXX</td>
		  <td width="80">XXXX<br />XXXX</td>
		  <td width="80">XXXX<br />XXXX</td>
		  <td align="center" width="45">XXXX<br />XXXX</td>
		 </tr>
		</table>';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
			
		$pdf->ln();
		$pdf->Output('ejemplo.pdf', 'I');
	


		throw new sfStopException();
	}

}
