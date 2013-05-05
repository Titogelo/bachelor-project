<?php use_helper('Text') ?>
<?php use_helper('Date') ?>
<ul>
	<?php foreach ($comentarios as $comentario): ?>
		<li>
			<a href="noticia/show/id/<?php echo  $comentario->getIdnoticia() ?>#comment-<?php echo $comentario->getIdcomentario() ?>">
				<?php echo truncate_text($comentario->getCuerpo(),'30') ?>
			</a>
		<br />
		<span>Posteado el <?php echo format_date($comentario->getCreatedAt(), "D",'es_CL') ?></span>
		</li>
	<?php endforeach; ?>
</ul>