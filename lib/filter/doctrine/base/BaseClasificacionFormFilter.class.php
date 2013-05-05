<?php

/**
 * Clasificacion filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClasificacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idequipo'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'), 'add_empty' => true)),
      'idjornada'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Jornada'), 'add_empty' => true)),
      'posicion'        => new sfWidgetFormFilterInput(),
      'puntos'          => new sfWidgetFormFilterInput(),
      'favor'           => new sfWidgetFormFilterInput(),
      'contra'          => new sfWidgetFormFilterInput(),
      'idcategoria'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'jugados'         => new sfWidgetFormFilterInput(),
      'ganados'         => new sfWidgetFormFilterInput(),
      'empatados'       => new sfWidgetFormFilterInput(),
      'perdidos'        => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'idequipo'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Equipo'), 'column' => 'idequipo')),
      'idjornada'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Jornada'), 'column' => 'idjornada')),
      'posicion'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'puntos'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'favor'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'contra'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'idcategoria'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categoria'), 'column' => 'idcategoria')),
      'jugados'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ganados'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'empatados'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'perdidos'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('clasificacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clasificacion';
  }

  public function getFields()
  {
    return array(
      'idequipo'        => 'ForeignKey',
      'idjornada'       => 'ForeignKey',
      'posicion'        => 'Number',
      'puntos'          => 'Number',
      'favor'           => 'Number',
      'contra'          => 'Number',
      'idcategoria'     => 'ForeignKey',
      'idclasificacion' => 'Number',
      'jugados'         => 'Number',
      'ganados'         => 'Number',
      'empatados'       => 'Number',
      'perdidos'        => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
