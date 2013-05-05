<h1>Partidos List</h1>

<table>
  <thead>
    <tr>
      <th>Idjornada</th>
      <th>Idequipolocal</th>
      <th>Idequipovisitante</th>
      <th>Goleslocal</th>
      <th>Golesvisitante</th>
      <th>Idcategoria</th>
      <th>Idpartido</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($partidos as $partido): ?>
    <tr>
      <td><?php echo $partido->getIdjornada() ?></td>
      <td><?php echo $partido->getIdequipolocal() ?></td>
      <td><?php echo $partido->getIdequipovisitante() ?></td>
      <td><?php echo $partido->getGoleslocal() ?></td>
      <td><?php echo $partido->getGolesvisitante() ?></td>
      <td><?php echo $partido->getIdcategoria() ?></td>
      <td><a href="<?php echo url_for('mantenimiento/edit?idpartido='.$partido->getIdpartido()) ?>"><?php echo $partido->getIdpartido() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mantenimiento/new') ?>">New</a>
