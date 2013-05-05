<?php

/**
 * Persona filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePersonaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellidos'  => new sfWidgetFormFilterInput(),
      'edad'       => new sfWidgetFormFilterInput(),
      'nif'        => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'foto'       => new sfWidgetFormFilterInput(),
      'idclub'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Club'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'     => new sfValidatorPass(array('required' => false)),
      'apellidos'  => new sfValidatorPass(array('required' => false)),
      'edad'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nif'        => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'foto'       => new sfValidatorPass(array('required' => false)),
      'idclub'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Club'), 'column' => 'idclub')),
    ));

    $this->widgetSchema->setNameFormat('persona_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Persona';
  }

  public function getFields()
  {
    return array(
      'idpersona'  => 'Number',
      'nombre'     => 'Text',
      'apellidos'  => 'Text',
      'edad'       => 'Number',
      'nif'        => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'foto'       => 'Text',
      'idclub'     => 'ForeignKey',
    );
  }
}
