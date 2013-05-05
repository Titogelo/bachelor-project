<td colspan="5">
  <?php echo __('%%idtemporada%% - %%anio%% - %%nombre%% - %%created_at%% - %%updated_at%%', array('%%idtemporada%%' => link_to($temporada->getIdtemporada(), 'temporada_edit', $temporada), '%%anio%%' => $temporada->getAnio(), '%%nombre%%' => $temporada->getNombre(), '%%created_at%%' => false !== strtotime($temporada->getCreatedAt()) ? format_date($temporada->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($temporada->getUpdatedAt()) ? format_date($temporada->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
