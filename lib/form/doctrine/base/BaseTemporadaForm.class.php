<?php

/**
 * Temporada form base class.
 *
 * @method Temporada getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTemporadaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idtemporada' => new sfWidgetFormInputHidden(),
      'anio'        => new sfWidgetFormInputText(),
      'nombre'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idtemporada' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idtemporada')), 'empty_value' => $this->getObject()->get('idtemporada'), 'required' => false)),
      'anio'        => new sfValidatorInteger(),
      'nombre'      => new sfValidatorString(array('max_length' => 150)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('temporada[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Temporada';
  }

}
