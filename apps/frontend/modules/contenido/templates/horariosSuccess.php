<p><?php echo $titulo ?></p>
<table>
	<thead>
		<tr>
			<th>Local</th>
			<th>Visitante</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Campo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $dato): ?>
			<tr>
				<td><?php echo $dato->getEquipo() ?></td>
				<td><?php echo $dato->getEquipo_3() ?></td>
				<td>Fecha</td>
				<td>00:00</td>
				<td>Campo donde se juega</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>