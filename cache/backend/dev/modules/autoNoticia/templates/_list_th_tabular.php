<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_idNoticia">
  <?php echo __('Id noticia', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_titulo">
  <?php if ('titulo' == $sort[0]): ?>
    <?php echo link_to(__('Titulo', array(), 'messages'), '@noticia', array('query_string' => 'sort=titulo&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Titulo', array(), 'messages'), '@noticia', array('query_string' => 'sort=titulo&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_cuerpo">
  <?php if ('cuerpo' == $sort[0]): ?>
    <?php echo link_to(__('Cuerpo', array(), 'messages'), '@noticia', array('query_string' => 'sort=cuerpo&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Cuerpo', array(), 'messages'), '@noticia', array('query_string' => 'sort=cuerpo&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>