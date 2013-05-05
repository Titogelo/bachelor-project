<?php

/**
 * Club filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClubFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fundacion'       => new sfWidgetFormFilterInput(),
      'campo'           => new sfWidgetFormFilterInput(),
      'escudo'          => new sfWidgetFormFilterInput(),
      'capacidad'       => new sfWidgetFormFilterInput(),
      'sede'            => new sfWidgetFormFilterInput(),
      'historia'        => new sfWidgetFormFilterInput(),
      'foto_campo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'titulo_historia' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'          => new sfValidatorPass(array('required' => false)),
      'fundacion'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'campo'           => new sfValidatorPass(array('required' => false)),
      'escudo'          => new sfValidatorPass(array('required' => false)),
      'capacidad'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'sede'            => new sfValidatorPass(array('required' => false)),
      'historia'        => new sfValidatorPass(array('required' => false)),
      'foto_campo'      => new sfValidatorPass(array('required' => false)),
      'titulo_historia' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('club_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Club';
  }

  public function getFields()
  {
    return array(
      'idclub'          => 'Number',
      'nombre'          => 'Text',
      'fundacion'       => 'Number',
      'campo'           => 'Text',
      'escudo'          => 'Text',
      'capacidad'       => 'Number',
      'sede'            => 'Text',
      'historia'        => 'Text',
      'foto_campo'      => 'Text',
      'titulo_historia' => 'Text',
    );
  }
}
