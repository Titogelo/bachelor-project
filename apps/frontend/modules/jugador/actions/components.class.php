<?php

class jugadorComponents extends sfComponents
{
	public function executeJugadoresequipo()
	{
		$idEquipo = $this->idEquipo;
		
		$this->jugadores_equipo = Doctrine_Query::create()
		->select('*')
		->from('Jugador e')
		->where('e.idEquipo = ?', $idEquipo)
		->execute();
	}
}
?>