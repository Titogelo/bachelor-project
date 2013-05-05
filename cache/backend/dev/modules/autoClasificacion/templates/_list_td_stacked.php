<td colspan="3">
  <?php echo __('%%idJornada%% - %%nombre_equipo%% - %%puntos%%', array('%%idJornada%%' => $clasificacion->getIdJornada(), '%%nombre_equipo%%' => link_to($clasificacion->getNombreEquipo(), 'clasificacion_edit', $clasificacion), '%%puntos%%' => $clasificacion->getPuntos()), 'messages') ?>
</td>
