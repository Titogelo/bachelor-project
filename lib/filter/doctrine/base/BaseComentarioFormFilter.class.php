<?php

/**
 * Comentario filter form base class.
 *
 * @package    proy
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseComentarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idnoticia'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Noticia'), 'add_empty' => true)),
      'idusuario'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cuerpo'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'avatar'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'idnoticia'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Noticia'), 'column' => 'idnoticia')),
      'idusuario'    => new sfValidatorPass(array('required' => false)),
      'cuerpo'       => new sfValidatorPass(array('required' => false)),
      'avatar'       => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('comentario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comentario';
  }

  public function getFields()
  {
    return array(
      'idcomentario' => 'Number',
      'idnoticia'    => 'ForeignKey',
      'idusuario'    => 'Text',
      'cuerpo'       => 'Text',
      'avatar'       => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
