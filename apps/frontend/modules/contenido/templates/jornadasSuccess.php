<option value="">-</option>
<?php if($todo == 1): ?>
	<option value="1">Resultados</option>
	<option value="2">Clasificacion</option>
	<option value="3">Horarios</option>
	<option value="4">Goles</option>
	<option value="5">Todo (Sin implementar)</option>
<?php else: ?>
	<option value="1">Resultados jornada: <?php echo $jornada ?></option>
	<option value="2">Clasificacion jornada: <?php echo $jornada ?></option>
	<option value="3">Horarios jornada: <?php echo $jornada ?></option>
	<option value="4">Goles jornada: <?php echo $jornada ?></option>
	<option value="5">Todo (Sin implementar) jornada: <?php echo $jornada ?></option>
<?php endif; ?>