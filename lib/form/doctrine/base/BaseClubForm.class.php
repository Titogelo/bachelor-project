<?php

/**
 * Club form base class.
 *
 * @method Club getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClubForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idclub'          => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormTextarea(),
      'fundacion'       => new sfWidgetFormInputText(),
      'campo'           => new sfWidgetFormTextarea(),
      'escudo'          => new sfWidgetFormTextarea(),
      'capacidad'       => new sfWidgetFormInputText(),
      'sede'            => new sfWidgetFormTextarea(),
      'historia'        => new sfWidgetFormTextarea(),
      'foto_campo'      => new sfWidgetFormTextarea(),
      'titulo_historia' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idclub'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idclub')), 'empty_value' => $this->getObject()->get('idclub'), 'required' => false)),
      'nombre'          => new sfValidatorString(),
      'fundacion'       => new sfValidatorInteger(array('required' => false)),
      'campo'           => new sfValidatorString(array('required' => false)),
      'escudo'          => new sfValidatorString(array('required' => false)),
      'capacidad'       => new sfValidatorNumber(array('required' => false)),
      'sede'            => new sfValidatorString(array('required' => false)),
      'historia'        => new sfValidatorString(array('required' => false)),
      'foto_campo'      => new sfValidatorString(array('max_length' => 400)),
      'titulo_historia' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('club[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Club';
  }

}
