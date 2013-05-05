<?php use_helper('I18N', 'Date') ?>
<?php include_partial('temporada/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Temporada', array(), 'messages') ?></h1>

  <?php include_partial('temporada/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('temporada/form_header', array('temporada' => $temporada, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('temporada/form', array('temporada' => $temporada, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('temporada/form_footer', array('temporada' => $temporada, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
