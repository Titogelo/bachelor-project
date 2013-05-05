<?php

/**
 * Directivo filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDirectivoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpersona'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => true)),
      'cargo'         => new sfWidgetFormFilterInput(),
      'antecesor'     => new sfWidgetFormFilterInput(),
      'observaciones' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'idpersona'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Persona'), 'column' => 'idpersona')),
      'cargo'         => new sfValidatorPass(array('required' => false)),
      'antecesor'     => new sfValidatorPass(array('required' => false)),
      'observaciones' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('directivo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Directivo';
  }

  public function getFields()
  {
    return array(
      'iddirectivo'   => 'Number',
      'idpersona'     => 'ForeignKey',
      'cargo'         => 'Text',
      'antecesor'     => 'Text',
      'observaciones' => 'Text',
    );
  }
}
