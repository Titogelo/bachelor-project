<div id="main">
	<div id="ficha_jugador">
		<?php foreach($datos_jugador as $jugador): ?>
			<p></p>
			<div id="datos-jugador">
				<h4>Datos Jugador</h4>
				<ul>
					<li><strong>Nombre:</strong> <?php echo $jugador->getPersona()->getNombre() ?></li>
					<li><strong>Apellidos:</strong> <?php echo $jugador->getPersona()->getApellidos() ?></li>
					<li><strong>Edad:</strong> <?php echo date('Y')-$jugador->getPersona()->getEdad() ?></li>
					<li><strong>Altura:</strong> <?php echo $jugador->getAltura() ?></li>
					<li><strong>Peso:</strong> <?php echo $jugador->getPeso() ?></li>
					<li><strong>Amarillas:</strong> <?php echo $jugador->getAmarillas() ?></li>
					<li><strong>Rojas:</strong> <?php echo $jugador->getRojas() ?></li>
					<li><strong>Goles:</strong> <?php echo $jugador->getGoles()->count() ?></li>
				</ul>
				<?php echo image_tag('../uploads/personas/'.$jugador->getPersona()->getFoto(), 'size=70px;alt_title=Foto de '.$jugador->getPersona()->getNombre().'') ?>			</div>
		<?php endforeach; ?>
		<?php slot('lateral') ?>

			<?php include_component('jugador', 'jugadoresequipo', array('idEquipo' => $jugador->getIdequipo() ) ) ?>
		<?php end_slot() ?>
	</div>
	
</div>
