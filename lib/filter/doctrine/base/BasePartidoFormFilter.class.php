<?php

/**
 * Partido filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePartidoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idjornada'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Jornada'), 'add_empty' => true)),
      'idequipolocal'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'), 'add_empty' => true)),
      'idequipovisitante' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo_3'), 'add_empty' => true)),
      'goleslocal'        => new sfWidgetFormFilterInput(),
      'golesvisitante'    => new sfWidgetFormFilterInput(),
      'idcategoria'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'actualizado'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'idjornada'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Jornada'), 'column' => 'idjornada')),
      'idequipolocal'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Equipo'), 'column' => 'idequipo')),
      'idequipovisitante' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Equipo_3'), 'column' => 'idequipo')),
      'goleslocal'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'golesvisitante'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'idcategoria'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categoria'), 'column' => 'idcategoria')),
      'actualizado'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('partido_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partido';
  }

  public function getFields()
  {
    return array(
      'idjornada'         => 'ForeignKey',
      'idequipolocal'     => 'ForeignKey',
      'idequipovisitante' => 'ForeignKey',
      'goleslocal'        => 'Number',
      'golesvisitante'    => 'Number',
      'idcategoria'       => 'ForeignKey',
      'idpartido'         => 'Number',
      'actualizado'       => 'Number',
    );
  }
}
