<script type="text/javascript" charset="utf-8">
</script>
<p><?php echo $titulo ?> de la jornada <?php echo $jornada ?></p>
<?php include_partial('contenido/menu', array()) ?>
<table id="clasificacion">
	<thead>
		<tr>
			<th></th>
			<th>Equipo</th>
			<th>Puntos</th>
			<th>Favor</th>
			<th>Contra</th>
			<th>Jugados</th>
			<th>Ganados</th>
			<th>Empatados</th>
			<th>Perdidos</th>
			<th> - </th>
			<?php if ($sf_user->hasCredential('noticia_comentar')) : ?>
				<th>Más datos</th>
			<?php endif; ?>
			
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
						<th></th>
						<th colspan="10">Jornada <?php echo $dato->getJornada()->getNumjornada() ?></th>
					</tr>
				<?php endif; ?>
				
				<?php $i++; ?>
				<?php if($dato->getEquipo() == "Regional"): ?>
				<tr class="">
					<td><?php echo $i ?></td>
					<td><a class="equipo-clasificacion" href="<?php echo url_for('contenido/equipo?idequipo='.$dato->getIdequipo()) ?>"><?php echo $dato->getEquipo() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/puntos?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getPuntos() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/favor?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getFavor() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/contra?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getContra() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/jugados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getJugados() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/ganados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getGanados() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/empatados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getEmpatados() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/perdidos?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getPerdidos() ?></a></td>
					<td><input type="checkbox" class="opciones" value="<?php echo $dato->getIdclasificacion() ?>" /></td>
					<?php if ($sf_user->hasCredential('noticia_comentar')) : ?>
						<td><a class="link-history" href="<?php echo url_for('equipo/show?id='.$dato->getIdequipo())?>">+</a></td>
					<?php endif; ?>
				</tr>
				<?php else: ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><a class="equipo-clasificacion" href="<?php echo url_for('contenido/equipo?idequipo='.$dato->getIdequipo()) ?>"><?php echo $dato->getEquipo() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/puntos?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getPuntos() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/favor?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getFavor() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/contra?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getContra() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/jugados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getJugados() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/ganados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getGanados() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/empatados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getEmpatados() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/perdidos?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getPerdidos() ?></a></td>
						<td><input type="checkbox" class="opciones" value="<?php echo $dato->getIdclasificacion() ?>" /></td>
						<?php if ($sf_user->hasCredential('noticia_comentar')) : ?>
							<td><a class="link-history" href="<?php echo url_for('equipo/show?id='.$dato->getIdequipo())?>">+</a></td>
						<?php endif; ?>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php else: ?>
			<?php $i = 0; ?>
			<?php foreach ($datos as $dato): ?>
				<?php $i++; ?>
				<?php if($dato->getEquipo() == "Regional"): ?>
				<tr class="">
					<td><?php echo $i ?></td>
					<td><a class="equipo-clasificacion" href="<?php echo url_for('contenido/equipo?idequipo='.$dato->getIdequipo()) ?>"><?php echo $dato->getEquipo() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/puntos?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getPuntos() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/favor?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getFavor() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/contra?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getContra() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/jugados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getJugados() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/ganados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getGanados() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/empatados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getEmpatados() ?></a></td>
					<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/perdidos?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getPerdidos() ?></a></td>
					<td><input type="checkbox" class="opciones" value="<?php echo $dato->getIdclasificacion() ?>" /></td>
					<?php if ($sf_user->hasCredential('noticia_comentar')) : ?>
						<td><a class="link-history" href="<?php echo url_for('equipo/show?id='.$dato->getIdequipo())?>">+</a></td>
					<?php endif; ?>
					</tr>
				<?php else: ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><a class="equipo-clasificacion" href="<?php echo url_for('contenido/equipo?idequipo='.$dato->getIdequipo()) ?>"><?php echo $dato->getEquipo() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/puntos?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getPuntos() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/favor?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getFavor() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/contra?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getContra() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/jugados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getJugados() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/ganados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getGanados() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/empatados?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getEmpatados() ?></a></td>
						<td><a class="estadisticas-clasificacion" href="<?php echo url_for('contenido/perdidos?idclasificacion='.$dato->getIdclasificacion()) ?>"><?php echo $dato->getPerdidos() ?></a></td>
						<td><input type="checkbox" class="opciones" value="<?php echo $dato->getIdclasificacion() ?>" /></td>
						<?php if ($sf_user->hasCredential('noticia_comentar')) : ?>
							<td><a class="link-history" href="<?php echo url_for('equipo/show?id='.$dato->getIdequipo())?>">+</a></td>
						<?php endif; ?>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>
<div class="aviso">
	
</div>