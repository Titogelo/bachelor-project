<td class="sf_admin_text sf_admin_list_td_idtemporada">
  <?php echo link_to($temporada->getIdtemporada(), 'temporada_edit', $temporada) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_anio">
  <?php echo $temporada->getAnio() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nombre">
  <?php echo $temporada->getNombre() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($temporada->getCreatedAt()) ? format_date($temporada->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($temporada->getUpdatedAt()) ? format_date($temporada->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
