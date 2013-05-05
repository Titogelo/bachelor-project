<p><?php echo $titulo ?></p>
<table>
	<thead>
		<tr>
			<th>Equipo</th>
			<th>Puntos</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $dato): ?>
			<tr>
				<td><?php echo $dato->getidEquipo() ?></td>
				<td><?php echo $dato->getPuntos() ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>