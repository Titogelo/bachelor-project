<td colspan="3">
  <?php echo __('%%idNoticia%% - %%titulo%% - %%cuerpo%%', array('%%idNoticia%%' => $noticia->getIdNoticia(), '%%titulo%%' => link_to($noticia->getTitulo(), 'noticia_edit', $noticia), '%%cuerpo%%' => $noticia->getCuerpo()), 'messages') ?>
</td>
