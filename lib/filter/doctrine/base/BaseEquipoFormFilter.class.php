<?php

/**
 * Equipo filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEquipoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'numjugadores' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'idclub'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Club'), 'add_empty' => true)),
      'imagen'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'numjugadores' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'       => new sfValidatorPass(array('required' => false)),
      'idclub'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Club'), 'column' => 'idclub')),
      'imagen'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipo';
  }

  public function getFields()
  {
    return array(
      'idequipo'     => 'Number',
      'numjugadores' => 'Number',
      'nombre'       => 'Text',
      'idclub'       => 'ForeignKey',
      'imagen'       => 'Text',
    );
  }
}
