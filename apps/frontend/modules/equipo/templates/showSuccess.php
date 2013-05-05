<?php foreach($datos_equipo as $equipo): ?>
	<?php if($equipo->getIdEquipo() == 1): ?>
	<div id="datos-equipo">
		<h3><?php echo $equipo->getClub()->getNombre()." - ".$equipo->getNombre() ?></h3>
		<h4>Datos Equipo</h4>
		<ul>
			<li><strong>Entrenador:</strong> Dani</li>
			<li><strong>2 Entrenador:</strong> Fernando</li>
			<li><strong>Delegado:</strong> Miguel</li>
		</ul>
		<?php echo image_tag('../uploads/foto_equipo/'.$equipo->getImagen(), 'size=300x200,alt_title=Imagen del equipo') ?>
	</div>
	<div id="frase_de_la_semana">
		<h4>Frase de la semana</h4>
		<blockquote>
			<p>A pesar de los resultados estoy contento con lo que se ha luchado. Sin duda alcanzaremos la meta de la salvación.</p>
			<p class="align-right">- Dani (Entrenador)</p>
		</blockquote>
	</div>
	<?php endif; ?>
<?php endforeach; ?>

	<div id="plantilla">
			<h4>Plantilla</h4>
			<table>
				<tbody>
					<tr>
						<th>Porteros</th>
						<?php foreach($jugadores_porteros as $portero): ?>
							<td><?php echo link_to($portero->getPersona()->getNombre(), 'jugador/show?id='.$portero->getIdjugador())?></td>
						<?php endforeach; ?>
					</tr>
					<tr>
						<th>Defensas</th>
						<?php foreach($jugadores_defensas as $defensa): ?>
							<td><?php echo link_to($defensa->getPersona()->getNombre(), 'jugador/show?id='.$defensa->getIdjugador())?></td>
						<?php endforeach; ?>
					</tr>
					<tr>
						<th>Medios</th>
						<?php foreach($jugadores_medios as $medio): ?>
							<td><?php echo link_to($medio->getPersona()->getNombre(), 'jugador/show?id='.$medio->getIdjugador())?></td>
						<?php endforeach; ?>
					</tr>
					<tr>
						<th>Delanteros</th>
						<?php foreach($jugadores_delanteros as $delantero): ?>
							<td><?php echo link_to($delantero->getPersona()->getNombre(), 'jugador/show?id='.$delantero->getIdjugador())?></td>
						<?php endforeach; ?>
					</tr>
				</tbody>
			</table>
	</div>
	
	<div id="estadisticas_equipo">
		<?php foreach($datos_clasificacion as $clasificacion): ?>
			
			<p id="GanadosTP"><?php echo round($clasificacion->getGanados() / $clasificacion->getJugados(),2)?></p>
			<p id="EmpatadosTP"><?php echo round($clasificacion->getEmpatados() / $clasificacion->getJugados(),2) ?></p>
			<p id="PerdidosTP"><?php echo round($clasificacion->getPerdidos() / $clasificacion->getJugados(),2)?></p>
			<p id="Ganados"><?php echo $clasificacion->getGanados() ?></p>
			<p id="Empatados"><?php echo $clasificacion->getEmpatados() ?></p>
			<p id="Perdidos"><?php echo $clasificacion->getPerdidos() ?></p>
			
		<?php endforeach; ?>
		<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>
	</div>
	
	
