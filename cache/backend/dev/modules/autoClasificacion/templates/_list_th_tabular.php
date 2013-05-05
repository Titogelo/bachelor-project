<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_idJornada">
  <?php echo __('Id jornada', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nombre_equipo">
  <?php echo __('Nombre equipo', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_puntos">
  <?php if ('puntos' == $sort[0]): ?>
    <?php echo link_to(__('Puntos', array(), 'messages'), '@clasificacion', array('query_string' => 'sort=puntos&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Puntos', array(), 'messages'), '@clasificacion', array('query_string' => 'sort=puntos&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>