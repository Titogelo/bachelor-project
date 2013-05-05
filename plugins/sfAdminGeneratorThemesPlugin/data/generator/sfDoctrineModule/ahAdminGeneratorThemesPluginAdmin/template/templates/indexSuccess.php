[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

[?php slot('module_header', <?php echo $this->getI18NString('list.title') ?>) ?]
[?php sfContext::getInstance()->getResponse()->setTitle(<?php echo $this->getI18NString('list.title') ?>) ?]

<?php if ($this->configuration->hasFilterForm()): ?>
  [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
<?php endif; ?>

[?php include_partial('<?php echo $this->getModuleName() ?>/form_header', array('form' => <?php echo $this->configuration->hasFilterForm() ? '$filters' : 'null' ?>, 'configuration' => $configuration)) ?]


<?php if ($this->configuration->getValue('list.batch_actions')): ?>
  <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
<?php endif; ?>
    [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
    <div class="sf_admin_list_actions_and_batch_actions">
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
    </div>
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
  </form>
<?php endif; ?>

[?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('form' => <?php echo $this->configuration->hasFilterForm() ? '$filters' : 'null' ?>, 'configuration' => $configuration)) ?]