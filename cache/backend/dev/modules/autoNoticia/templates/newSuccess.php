<?php use_helper('I18N', 'Date') ?>
<?php include_partial('noticia/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Noticia', array(), 'messages') ?></h1>

  <?php include_partial('noticia/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('noticia/form_header', array('noticia' => $noticia, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('noticia/form', array('noticia' => $noticia, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('noticia/form_footer', array('noticia' => $noticia, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
