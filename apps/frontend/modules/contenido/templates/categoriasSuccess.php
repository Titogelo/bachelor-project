<option value="">-</option>
<!--<option value="-1">Todas</option>-->
<?php foreach ($jornadas as $jornada): ?>
		<option value="<?php echo $jornada->getNumJornada() ?>">Jornada <?php echo $jornada->getNumJornada() ?></option>
<?php endforeach; ?>