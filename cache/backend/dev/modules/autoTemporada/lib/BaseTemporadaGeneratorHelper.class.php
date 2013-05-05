<?php

/**
 * temporada module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage temporada
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTemporadaGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'temporada' : 'temporada_'.$action;
  }
}
