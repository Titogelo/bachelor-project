<?php

/**
 * Clasificacion form base class.
 *
 * @method Clasificacion getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClasificacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idequipo'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'), 'add_empty' => false)),
      'idjornada'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Jornada'), 'add_empty' => false)),
      'posicion'        => new sfWidgetFormInputText(),
      'puntos'          => new sfWidgetFormInputText(),
      'favor'           => new sfWidgetFormInputText(),
      'contra'          => new sfWidgetFormInputText(),
      'idcategoria'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => false)),
      'idclasificacion' => new sfWidgetFormInputHidden(),
      'jugados'         => new sfWidgetFormInputText(),
      'ganados'         => new sfWidgetFormInputText(),
      'empatados'       => new sfWidgetFormInputText(),
      'perdidos'        => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idequipo'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'))),
      'idjornada'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Jornada'))),
      'posicion'        => new sfValidatorInteger(array('required' => false)),
      'puntos'          => new sfValidatorInteger(array('required' => false)),
      'favor'           => new sfValidatorInteger(array('required' => false)),
      'contra'          => new sfValidatorInteger(array('required' => false)),
      'idcategoria'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'))),
      'idclasificacion' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idclasificacion')), 'empty_value' => $this->getObject()->get('idclasificacion'), 'required' => false)),
      'jugados'         => new sfValidatorInteger(array('required' => false)),
      'ganados'         => new sfValidatorInteger(array('required' => false)),
      'empatados'       => new sfValidatorInteger(array('required' => false)),
      'perdidos'        => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('clasificacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clasificacion';
  }

}
