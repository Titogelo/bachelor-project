<?php use_helper('Date') ?>
<?php use_helper('Asset') ?>
<?php use_helper('Text') ?>
<?php include_partial('noticia/flashes') ?>
<div id="main">
	<p><a class="more" href="<?php echo url_for('@homepage') ?>">&laquo; Volver a las noticias </a></p>
	<div class="post">
		<div class="right">
			<h2><a><?php echo $noticia->getTitulo() ?></a></h2>
			<p class="post-info"></p>
			<div class="image-section">
				<?php echo image_tag('../uploads/noticia/'.$noticia->getImagen(), 'size=110x150,alt_title=Imagen de la noticia') ?>
				<!--<img src="<?php echo image_path('../uploads/noticia/'.$noticia->getImagen()) ?>" alt="Imagen de la noticia" height="200" width="500"/>-->
			</div>
			<p><?php  echo simple_format_text($noticia->getCuerpo()); ?></p>
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
	<div class="post-bottom-section">
		<h4><?php $num = $noticia->getComentario()->count(); echo $num ?> Comentario<?php if($num!=1): echo "s"; endif; ?></h4>
		<div class="right">
			<ol class="commentlist">
				<?php $i=0; foreach ( $noticia->getComentario() as $coment ): ?>
					<?php if( $i % 2 == 0): ?>
					<li class="depth-1">
					<?php else: ?>
					<li class="thread-alt depth-1">
					<?php endif; ?>
						<div class="comment-info">
							<?php echo image_tag('../uploads/profile/'.$coment->getAvatar(), 'size=40x40,alt_title=Avatar') ?>
							<cite>
								<a href=""><?php echo $coment->getIdUsuario() ?></a> Dijo: <br />
								<span class="comment-data"><a href="#comment-<?php echo $coment->getIdComentario() ?>" title=""><?php echo $coment->getCreatedAt() ?></a></span>
							</cite>
						</div>
						<div class="comment-text">
							<p><?php echo $coment->getCuerpo() ?></p>
						</div>
					</li>
					<?php $i++; ?>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
	<?php slot('lateral') ?>
		<?php include_partial('global/lateral') ?>
	<?php end_slot() ?>
	<?php if ($sf_user->hasCredential('noticia_comentar')) : ?> 
		<?php include_partial('noticia/form', array('noticia' => $noticia)) ?>
	<?php endif; ?>
	

</div>