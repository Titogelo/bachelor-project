<?php

/**
 * Noticia form base class.
 *
 * @method Noticia getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNoticiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idnoticia'         => new sfWidgetFormInputHidden(),
      'titulo'            => new sfWidgetFormTextarea(),
      'cuerpo'            => new sfWidgetFormTextarea(),
      'idusuario'         => new sfWidgetFormInputText(),
      'imagen'            => new sfWidgetFormTextarea(),
      'descripcionimagen' => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idnoticia'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idnoticia')), 'empty_value' => $this->getObject()->get('idnoticia'), 'required' => false)),
      'titulo'            => new sfValidatorString(),
      'cuerpo'            => new sfValidatorString(),
      'idusuario'         => new sfValidatorInteger(),
      'imagen'            => new sfValidatorString(array('required' => false)),
      'descripcionimagen' => new sfValidatorString(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('noticia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Noticia';
  }

}
