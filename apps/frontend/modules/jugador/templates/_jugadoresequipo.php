<h4>Jugadores del mismo equipo</h4>
<ul id="lista_jugadores">
	<?php foreach($jugadores_equipo as $jugadores): ?>
		<li><?php echo link_to($jugadores->getPersona()->getNombre(), 'jugador/show?id='.$jugadores->getIdjugador()) ?></li>
	<?php endforeach; ?>
</ul>

<ul  id="comparador_jugadores">
	<li class="placeholder">Arrastre hasta 5 jugadores.</li>
</ul>