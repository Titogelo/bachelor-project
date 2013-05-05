<?php

/**
 * Jornada form base class.
 *
 * @method Jornada getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJornadaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idjornada'    => new sfWidgetFormInputHidden(),
      'numjornada'   => new sfWidgetFormInputText(),
      'fechajornada' => new sfWidgetFormDateTime(),
      'nombre'       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'idjornada'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idjornada')), 'empty_value' => $this->getObject()->get('idjornada'), 'required' => false)),
      'numjornada'   => new sfValidatorInteger(),
      'fechajornada' => new sfValidatorDateTime(),
      'nombre'       => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('jornada[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Jornada';
  }

}
