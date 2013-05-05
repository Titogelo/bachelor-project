<?php

/**
 * Persona form base class.
 *
 * @method Persona getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePersonaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpersona'  => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInputText(),
      'apellidos'  => new sfWidgetFormTextarea(),
      'edad'       => new sfWidgetFormInputText(),
      'nif'        => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'foto'       => new sfWidgetFormTextarea(),
      'idclub'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Club'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'idpersona'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpersona')), 'empty_value' => $this->getObject()->get('idpersona'), 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 150)),
      'apellidos'  => new sfValidatorString(array('required' => false)),
      'edad'       => new sfValidatorInteger(array('required' => false)),
      'nif'        => new sfValidatorString(array('max_length' => 9, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'foto'       => new sfValidatorString(array('required' => false)),
      'idclub'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Club'))),
    ));

    $this->widgetSchema->setNameFormat('persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Persona';
  }

}
