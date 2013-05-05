<?php use_helper('I18N', 'Date') ?>
<?php include_partial('partido/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Modificando el partido "%%nombre_equipo_local%% - %%nombre_equipo_visitante%%"', array('%%nombre_equipo_local%%' => $partido->getNombreEquipoLocal(), '%%nombre_equipo_visitante%%' => $partido->getNombreEquipoVisitante()), 'messages') ?></h1>

  <?php include_partial('partido/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('partido/form_header', array('partido' => $partido, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('partido/form', array('partido' => $partido, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('partido/form_footer', array('partido' => $partido, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
