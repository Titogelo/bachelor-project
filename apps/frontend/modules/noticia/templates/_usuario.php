<?php use_helper('Text') ?>
<?php use_helper('Date') ?>
<ul>
	<?php foreach ($usuarios as $usuario): ?>
		<li>
			<?php echo $usuario->getNombre() ?>
		</li>

	<?php endforeach; ?>
</ul>