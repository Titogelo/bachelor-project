<td colspan="3">
  <?php echo __('%%idJornada%% - %%nombre_equipo_local%% - %%nombre_equipo_visitante%%', array('%%idJornada%%' => $partido->getIdJornada(), '%%nombre_equipo_local%%' => $partido->getNombreEquipoLocal(), '%%nombre_equipo_visitante%%' => $partido->getNombreEquipoVisitante()), 'messages') ?>
</td>
