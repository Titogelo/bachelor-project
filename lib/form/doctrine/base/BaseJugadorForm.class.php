<?php

/**
 * Jugador form base class.
 *
 * @method Jugador getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJugadorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idjugador' => new sfWidgetFormInputHidden(),
      'idpersona' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => false)),
      'goles'     => new sfWidgetFormInputText(),
      'altura'    => new sfWidgetFormInputText(),
      'peso'      => new sfWidgetFormInputText(),
      'amarillas' => new sfWidgetFormInputText(),
      'rojas'     => new sfWidgetFormInputText(),
      'idequipo'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'), 'add_empty' => false)),
      'posicion'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idjugador' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idjugador')), 'empty_value' => $this->getObject()->get('idjugador'), 'required' => false)),
      'idpersona' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'))),
      'goles'     => new sfValidatorInteger(array('required' => false)),
      'altura'    => new sfValidatorNumber(array('required' => false)),
      'peso'      => new sfValidatorNumber(array('required' => false)),
      'amarillas' => new sfValidatorInteger(array('required' => false)),
      'rojas'     => new sfValidatorInteger(array('required' => false)),
      'idequipo'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'))),
      'posicion'  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('jugador[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Jugador';
  }

}
