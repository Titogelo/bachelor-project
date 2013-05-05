<?php foreach ($this->configuration->getValue('show.actions') as $name => $params): ?>
<?php if ('_edit' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.ahToolkit::variablize($this->getSingularName()).', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_list' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToList('.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_archive' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToArchive('.$this->asPhp($params).') ?]', $params) ?>

<?php else: ?>
[?php if (method_exists($helper, 'linkTo<?php echo $method = ucfirst(sfInflector::camelize($name)) ?>')): ?]
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkTo'.$method.'($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>

[?php else: ?]
  <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>

[?php endif; ?]
<?php endif; ?>
<?php endforeach; ?>