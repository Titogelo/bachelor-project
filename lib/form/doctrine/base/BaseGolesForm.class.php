<?php

/**
 * Goles form base class.
 *
 * @method Goles getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGolesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idgoles'   => new sfWidgetFormInputHidden(),
      'idpartido' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partido'), 'add_empty' => false)),
      'idjugador' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Jugador'), 'add_empty' => false)),
      'minuto'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idgoles'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idgoles')), 'empty_value' => $this->getObject()->get('idgoles'), 'required' => false)),
      'idpartido' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Partido'))),
      'idjugador' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Jugador'))),
      'minuto'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('goles[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Goles';
  }

}
