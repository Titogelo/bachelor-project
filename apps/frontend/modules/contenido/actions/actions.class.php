<?php

/**
 * contenido actions.
 *
 * @package    proy
 * @subpackage contenido
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contenidoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	public function executeIndex(sfWebRequest $request)
	{
		$this->temporadas = Doctrine_Core::getTable('Temporada')
			->createQuery('a')
			->execute();

		$this->categorias = Doctrine_Core::getTable('Categoria')
			->createQuery('a')
			->execute();

		$this->jornadas = Doctrine_Core::getTable('Jornada')
			->createQuery('a')
			->execute();
	}
	
	public function executeTemporadas(sfWebRequest $request){
		$temporada = $request->getParameter('temporada');
		
		$this->categorias = Doctrine_Core::getTable('Categoria')
		->createQuery('a')
		->where('idTemporada = ?', $temporada )
		->execute();
	}
	
	public function executeCategorias(sfWebRequest $request){
		$temporada = $request->getParameter('temporada');
		$categoria = $request->getParameter('categoria');
		
		$jornadas = Doctrine_Query::create()
		->select('u.idCategoria, p.idClasificacion, j.idJornada as id_jornada, j.numJornada as num_jornada, j.idJornada')
		->from('Jornada j')
		->innerjoin('j.Clasificacion p ON j.idJornada = p.idJornada')
		->innerjoin('p.Categoria u ON u.idCategoria = p.idCategoria')
		->where('idTemporada = ?', $temporada )
		->andWhere('p.idCategoria = ?', $categoria)
		->execute();
		
		$this->jornadas = $jornadas;
	}
	
	public function executeJornadas(sfWebRequest $request){
		$temporada = $request->getParameter('temporada');
		$categoria = $request->getParameter('categoria');
		$jornada = $request->getParameter('jornada');
		
		if($jornada == -1){
			// Se paso un -1, hay que mostrar todas las jornadas
			$this->todo = 1;
			$this->jornada = 0;
		}else{
			// Se paso un num distinto de -1, se muestra la jornada indicada.
			$this->todo = 0;
			$this->jornada = $jornada;
			
		}
	}
	
	public function executeAcciones(sfWebRequest $request){
		$temporada = $request->getParameter('temporada');
		$categoria = $request->getParameter('categoria');
		$jornada = $request->getParameter('jornada');
		$accion = $request->getParameter('accion');

		switch ($accion) {
			case 1:
				$this->getRequest()->setParameter('temporada', $temporada);
				$this->getRequest()->setParameter('categoria', $categoria);
				$this->getRequest()->setParameter('jornada', $jornada);
				
				$this->forward('contenido', 'resultados');
			break;
			case 2:
				$this->getRequest()->setParameter('temporada', $temporada);
				$this->getRequest()->setParameter('categoria', $categoria);
				$this->getRequest()->setParameter('jornada', $jornada);
				
				$this->forward('contenido', 'clasificacion');
			break;
			case "3":
				$this->getRequest()->setParameter('temporada', $temporada);
				$this->getRequest()->setParameter('categoria', $categoria);
				$this->getRequest()->setParameter('jornada', $jornada);
				
				$this->forward('contenido', 'horarios');
			break;
			case "4":
				$this->getRequest()->setParameter('temporada', $temporada);
				$this->getRequest()->setParameter('categoria', $categoria);
				$this->getRequest()->setParameter('jornada', $jornada);
			
				$this->forward('contenido', 'goleadores');
			break;
			case "5":
				echo "Todo";
			break;
		}
	}
	
	public function executeClasificacion(sfWebRequest $request){
		
		$temporada = $this->getRequest()->getParameter('temporada');
		$categoria = $this->getRequest()->getParameter('categoria');
		$jornada = $this->getRequest()->getParameter('jornada');
		
		$this->titulo = "Clasificación";
		$this->jornada = $jornada;
		
		if ($jornada == 0)
		{
			$this->datos = Doctrine_Query::create()
			->select('p.idclasificacion, e.nombre, p.puntos')
			->from('Clasificacion p')
			->innerjoin('p.Jornada j')
			->innerjoin('p.Equipo e')
			->where('p.idCategoria = ?', $categoria)
			->orderBy('j.numJornada asc, p.puntos desc, p.favor desc, p.contra asc')
			->execute();
		}
		else{
			/*
			14 de junio de 2011
			Modificacion para que se puedan ver las clasificaciones por jornadas de otras ligas. Se pone el inner join de jornadas.
			*/
			$this->datos = Doctrine_Query::create()
			->select('p.idclasificacion distinct, e.nombre, p.puntos')
			->from('Clasificacion p')
			->innerjoin('p.Jornada j')
			->innerjoin('p.Equipo e')
			->where('p.idCategoria = ?', $categoria)
			->andWhere('j.numJornada = ?', $jornada)
			->groupBy('p.idclasificacion')
			->orderBy('p.puntos desc, p.favor desc, p.contra asc')
			->execute();
		}
	}
	
	public function executeResultados(sfWebRequest $request){
		
		$temporada = $this->getRequest()->getParameter('temporada');
		$categoria = $this->getRequest()->getParameter('categoria');
		$jornada = $this->getRequest()->getParameter('jornada');
		
		$this->titulo = "Resultados";
		$this->jornada = $jornada;
		
		if ($jornada == 0)
		{
			$this->datos = Doctrine_Query::create()
			->select('p.idEquipoLocal, p.idEquipoVisitante, p.golesLocal, p.golesVisitante')
			->from('Partido p')
			->innerjoin('p.Equipo e')
			->innerjoin('p.Categoria c')
			->where('idTemporada = ?', $temporada )
			->andWhere('p.idCategoria = ?', $categoria)
			->execute();
		}
		else{
			$this->datos = Doctrine_Query::create()
			->select('p.idEquipoLocal, p.idEquipoVisitante, p.golesLocal, p.golesVisitante')
			->from('Partido p')
			->innerjoin('p.Equipo e')
			->innerjoin('p.Jornada j')
			->innerjoin('p.Categoria c')
			->where('idTemporada = ?', $temporada )
			->andWhere('p.idCategoria = ?', $categoria)
			->andWhere('j.numJornada = ?', $jornada)
			->execute();
		}

	}
	
	public function executeHorarios(sfWebRequest $request){
		
		$temporada = $this->getRequest()->getParameter('temporada');
		$categoria = $this->getRequest()->getParameter('categoria');
		$jornada = $this->getRequest()->getParameter('jornada');
		
		$this->titulo = "Horarios";
		$this->jornada = $jornada;
		
		
		if ($jornada == 0)
		{
			$this->datos = Doctrine_Query::create()
			->select('p.idEquipoLocal, p.idEquipoVisitante, p.golesLocal, p.golesVisitante')
			->from('Partido p')
			->innerjoin('p.Categoria c ON c.idCategoria = p.idCategoria')
			->where('idTemporada = ?', $temporada )
			->andWhere('p.idCategoria = ?', $categoria)
			->execute();
		}
		else{
			$this->datos = Doctrine_Query::create()
			->select('p.idEquipoLocal, p.idEquipoVisitante, p.golesLocal, p.golesVisitante')
			->from('Partido p')
			->innerjoin('p.Jornada j ON j.idJornada = p.idJornada')
			->innerjoin('p.Categoria c ON c.idCategoria = p.idCategoria')
			->where('idTemporada = ?', $temporada )
			->andWhere('p.idCategoria = ?', $categoria)
			->andWhere('j.numJornada = ?', $jornada)
			->execute();
		}
	}
	
	public function executeGoleadores(sfWebRequest $request){
		
		$temporada = $this->getRequest()->getParameter('temporada');
		$categoria = $this->getRequest()->getParameter('categoria');
		$jornada = $this->getRequest()->getParameter('jornada');
		
		$this->titulo = "Horarios";
		/*
		$this->datos = Doctrine_Query::create()
		->select('p.idEquipoLocal, p.idEquipoVisitante, p.golesLocal, p.golesVisitante')
		->from('Goles g')
		->innerjoin('g.Partido')
		->innerjoin('g.Jugadores c ON c.idCategoria = p.idCategoria')
		->where('idTemporada = ?', $temporada )
		->andWhere('p.idCategoria = ?', $categoria)
		->andWhere('j.numJornada = ?', $jornada)
		->execute();
		*/
	}
	
	
	public function executeEquipo(sfWebRequest $request){
		
		$equipo = $this->getRequest()->getParameter('idequipo');
		
		$this->titulo = "Equipo";
		
		$this->datos = Doctrine_Query::create()
		->select('*')
		->from('Equipo g')
		->where('idEquipo = ?', $equipo )
		->execute();
	}
	
	public function executePuntos(sfWebRequest $request){
		$idclasificacion = $this->getRequest()->getParameter('idclasificacion');
		
		$datos = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion p')
		->where('p.idClasificacion = ?', $idclasificacion)
		->execute();
		
		$this->clasificacion = $datos;
		
		foreach ($datos as $dato) {
			
			$this->partido = Doctrine_Query::create()
			->select('*')
			->from('Partido p')
			->innerjoin('p.Jornada j')
			->where('p.idCategoria = ?', $dato->getIdcategoria() )
			->andWhere('p.idEquipolocal = ? AND p.goleslocal >= p.golesvisitante', array($dato->getIdequipo()) )
			->orWhere('p.idEquipovisitante = ? AND p.golesvisitante >= p.goleslocal ', array($dato->getIdequipo()) )
			->andWhere('j.numjornada <= ?',array($dato->getJornada()->getNumjornada()) )
			->orderBy('p.idJornada asc')
			->execute();
		}
	}
	
	public function executeFavor(sfWebRequest $request){
		$idclasificacion = $this->getRequest()->getParameter('idclasificacion');
		
		$datos = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion p')
		->where('p.idClasificacion = ?', $idclasificacion)
		->execute();
		
		$this->clasificacion = $datos;
		
		foreach ($datos as $dato) {
			
			$this->partido = Doctrine_Query::create()
			->select('*')
			->from('Partido p')
			->innerjoin('p.Jornada j')
			->where('p.idCategoria = ?', array($dato->getIdcategoria()) )
			->andWhere('p.idEquipolocal = ? AND p.goleslocal > 0 AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orWhere('p.idEquipovisitante = ? AND p.golesvisitante > 0 AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orderBy('p.idJornada asc')
			->execute();
		}
	}
	
	public function executeContra(sfWebRequest $request){
		$idclasificacion = $this->getRequest()->getParameter('idclasificacion');
		
		$datos = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion p')
		->where('p.idClasificacion = ?', $idclasificacion)
		->execute();
		
		$this->clasificacion = $datos;
		
		foreach ($datos as $dato) {
			
			$this->partido = Doctrine_Query::create()
			->select('*')
			->from('Partido p')
			->innerjoin('p.Jornada j')
			->where('p.idCategoria = ?', array($dato->getIdcategoria()) )
			->andWhere('p.idEquipolocal = ? AND p.golesvisitante > 0 AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orWhere('p.idEquipovisitante = ? AND p.goleslocal > 0 AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orderBy('p.idJornada asc')
			->execute();
		}
	}
	
	public function executeJugados(sfWebRequest $request){
		$idclasificacion = $this->getRequest()->getParameter('idclasificacion');
		
		$datos = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion p')
		->where('p.idClasificacion = ?', $idclasificacion)
		->execute();
		
		$this->clasificacion = $datos;
		
		foreach ($datos as $dato) {
			
			$this->partido = Doctrine_Query::create()
			->select('*')
			->from('Partido p')
			->innerjoin('p.Jornada j')
			->where('p.idCategoria = ?', array($dato->getIdcategoria()) )
			->andWhere('p.idEquipolocal = ? AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orWhere('p.idEquipovisitante = ? AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orderBy('p.idJornada asc')
			->execute();
		}
	}
	
	public function executeGanados(sfWebRequest $request){
		$idclasificacion = $this->getRequest()->getParameter('idclasificacion');
		
		$datos = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion p')
		->where('p.idClasificacion = ?', $idclasificacion)
		->execute();
		
		$this->clasificacion = $datos;
		
		foreach ($datos as $dato) {
			
			$this->partido = Doctrine_Query::create()
			->select('*')
			->from('Partido p')
			->innerjoin('p.Jornada j')
			->where('p.idCategoria = ?', array($dato->getIdcategoria()) )
			->andWhere('p.idEquipolocal = ? AND p.goleslocal > p.golesvisitante AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orWhere('p.idEquipovisitante = ? AND p.golesvisitante > p.goleslocal AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orderBy('p.idJornada asc')
			->execute();
		}
	}
	
	public function executeEmpatados(sfWebRequest $request){
		$idclasificacion = $this->getRequest()->getParameter('idclasificacion');
		
		$datos = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion p')
		->where('p.idClasificacion = ?', $idclasificacion)
		->execute();
		
		$this->clasificacion = $datos;
		
		foreach ($datos as $dato) {
			
			$this->partido = Doctrine_Query::create()
			->select('*')
			->from('Partido p')
			->innerjoin('p.Jornada j')
			->where('p.idCategoria = ?', array($dato->getIdcategoria()) )
			->andWhere('p.idEquipolocal = ? AND p.goleslocal = p.golesvisitante AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orWhere('p.idEquipovisitante = ? AND p.golesvisitante = p.goleslocal AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orderBy('p.idJornada asc')
			->execute();
		}
	}
	
	public function executePerdidos(sfWebRequest $request){
		$idclasificacion = $this->getRequest()->getParameter('idclasificacion');
		
		$datos = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion p')
		->where('p.idClasificacion = ?', $idclasificacion)
		->execute();
		
		$this->clasificacion = $datos;
		
		foreach ($datos as $dato) {
			
			$this->partido = Doctrine_Query::create()
			->select('*')
			->from('Partido p')
			->innerjoin('p.Jornada j')
			->where('p.idCategoria = ?', array($dato->getIdcategoria()) )
			->andWhere('p.idEquipolocal = ? AND p.goleslocal < p.golesvisitante AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orWhere('p.idEquipovisitante = ? AND p.golesvisitante < p.goleslocal AND j.numjornada <= ?', array($dato->getIdequipo(),$dato->getJornada()->getNumjornada()) )
			->orderBy('p.idJornada asc')
			->execute();
		}
	}
	
	public function executeCompara(sfWebRequest $request){
		$idclasificacion_equipo1 = $this->getRequest()->getParameter('equipo1');
		$idclasificacion_equipo2 = $this->getRequest()->getParameter('equipo2');
		
		$datos_equipo1 = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion p')
		->where('p.idClasificacion = ?', $idclasificacion_equipo1)
		->execute();
		
		$datos_equipo2 = Doctrine_Query::create()
		->select('*')
		->from('Clasificacion p')
		->where('p.idClasificacion = ?', $idclasificacion_equipo2)
		->execute();
		
		// Cálculos para equipo 1
		$this->dato_equipo1 = $datos_equipo1;

		// Cálculos para equipo 2
		$this->dato_equipo2 = $datos_equipo2;


		// Grafica
		foreach ($datos_equipo1 as $equipo1) {
			$idequipo1 = $equipo1->getIdequipo();
			
			$this->evolucion_equipo1 = Doctrine_Query::create()
			->select('*')
			->from('Clasificacion p')
			->innerjoin('p.Jornada j')
			->where('p.idEquipo = ?', $idequipo1)
			->andWhere('j.numjornada <= ?', $equipo1->getJornada()->getNumjornada())
			->execute();
		}
		
		foreach ($datos_equipo2 as $equipo2) {
			$idequipo2 = $equipo2->getIdequipo();
			
			$this->evolucion_equipo2 = Doctrine_Query::create()
			->select('*')
			->from('Clasificacion p')
			->innerjoin('p.Jornada j')
			->where('p.idEquipo = ?', $idequipo2)
			->andWhere('j.numjornada <= ?', $equipo2->getJornada()->getNumjornada())
			->execute();
		}
	}
}
