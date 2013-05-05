<?php

/**
 * Directivo form base class.
 *
 * @method Directivo getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDirectivoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'iddirectivo'   => new sfWidgetFormInputHidden(),
      'idpersona'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => false)),
      'cargo'         => new sfWidgetFormTextarea(),
      'antecesor'     => new sfWidgetFormTextarea(),
      'observaciones' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'iddirectivo'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('iddirectivo')), 'empty_value' => $this->getObject()->get('iddirectivo'), 'required' => false)),
      'idpersona'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'))),
      'cargo'         => new sfValidatorString(array('required' => false)),
      'antecesor'     => new sfValidatorString(array('required' => false)),
      'observaciones' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('directivo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Directivo';
  }

}
