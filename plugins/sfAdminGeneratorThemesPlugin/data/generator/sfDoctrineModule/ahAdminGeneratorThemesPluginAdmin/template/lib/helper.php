[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
  public function linkToShow($object, $params)
  {
    <?php if ($this->params['with_show']): ?>
      return link_to(image_tag('icons/magnifier.png', 'alt_title='.__($params['label'] != 'Show' ? $params['label'] : 'Details', array(), 'sf_admin')), $this->getUrlForAction('show'), $object);
    <?php else: ?>
      return '';
    <?php endif; ?>
  }

  public function linkToNew($params)
  {
    return link_to(image_tag('icons/add.png', 'alt_title='.__($params['label'], array(), 'sf_admin')), '@'.$this->getUrlForAction('new'));
  }

  public function linkToEdit($object, $params)
  {
    return link_to(image_tag('icons/pencil.png', 'alt_title='.__($params['label'], array(), 'sf_admin')), $this->getUrlForAction('edit'), $object);
  }

  public function linkToDelete($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }

    return link_to(image_tag('icons/bin_closed.png', 'alt_title='.__($params['label'], array(), 'sf_admin')), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : __($params['confirm'], array(), 'sf_admin')));
  }
  
  public function linkToArchive($object, $params)
  {
    if (!$object->getIsArchived()) {
      return link_to(image_tag('icons/box.png', 'alt_title='.__($params['label'], array(), 'messages')), $this->getUrlForAction('archive'), $object, array('method' => 'put'));
    } else {
      return link_to(image_tag('icons/arrow_rotate_clockwise.png', 'alt_title='.__('Reactivate', array(), 'messages')), $this->getUrlForAction('reactivate'), $object, array('method' => 'put'));
    }
  }

  public function linkToList($params)
  {
    return link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('list'));
  }

  public function linkToSave($object, $params)
  {
    return '<input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" />';
  }

  public function linkToSaveAndAdd($object, $params)
  {
    if (!$object->isNew())
    {
      return '';
    }

    return '<input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="_save_and_add" />';
  }

  public function getUrlForAction($action)
  {
    return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
  }
}
