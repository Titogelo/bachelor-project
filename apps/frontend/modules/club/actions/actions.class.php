<?php

/**
* club actions.
*
* @package    proy
* @subpackage club
* @author     Your name here
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class clubActions extends sfActions
{
	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex(sfWebRequest $request)
	{
		$this->directivos = Doctrine_Query::create()
			->from('directivo d , d.Persona p')
			->where('p.idclub  = '.sfConfig::get('app_club_local'))
			->execute();
			
		$this->clubs = Doctrine_Query::create()
			->from('club c')
			->where('c.idclub  = '.sfConfig::get('app_club_local'))
			->execute();
	}
}
