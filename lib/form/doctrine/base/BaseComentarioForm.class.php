<?php

/**
 * Comentario form base class.
 *
 * @method Comentario getObject() Returns the current form's model object
 *
 * @package    proy
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseComentarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idcomentario' => new sfWidgetFormInputHidden(),
      'idnoticia'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Noticia'), 'add_empty' => false)),
      'idusuario'    => new sfWidgetFormTextarea(),
      'cuerpo'       => new sfWidgetFormTextarea(),
      'avatar'       => new sfWidgetFormTextarea(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idcomentario' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idcomentario')), 'empty_value' => $this->getObject()->get('idcomentario'), 'required' => false)),
      'idnoticia'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Noticia'))),
      'idusuario'    => new sfValidatorString(),
      'cuerpo'       => new sfValidatorString(),
      'avatar'       => new sfValidatorString(),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('comentario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comentario';
  }

}
