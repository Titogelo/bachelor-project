<?php

/**
 * Jornada filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseJornadaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'numjornada'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fechajornada' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'nombre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'numjornada'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fechajornada' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nombre'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('jornada_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Jornada';
  }

  public function getFields()
  {
    return array(
      'idjornada'    => 'Number',
      'numjornada'   => 'Number',
      'fechajornada' => 'Date',
      'nombre'       => 'Text',
    );
  }
}
