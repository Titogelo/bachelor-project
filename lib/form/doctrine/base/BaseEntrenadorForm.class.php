<?php

/**
 * Entrenador form base class.
 *
 * @method Entrenador getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEntrenadorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'identrenador' => new sfWidgetFormInputHidden(),
      'idpersona'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => false)),
      'idequipo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'), 'add_empty' => false)),
      'activo'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'identrenador' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('identrenador')), 'empty_value' => $this->getObject()->get('identrenador'), 'required' => false)),
      'idpersona'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'))),
      'idequipo'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'))),
      'activo'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('entrenador[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Entrenador';
  }

}
