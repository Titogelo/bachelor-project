<?php

/**
 * partido module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage partido
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePartidoGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%idJornada%% - %%nombre_equipo_local%% - %%nombre_equipo_visitante%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Listado de partidos';
  }

  public function getEditTitle()
  {
    return 'Modificando el partido "%%nombre_equipo_local%% - %%nombre_equipo_visitante%%"';
  }

  public function getNewTitle()
  {
    return 'New Partido';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array(  0 => 'idcategoria',  1 => 'idjornada',  2 => 'idequipolocal',  3 => 'idequipovisitante',  4 => 'goleslocal',  5 => 'golesvisitante',);
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
    return array(  0 => 'idJornada',  1 => 'nombre_equipo_local',  2 => 'nombre_equipo_visitante',);
  }

  public function getFieldsDefault()
  {
    return array(
      'idjornada' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'idequipolocal' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'idequipovisitante' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'goleslocal' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'golesvisitante' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'idcategoria' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'idpartido' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'actualizado' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'idjornada' => array(),
      'idequipolocal' => array(),
      'idequipovisitante' => array(),
      'goleslocal' => array(),
      'golesvisitante' => array(),
      'idcategoria' => array(),
      'idpartido' => array(),
      'actualizado' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'idjornada' => array(),
      'idequipolocal' => array(),
      'idequipovisitante' => array(),
      'goleslocal' => array(),
      'golesvisitante' => array(),
      'idcategoria' => array(),
      'idpartido' => array(),
      'actualizado' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'idjornada' => array(),
      'idequipolocal' => array(),
      'idequipovisitante' => array(),
      'goleslocal' => array(),
      'golesvisitante' => array(),
      'idcategoria' => array(),
      'idpartido' => array(),
      'actualizado' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'idjornada' => array(),
      'idequipolocal' => array(),
      'idequipovisitante' => array(),
      'goleslocal' => array(),
      'golesvisitante' => array(),
      'idcategoria' => array(),
      'idpartido' => array(),
      'actualizado' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'idjornada' => array(),
      'idequipolocal' => array(),
      'idequipovisitante' => array(),
      'goleslocal' => array(),
      'golesvisitante' => array(),
      'idcategoria' => array(),
      'idpartido' => array(),
      'actualizado' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'partidoForm';
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
    return 'partidoFormFilter';
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
