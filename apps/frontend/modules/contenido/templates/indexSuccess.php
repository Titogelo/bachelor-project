<table>
	<thead>
		<tr>
			<th>Acciones</th>
			<th>Temporadas</th>
			<th>Categorias</th>
			<th>Jornadas</th>
			<th>Refrescar</th>
			<th>Limpiar</th>
			<th>Imprimir</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<select name="acciones" id="acciones" size="1">
					<option value="">-</option>
					<option value="1">Resultados</option>
					<option value="2">Clasificacion</option>
					<option value="3">Horarios</option>
					<option value="4">Goles</option>
				</select>
			</td>
			
			<td>
				<select name="temporadas" id="temporadas" size="1">
					<option value="">-</option>
				<?php foreach ($temporadas as $temporada): ?>
						<option value="<?php echo $temporada->getIdTemporada() ?>"><?php echo $temporada->getNombre() ?></option>
				<?php endforeach; ?>
				</select>
			</td>
		
			<td>
				<select name="categorias" id="categorias" size="1">
					<option value="">-</option>
				<?php foreach ($categorias as $categoria): ?>
						<option value="<?php echo $categoria->getIdCategoria() ?>"><?php echo $categoria->getNombre() ?></option>
				<?php endforeach; ?>
				</select>
			</td>
		
			<td>
				<select name="jornadas" id="jornadas" size="1">
					<option value="">Todas</option>
					<?php foreach ($jornadas as $jornada): ?>
							<option value="<?php echo $jornada->getIdJornada() ?>"><?php echo $jornada->getNumJornada() ?></option>
					<?php endforeach; ?>
				</select>
			</td>
			<td>
				<?php echo image_tag('refrescar.png', 'size=12x12,alt_title=Refrescar id=boton') ?>
			</td>
			<td>
				<?php echo image_tag('limpiar.png', 'size=12x12,alt_title=Limpiar id=limpiar') ?>
			</td>
			<td>
				<?php echo image_tag('iconPrint.gif', 'size=12x12,alt_title=Imprimir id=imprimir') ?>
			</td>
		</tr>
	</tbody>
</table>

<div id="datos">
	
</div>
<div id="detalle_datos">
	
</div>
<div id="estadisticas_datos" title="Comparador de equipos">
	
</div>
<!--<div id="status">
	
</div>-->