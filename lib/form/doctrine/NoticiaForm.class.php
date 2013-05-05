<?php

/**
* Noticia form.
*
* @package    proy
* @subpackage form
* @author     Your name here
* @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class NoticiaForm extends BaseNoticiaForm
{
	public function configure()
	{
		$this->setWidget('imagen', new sfWidgetFormInputFile());
		$this->setValidator('imagen', new sfValidatorFile(array(
			'mime_types' => 'web_images',
			'path' => sfConfig::get('sf_upload_dir').'/noticia',
			'required' => false
			)));
	}
}
