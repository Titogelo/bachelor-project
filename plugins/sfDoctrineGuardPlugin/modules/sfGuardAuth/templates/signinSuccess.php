<?php use_helper('I18N') ?>

<h2><?php echo __('Acceso', null, 'sf_guard') ?></h2>

<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>