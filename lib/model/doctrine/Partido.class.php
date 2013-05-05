<?php

/**
 * Partido
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    proy
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Partido extends BasePartido
{
	public function  __toString(){
		return "Jornada:".$this->getJornada()." | ".$this->getEquipo()." - ".$this->getEquipo_4();
	}
	
	public function getNombreEquipoLocal()
	{
		return $this->getEquipo()->getNombre();
	}
	
	public function getNombreEquipoVisitante()
	{
		return $this->getEquipo_3()->getNombre();
	}
	
	public function postSave($obj){
		Clasificacion::actualizar_clasificacion($this);
		Clasificacion::actualizar_posiciones_clasificacion($this);
	}
}
