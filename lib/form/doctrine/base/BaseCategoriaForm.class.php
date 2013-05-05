<?php

/**
 * Categoria form base class.
 *
 * @method Categoria getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'      => new sfWidgetFormInputText(),
      'idtemporada' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Temporada'), 'add_empty' => false)),
      'idcategoria' => new sfWidgetFormInputHidden(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'nombre'      => new sfValidatorString(array('max_length' => 150)),
      'idtemporada' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Temporada'))),
      'idcategoria' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idcategoria')), 'empty_value' => $this->getObject()->get('idcategoria'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categoria';
  }

}
