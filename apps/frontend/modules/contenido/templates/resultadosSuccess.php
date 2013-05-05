<p><?php echo $titulo ?> de la jornada <?php echo $jornada ?></p>
<?php include_partial('contenido/menu', array()) ?>
<table id="resultados">
	<thead>
		<tr>
			<th>Local</th>
			<th>Visitante</th>
			<th>Goles locales</th>
			<th>Goles visitantes</th>
		</tr>
	</thead>
	<tbody>
		<?php if($jornada == 0): ?>
			<?php $i = 0; ?>
			<?php $controlador_de_jornada = 1; ?>
			<?php foreach ($datos as $dato): ?>
				<?php if($dato->getJornada()->getNumjornada() == $controlador_de_jornada ): ?>
					<?php $i = 0; ?>
					<?php $controlador_de_jornada++; ?>
					<tr>
						<th colspan="4">Jornada <?php echo $dato->getJornada()->getNumjornada() ?></th>
					</tr>
				<?php endif; ?>
				<tr>
					<td><?php echo $dato->getEquipo() ?></td>
					<td><?php echo $dato->getEquipo_3() ?></td>
					<td><?php echo $dato->getGoleslocal() ?></td>
					<td><?php echo $dato->getGolesvisitante() ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<?php foreach ($datos as $dato): ?>
				<tr>
					<td><?php echo $dato->getEquipo() ?></td>
					<td><?php echo $dato->getEquipo_3() ?></td>
					<td><?php echo $dato->getGoleslocal() ?></td>
					<td><?php echo $dato->getGolesvisitante() ?></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>