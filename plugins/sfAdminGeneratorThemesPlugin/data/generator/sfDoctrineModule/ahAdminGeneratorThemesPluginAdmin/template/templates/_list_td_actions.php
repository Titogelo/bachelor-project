<td class="object_actions" title="[?php echo __('Actions', array(), 'sf_admin') ?]">
  <?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): if ($name === 'options') continue; ?>
    <?php if ('_delete' == $name): ?>
      <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($'.ahToolkit::variablize($this->getSingularName()).', '.$this->asPhp($params).') ?]', $params) ?>
  
    <?php elseif ('_edit' == $name): ?>
      <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.ahToolkit::variablize($this->getSingularName()).', '.$this->asPhp($params).') ?]', $params) ?>
    
    <?php elseif ('_show' == $name): ?>
      <?php echo $this->addCredentialCondition('[?php echo $helper->linkToShow($'.ahToolkit::variablize($this->getSingularName()).', '.$this->asPhp($params).') ?]', $params) ?>
    
    <?php elseif ('_archive' == $name): ?>
      <?php echo $this->addCredentialCondition('[?php echo $helper->linkToArchive($'.ahToolkit::variablize($this->getSingularName()).', '.$this->asPhp($params).') ?]', $params) ?>
  
    <?php else: ?>
      [?php if (method_exists($helper, 'linkTo<?php echo ucfirst(ltrim($name, '_')) ?>')): ?>
        <?php echo $this->addCredentialCondition('[?php echo $helper->linkTo'.ucfirst(ltrim($name, '_')).'($'.ahToolkit::variablize($this->getSingularName()).', '.$this->asPhp($params).') ?]', $params) ?>
      [?php else: ?]
        <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>
      [?php endif; ?]
    <?php endif; ?>
  <?php endforeach; ?>
</td>
