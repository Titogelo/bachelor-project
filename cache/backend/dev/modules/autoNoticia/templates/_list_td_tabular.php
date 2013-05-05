<td class="sf_admin_text sf_admin_list_td_idNoticia">
  <?php echo $noticia->getIdNoticia() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_titulo">
  <?php echo link_to($noticia->getTitulo(), 'noticia_edit', $noticia) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_cuerpo">
  <?php echo $noticia->getCuerpo() ?>
</td>
