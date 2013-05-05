<?php foreach ($clasificacion as $value):?>
	<!--<p><?php echo $value->getIdclasificacion() ?></p>-->
	<p id="titulo">Encuentros en los que encajó goles hasta la jornada seleccionada</p>
<?php endforeach; ?>
<table id="estadisticas-puntos">
	<thead>
		<tr>
			<th>Jornada</th>
			<th>Local</th>
			<th>Goles</th>
			<th>Goles</th>
			<th>Visitante</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($partido as $dato): ?>
			<tr>
				<td><?php echo $dato->getJornada()->getNumJornada() ?></td>
				<td><?php echo $dato->getEquipo() ?></td>
				<td><?php echo $dato->getGoleslocal() ?></td>
				<td><?php echo $dato->getGolesvisitante() ?></td>
				<td><?php echo $dato->getEquipo_3() ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>