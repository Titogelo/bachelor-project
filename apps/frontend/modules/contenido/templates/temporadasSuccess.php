<option value="">-</option>
<?php foreach ($categorias as $categoria): ?>
		<option value="<?php echo $categoria->getIdCategoria() ?>"><?php echo $categoria->getNombre() ?></option>
<?php endforeach; ?>