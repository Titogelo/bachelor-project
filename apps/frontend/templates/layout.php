<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<?php include_title() ?>
		<link rel="shortcut icon" href="/favicon.ico" />
		<?php include_stylesheets() ?>
		<?php include_javascripts() ?>
	</head>
	<body>
		<div id="header-wrap">
			<div id="header">
				<a name="top"></a>
				<h1 id="logo-text"><!--<?php echo image_tag('logo', 'alt=imagen size=50×100'); ?>--><?php echo link_to( 'Vallobas', 'noticias/index' ); ?></h1>
				
				<p id="slogan">Club Deportivo Vallobín</p>
				<div  id="nav">
					<ul>
						<li><?php echo link_to( 'Noticias', 'noticia/index' ); ?></li>
						<li><?php echo link_to( 'Club', 'club/index' ); ?></li>
						<li><?php echo link_to( 'Deportivo', 'contenido/index' ); ?></li>
						<?php if ($sf_user->hasCredential('mostrar_equipos')) : ?> 
							<li><?php echo link_to( 'Jugadores', 'jugador/index' ); ?></li>
							<li><?php echo link_to( 'Equipo', 'equipo/index' ); ?></li>
						<?php endif; ?>
						
					</ul>
					<ul class="flotar-menu-derecha">
						<?php if ($sf_user->hasCredential('noticia_comentar')) : ?> 
							<li><?php echo link_to($sf_user,'login/'); ?></li>
							<li><?php echo link_to( 'Salir', 'sf_guard_signout' ); ?></li>
						<?php else: ?>
							<?php echo link_to( 'Entrar', 'sf_guard_signin' ); ?>
						<?php endif ?>
					</ul>
				</div>

				

				<form id="quick-search" action="<?php echo url_for('') ?>" method="get">
					<fieldset class="search">
						<label for="qsearch">Buscar:</label>
						<input class="tbox" id="qsearch" type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" title="Start typing and hit ENTER"/>
						<button class="btn" title="Submit Search">Search</button>
					</fieldset>
				</form>
			</div>
		</div>
		<!-- content-outer -->
		<div id="content-wrap" class="clear" >
			<!-- content -->
			<?php if (has_slot('lateral')): ?>
				<div id="content">
			<?php else: ?>
				<div id="content-bigger">
			<?php endif; ?>
				<?php echo $sf_content ?>
				
				
					<?php if (has_slot('lateral')): ?>
						<div id="sidebar">
						<?php include_slot('lateral') ?>
						</div>
					<?php else: ?>
						<!-- código del lateral por defecto -->
					<?php endif; ?>
			</div>
		</div>
		<div class="clear" id="footer-outer">
			<div id="footer-wrap">
				<div class="clear" id="gallery">
					<h3>Últimas fotos de Juan</h3>
					<div id="thumbs">
					</div>
				</div>
				<div class="col-a">
					<h3>Información de contacto</h3>
					<p><strong>Telefono: </strong>984182589</p>
					<p><strong>Dirección: </strong>Dr. Solís Cajigal, s/n - C.S. Vallobín II</p>
					<p><strong>Mail: </strong>vallobin_somos_todos@hotmail.com</p>
					<p><strong>Localidad: </strong>Oviedo</p>
					<p><strong>Provincia: </strong>Asturias</p>
					<h3>Updates</h3>
					<ul class="subscribe-stuff">
						<li><a rel="nofollow" href="index.html" title="RSS">
							<?php echo image_tag('social_rss', 'alt=imagen size=50×100'); ?>
						</li>
						<li><a rel="nofollow" href="index.html" title="Facebook">
							<?php echo image_tag('social_facebook', 'alt=imagen size=50×100'); ?>
						</li>
						<li><a rel="nofollow" href="index.html" title="Twitter">
							<?php echo image_tag('social_twitter', 'alt=imagen size=50×100'); ?>
						</li>
						<li><a rel="nofollow" href="index.html" title="E-mail this story to a friend!">
							<?php echo image_tag('social_email', 'alt=imagen size=50×100'); ?>
						</li>
					</ul>
					<p>Siguenos en:
						<p id="rss">
							<a href="index.html">Grab the RSS feed</a>
						</p>
						<a href="index">RSS</a>, <a href="index">Facebook</a>,
						<a href="index">Twitter</a> or <a href="index">Email</a>
					</p>
				</div>
				<div class="col-a">
					<h3>Links relacionados</h3>
					<div class="footer-list">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="index.html">Style Demo</a></li>
							<li><a href="index.html">Blog</a></li>
							<li><a href="index.html">Archive</a></li>
							<li><a href="index.html">About</a></li>
							<li><a href="index.html">Template Info</a></li>
							<li><a href="index.html">Site Map</a></li>
						</ul>
					</div>
					<h3>Amigos</h3>
					<div class="footer-list">
						<?php include_component('noticia', 'usuario') ?>
					</div>
				</div>
				<div class="col-a">
					<h3>Creditos</h3>
					<div class="footer-list">
						<ul>
							<li>
								<a href="http://jasonlarose.com/blog/110-free-classy-social-media-icons">
								110 Free Classy Social Media Icons by Jason LaRose
								</a>
							</li>
							<li>
								<a href="http://wefunction.com/2009/05/free-social-icons-app-icons/">
								Free Social Media Icons by WeFunction
								</a>
							</li>
							<li>
								<a href="http://www.famfamfam.com/lab/icons/">Free Icons by FAMFAMFAM</a>
							</li>
						</ul>
					</div>
					<h3>Ultimos comentarios</h3>
					<div class="recent-comments">
						<?php include_component('noticia', 'ultimoscomentarios') ?>
					</div>
				</div>
				<div class="col-b">
				<h3>Archivos</h3>
				<div class="footer-list">
					<ul>
						<li><a href="index.html">January 2010</a></li>
						<li><a href="index.html">December 2009</a></li>
						<li><a href="index.html">November 2009</a></li>
						<li><a href="index.html">October 2009</a></li>
						<li><a href="index.html">September 2009</a></li>
					</ul>
				</div>
				<h3>Marcadores recientes</h3>
				<div class="footer-list">
					<ul>
						<li><a href="index.html">5 Must Have Sans Serif Fonts for Web Designers</a></li>
						<li><a href="index.html">The Basics of CSS3</a></li>
						<li><a href="index.html">10 Simple Tips for Launching a Website</a></li>
						<li><a href="index.html">24 ways: Working With RGBA Colour</a></li>
						<li><a href="index.html">30 Blog Designs with Killer Typography</a></li>
						<li><a href="index.html">The Principles of Great Design</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="footer-bottom">
			<p class="bottom-left">
				&copy; 2010 <strong>Copyright Vallobas</strong>&nbsp; &nbsp; &nbsp;
				<a title="www.vallobas.com" href="http://www.vallobas.com/">Vallobas</a> por <a href="">Ángel Suárez Fernández</a>
			</p>
			<p class="bottom-right">
				<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> |
				<a href="http://validator.w3.org/check/referer">XHTML</a>	|
				<a href="index.html">Home</a> |
				<a href="index.html">Sitemap</a> |
				<a href="index.html">RSS Feed</a> |
				<strong><a href="#nav">Back to Top</a></strong>
			</p>
		</div>
	</body>
</html>
