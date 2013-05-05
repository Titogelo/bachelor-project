<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idusuario' => new sfWidgetFormInputHidden(),
      'idpersona' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'idusuario' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idusuario')), 'empty_value' => $this->getObject()->get('idusuario'), 'required' => false)),
      'idpersona' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'))),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

}
