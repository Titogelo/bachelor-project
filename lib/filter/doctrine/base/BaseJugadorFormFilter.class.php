<?php

/**
 * Jugador filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseJugadorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpersona' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => true)),
      'goles'     => new sfWidgetFormFilterInput(),
      'altura'    => new sfWidgetFormFilterInput(),
      'peso'      => new sfWidgetFormFilterInput(),
      'amarillas' => new sfWidgetFormFilterInput(),
      'rojas'     => new sfWidgetFormFilterInput(),
      'idequipo'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'), 'add_empty' => true)),
      'posicion'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'idpersona' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Persona'), 'column' => 'idpersona')),
      'goles'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'altura'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'peso'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'amarillas' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rojas'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'idequipo'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Equipo'), 'column' => 'idequipo')),
      'posicion'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('jugador_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Jugador';
  }

  public function getFields()
  {
    return array(
      'idjugador' => 'Number',
      'idpersona' => 'ForeignKey',
      'goles'     => 'Number',
      'altura'    => 'Number',
      'peso'      => 'Number',
      'amarillas' => 'Number',
      'rojas'     => 'Number',
      'idequipo'  => 'ForeignKey',
      'posicion'  => 'Text',
    );
  }
}
