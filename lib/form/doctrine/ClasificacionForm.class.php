<?php

/**
 * Clasificacion form.
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClasificacionForm extends BaseClasificacionForm
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
  }
}
