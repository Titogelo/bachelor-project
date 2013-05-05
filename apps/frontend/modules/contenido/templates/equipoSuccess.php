<p id="titulo"><?php echo $titulo ?></p>
<ul>
	<?php foreach ($datos as $dato): ?>
		<li>Nombre equipo: <?php echo $dato->getNombre() ?></li>
		<li>Numero de jugadores: <?php echo $dato->getNumjugadores() ?></li>
		<li>Escudo: <?php echo image_tag('../uploads/escudos/'.$dato->getClub()->getEscudo(), 'size=70px;alt_title=Escudo') ?></li>
	<?php endforeach; ?>
</ul>