<?php

/**
* Club form.
*
* @package    proy
* @subpackage form
* @author     Your name here
* @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class ClubForm extends BaseClubForm
{
	public function configure()
	{
		$this->setWidget('escudo', new sfWidgetFormInputFile());
		$this->setValidator('escudo', new sfValidatorFile(array(
			'mime_types' => 'web_images',
			'path' => sfConfig::get('sf_upload_dir').'/escudos',
			'required' => false
			)));
		$this->setWidget('foto_campo', new sfWidgetFormInputFile());
		$this->setValidator('foto_campo', new sfValidatorFile(array(
			'mime_types' => 'web_images',
			'path' => sfConfig::get('sf_upload_dir').'/campos',
			'required' => false
			)));
	}
}
