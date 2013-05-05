<?php

/**
 * Entrenador filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEntrenadorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpersona'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => true)),
      'idequipo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'), 'add_empty' => true)),
      'activo'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'idpersona'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Persona'), 'column' => 'idpersona')),
      'idequipo'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Equipo'), 'column' => 'idequipo')),
      'activo'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('entrenador_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Entrenador';
  }

  public function getFields()
  {
    return array(
      'identrenador' => 'Number',
      'idpersona'    => 'ForeignKey',
      'idequipo'     => 'ForeignKey',
      'activo'       => 'Number',
    );
  }
}
