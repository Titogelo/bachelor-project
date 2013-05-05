<?php

/**
 * Goles filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGolesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpartido' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partido'), 'add_empty' => true)),
      'idjugador' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Jugador'), 'add_empty' => true)),
      'minuto'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'idpartido' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Partido'), 'column' => 'idpartido')),
      'idjugador' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Jugador'), 'column' => 'idjugador')),
      'minuto'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('goles_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Goles';
  }

  public function getFields()
  {
    return array(
      'idgoles'   => 'Number',
      'idpartido' => 'ForeignKey',
      'idjugador' => 'ForeignKey',
      'minuto'    => 'Number',
    );
  }
}
