<?php

/**
 * Jornada form.
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class JornadaForm extends BaseJornadaForm
{
  public function configure()
  {
	$this->setWidget('fechajornada', new sfWidgetFormJQueryDate(array(
	  'image'=> '../images/calendar.gif',
	  'config' => '{}'
	)));
  }
}
