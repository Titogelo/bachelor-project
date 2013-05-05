<?php

/**
 * Partido form base class.
 *
 * @method Partido getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePartidoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idjornada'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Jornada'), 'add_empty' => false)),
      'idequipolocal'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'), 'add_empty' => false)),
      'idequipovisitante' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo_3'), 'add_empty' => false)),
      'goleslocal'        => new sfWidgetFormInputText(),
      'golesvisitante'    => new sfWidgetFormInputText(),
      'idcategoria'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => false)),
      'idpartido'         => new sfWidgetFormInputHidden(),
      'actualizado'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idjornada'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Jornada'))),
      'idequipolocal'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo'))),
      'idequipovisitante' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Equipo_3'))),
      'goleslocal'        => new sfValidatorInteger(array('required' => false)),
      'golesvisitante'    => new sfValidatorInteger(array('required' => false)),
      'idcategoria'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'))),
      'idpartido'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpartido')), 'empty_value' => $this->getObject()->get('idpartido'), 'required' => false)),
      'actualizado'       => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('partido[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partido';
  }

}
