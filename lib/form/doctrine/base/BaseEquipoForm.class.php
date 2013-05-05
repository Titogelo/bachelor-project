<?php

/**
 * Equipo form base class.
 *
 * @method Equipo getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEquipoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idequipo'     => new sfWidgetFormInputHidden(),
      'numjugadores' => new sfWidgetFormInputText(),
      'nombre'       => new sfWidgetFormInputText(),
      'idclub'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Club'), 'add_empty' => false)),
      'imagen'       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'idequipo'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idequipo')), 'empty_value' => $this->getObject()->get('idequipo'), 'required' => false)),
      'numjugadores' => new sfValidatorInteger(),
      'nombre'       => new sfValidatorString(array('max_length' => 150)),
      'idclub'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Club'))),
      'imagen'       => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipo';
  }

}
