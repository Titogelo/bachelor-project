<?php

/**
 * clasificacion module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage clasificacion
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseClasificacionGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%idJornada%% - %%=nombre_equipo%% - %%puntos%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Listado de clasificaciones';
  }

  public function getEditTitle()
  {
    return 'Modificando los datos de clasificación de "%%nombre_equipo%%"';
  }

  public function getNewTitle()
  {
    return 'New Clasificacion';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'idJornada',  1 => '=nombre_equipo',  2 => 'puntos',);
  }

  public function getFieldsDefault()
  {
    return array(
      'idequipo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'idjornada' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'posicion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'puntos' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'favor' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'contra' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'idcategoria' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'idclasificacion' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'jugados' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'ganados' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'empatados' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'perdidos' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'idequipo' => array(),
      'idjornada' => array(),
      'posicion' => array(),
      'puntos' => array(),
      'favor' => array(),
      'contra' => array(),
      'idcategoria' => array(),
      'idclasificacion' => array(),
      'jugados' => array(),
      'ganados' => array(),
      'empatados' => array(),
      'perdidos' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'idequipo' => array(),
      'idjornada' => array(),
      'posicion' => array(),
      'puntos' => array(),
      'favor' => array(),
      'contra' => array(),
      'idcategoria' => array(),
      'idclasificacion' => array(),
      'jugados' => array(),
      'ganados' => array(),
      'empatados' => array(),
      'perdidos' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'idequipo' => array(),
      'idjornada' => array(),
      'posicion' => array(),
      'puntos' => array(),
      'favor' => array(),
      'contra' => array(),
      'idcategoria' => array(),
      'idclasificacion' => array(),
      'jugados' => array(),
      'ganados' => array(),
      'empatados' => array(),
      'perdidos' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'idequipo' => array(),
      'idjornada' => array(),
      'posicion' => array(),
      'puntos' => array(),
      'favor' => array(),
      'contra' => array(),
      'idcategoria' => array(),
      'idclasificacion' => array(),
      'jugados' => array(),
      'ganados' => array(),
      'empatados' => array(),
      'perdidos' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'idequipo' => array(),
      'idjornada' => array(),
      'posicion' => array(),
      'puntos' => array(),
      'favor' => array(),
      'contra' => array(),
      'idcategoria' => array(),
      'idclasificacion' => array(),
      'jugados' => array(),
      'ganados' => array(),
      'empatados' => array(),
      'perdidos' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'clasificacionForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'clasificacionFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
