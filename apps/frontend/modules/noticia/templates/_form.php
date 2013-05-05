<div class="post-bottom-section">
	<h4>Deje su comentario</h4>
	<div class="right">
		<form action="<?php echo url_for('noticia/enviar') ?>" method="post" id="commentform">
				<input id="name" name="id_noticia" value="<?php echo $noticia->getIdNoticia() ?>" type="hidden" tabindex="1" />
				<input id="foto" name="foto" value="<?php echo sfContext::getInstance()->getUser()->getGuardUser()->getProfile()->getFoto() ?>" type="hidden" tabindex="1" />
			<p>
				<label for="nombre">Nombre</label><br />
				<input id="name" name="nombre" value="<?php echo sfContext::getInstance()->getUser()->getGuardUser()->getProfile()->getPersona()->getNombre() ?>" type="text" tabindex="1" />
			</p>
			<p>
				<label for="email">Email (requerido)</label><br />
				<input id="email" name="email" value="Tu Email" type="text" tabindex="2" />
			</p>
			<p>
				<label for="website">Pagina web</label><br />
				<input id="website" name="website" value="Tu pagina web" type="text" tabindex="3" />
			</p>
			<p>
				<label for="comentario">Comentario</label><br />
				<textarea id="message" name="comentario" rows="10" cols="20" tabindex="4"></textarea>
			</p>
			<p class="no-border">
				<input class="button" type="submit" value="Enviar comentario" tabindex="5" />
			</p>
		</form>
	</div>
</div>