<?php foreach ($noticias as $noticia): ?>
	<div class="post">
		<div class="right">
			<h2><a><?php echo $noticia->getTitulo() ?></a></h2>
			<p class="post-info"></p>
			<div class="image-section">
				<?php echo image_tag('../uploads/noticia/'.$noticia->getImagen(), 'size=200x500,alt_title=Imagen de la noticia') ?>
			</div>
			<p><?php  echo simple_format_text(substr($noticia->getCuerpo(),0,400)." ..."); ?></p>
			<p><a class="more" href="noticia/show/id/<?php echo  $noticia->getIdNoticia() ?>">Continuar leyendo &raquo;</a></p>
		</div>
		<div class="left">
			<p class="dateinfo"><?php echo format_date($noticia->getCreatedAt(), "MMM") ?><span><?php echo format_date($noticia->getCreatedAt(), "dd") ?></span></p>
			<div class="post-meta">
				<h4>Info noticia</h4>
				<ul>
				<li class="user"><a href="#"><?php echo $noticia->getSfGuardUserProfile()->getSfGuardUser()->getFirstName() ?></a></li>
				<li class="time"><a href="#"><?php echo format_date($noticia->getCreatedAt(), "D", 'es_CL') ?></a></li>
				<li class="time"><a href="#"><?php echo format_date($noticia->getCreatedAt(), "HH:mm:ss", 'es_CL') ?></a></li>
				<li class="comment"><a href="noticia/show/id/<?php echo  $noticia->getIdNoticia() ?>#commentform"><?php $num = $noticia->getComentario()->count(); echo $num ?> Comentario<?php if($num!=1): echo "s"; endif; ?></a></li>
				</ul>
			</div>
		</div>
	</div>
<?php endforeach; ?>
