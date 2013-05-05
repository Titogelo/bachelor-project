<td class="sf_admin_text sf_admin_list_td_idJornada">
  <?php echo $clasificacion->getIdJornada() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nombre_equipo">
  <?php echo link_to($clasificacion->getNombreEquipo(), 'clasificacion_edit', $clasificacion) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_puntos">
  <?php echo $clasificacion->getPuntos() ?>
</td>
