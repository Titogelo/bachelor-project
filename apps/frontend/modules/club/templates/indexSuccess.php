<?php use_helper('Date') ?>
<?php use_helper('Text') ?>
<h3 id="datos-club">Datos</h3>
<div id="post-bigger">
	<div class="rigth">
		<?php foreach ($clubs as $club): ?>
		
		<?php echo image_tag('../uploads/escudos/'.$club->getEscudo(), 'size=110x150,alt_title=Escudo') ?>
		
		<ul id="datos">
			<li>Nombre: <span class="negro"><?php echo $club->getNombre() ?></span></li>
			<li>Fundación:<span class="negro"> <?php echo $club->getFundacion() ?></span></li>
			<li>Campo: <span class="negro"><?php echo $club->getCampo() ?></span></li>
			<li>Capacidad: <span class="negro"><?php echo $club->getCapacidad() ?></span></li>
			<li>Sede:<span class="negro"><?php echo $club->getSede() ?></span></li>
		</ul>
		<div id="fotos-campo">
			<?php echo image_tag('../uploads/campos/'.$club->getFotoCampo(), 'size=190x150,alt_title=Campo') ?>
			<?php echo image_tag('../uploads/campos/campo (1).jpg', 'size=190x150,alt_title=Campo1') ?>
			<?php echo image_tag('../uploads/campos/campo (2).jpg', 'size=190x150,alt_title=Campo2') ?>
			<?php echo image_tag('../uploads/campos/campo (3).jpg', 'size=190x150,alt_title=Campo3') ?>
			<?php echo image_tag('../uploads/campos/campo (4).jpg', 'size=190x150,alt_title=Campo4') ?>
			<?php echo image_tag('../uploads/campos/campo (5).jpg', 'size=190x150,alt_title=Campo5') ?>
			<?php echo image_tag('../uploads/campos/campo (6).jpg', 'size=190x150,alt_title=Campo6') ?>
			<?php echo image_tag('../uploads/campos/campo (7).jpg', 'size=190x150,alt_title=Campo7') ?>
		</div>
		<?php endforeach; ?>

	</div>
</div>
<h3 id="directiva">Directiva</h3>
<div class="post-bigger">
	<div class="rigth">
		<?php foreach ($directivos as $directivo): ?>
			<?php $persona = $directivo->getPersona() ?>
			<div class="directivo cargo-section">
				<div class="cargo"><?php echo $directivo->getCargo() ?></div>
				<div class="foto"><?php echo image_tag('../uploads/personas/'.$persona->getFoto(), 'alt_title=Directivo') ?></div>
				<div class="nombre">Nombre: <?php echo $persona->getNombre() ?></div>
				<div class="nombre">Apellidos: <?php echo $persona->getApellidos() ?></div>
				<div class="nombre">Edad: <?php echo date("Y")-$persona->getEdad() ?></div>
				<div class="descripcion">Precedido por: <?php echo $directivo->getAntecesor() ?>.</div>
				<div class="observaciones">Observaciones: <?php echo $directivo->getObservaciones() ?></div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<h3 id="historia">Historia</h3>
<div id="post-bigger">
	<?php foreach ($clubs as $club): ?>
		<h4><?php echo $club->getTituloHistoria() ?></h4>
		<p><?php echo simple_format_text($club->getHistoria()) ?></p>
	<?php endforeach; ?>
</div>
