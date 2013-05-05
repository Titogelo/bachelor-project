<?php

/**
* Persona form.
*
* @package    proy
* @subpackage form
* @author     Your name here
* @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class PersonaForm extends BasePersonaForm
{
	public function configure()
	{
		$this->setWidget('created_at', new sfWidgetFormJQueryDate(array(
			'image'  => '../../images/calendar.gif',
			'config' => '{}'
		)));
		$this->setWidget('updated_at', new sfWidgetFormJQueryDate(array(
			'image'  => '../../images/calendar.gif',
			'config' => '{}'
		)));
	
		
		$this->setWidget('foto', new sfWidgetFormInputFile());
		$this->setValidator('foto', new sfValidatorFile(array(
			'mime_types' => 'web_images',
			'path' => sfConfig::get('sf_upload_dir').'/personas',
			'required' => false
			)));
	}
}
