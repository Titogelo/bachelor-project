<?php use_helper('I18N', 'Date') ?>
<?php include_partial('clasificacion/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Clasificacion', array(), 'messages') ?></h1>

  <?php include_partial('clasificacion/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('clasificacion/form_header', array('clasificacion' => $clasificacion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('clasificacion/form', array('clasificacion' => $clasificacion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('clasificacion/form_footer', array('clasificacion' => $clasificacion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
